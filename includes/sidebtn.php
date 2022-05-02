<?php
if($__TOKEN = "hardcoreshitbykernstudios"){
?>
    <div class="nk-side-buttons nk-side-buttons-visible">
        <ul>
            <li>
                <span class="nk-btn nk-btn-lg nk-btn-icon nk-bg-audio-toggle">
                    <span class="icon">
                        <span class="ion-android-volume-up nk-bg-audio-pause-icon"></span>
                        <span class="ion-android-volume-off nk-bg-audio-play-icon"></span>
                    </span>
                </span>
            </li>
            <li class="nk-scroll-top">
                <span class="nk-btn nk-btn-lg nk-btn-icon">
                    <span class="icon ion-ios-arrow-up"></span>
                </span>
            </li>
        </ul>
    </div>
	
    <!-- START: Large Modal -->
    <div class="modal nk-modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="ion-android-close"></span>
                    </button>
                    <h4 class="modal-title nk-title" id="myLargeModalLabel">Login/Signup</h4>
                </div>
                <div class="modal-body">
					<div style="text-align: center;">

							<h3>Login</h3>
							<div id="LogUnamMsage"></div>
							<input type="text" class="form-control required" id="loginuname" placeholder="Username *" maxlength="10" style="margin: 0 auto;">
							<input type="password" class="form-control required" id="logibpassw" placeholder="Password *" maxlength="16" style="margin: 0 auto;">
							<br>
							<button type="submit" onclick="login();" class="nk-btn nk-btn-style-2 nk-btn-md">Login</button>
							<br><br>
							<h3>Signup</h3>
							<div id="SigUnamMsage"></div>
							<input type="text" class="form-control required" id="siguname" placeholder="Username *" maxlength="10" style="margin: 0 auto;">
							<input type="text" class="form-control required" id="sigemail" placeholder="Email *" style="margin: 0 auto;">
							<input type="password" class="form-control required" id="sigpassw" placeholder="Password *" maxlength="16" style="margin: 0 auto;">
							<input type="password" class="form-control required" id="ressigpassw" placeholder="Password *" maxlength="16" style="margin: 0 auto;">
							<br>
							<button type="submit" onclick="signup();" class="nk-btn nk-btn-style-2 nk-btn-md">Signup</button>

						<script>
						function login() {
							var LogUsername = document.getElementById("loginuname").value;
							var LogPassw = document.getElementById("logibpassw").value;
							var LogUnamMsage = document.getElementById("LogUnamMsage");
							
							if(LogUsername == ""){
								LogUnamMsage.innerHTML = '<div class="nk-info-box bg-danger"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>Username is empty...</div>';
							}else if(LogPassw == "") {
								LogUnamMsage.innerHTML = '<div class="nk-info-box bg-danger"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>Password is empty...</div>';
							}else{
								LogUnamMsage.innerHTML = '';
								
								var data = new FormData();
								data.append('username', LogUsername);
								data.append('password', LogPassw);
							
								var xhr1 = new XMLHttpRequest();
								xhr1.open('POST', 'ins/login.php', true);
								xhr1.onload = function () {
									var chunammasg = trim(this.responseText);
									if (chunammasg == "wrong"){
										LogUnamMsage.innerHTML = '<div class="nk-info-box bg-danger"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>Wrong Username or Password...</div>';
									}else if (chunammasg == "error"){
										LogUnamMsage.innerHTML = '<div class="nk-info-box bg-danger"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>Unknown error...</div>';
									}else{
										window.location = window.location.href;
									}	
								};
								xhr1.send(data);
							}	
						}
						
						function signup() {
							var SigUsername = document.getElementById("siguname").value;
							var SigEmail = document.getElementById("sigemail").value;
							var SigPassw = document.getElementById("sigpassw").value;
							var SigRepPassw = document.getElementById("ressigpassw").value;
							var SigUnamMsage = document.getElementById("SigUnamMsage");
							
							if(SigUsername == ""){
								SigUnamMsage.innerHTML = '<div class="nk-info-box bg-danger"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>Username is empty...</div>';
							}else if(SigPassw == "") {
								SigUnamMsage.innerHTML = '<div class="nk-info-box bg-danger"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>Password is empty...</div>';
							}else if(SigPassw != SigRepPassw) {
								SigUnamMsage.innerHTML = '<div class="nk-info-box bg-danger"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>Passwords do not match...</div>';
							}else{
								 if (validateEmail(SigEmail)) {
									var data = new FormData();
									data.append('username', SigUsername);
									data.append('email', SigEmail);
									data.append('password', SigPassw);
								
									var xhr1 = new XMLHttpRequest();
									xhr1.open('POST', 'ins/signup.php', true);
									xhr1.onload = function () {
										var chunammasg = trim(this.responseText);
										if (chunammasg == "exist"){
											SigUnamMsage.innerHTML = '<div class="nk-info-box bg-danger"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>User already exists...</div>';
										}else if (chunammasg == "error"){
											SigUnamMsage.innerHTML = '<div class="nk-info-box bg-danger"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>Unknown error...</div>';
										}else if (chunammasg == "ok"){
											SigUnamMsage.innerHTML = '<div class="nk-info-box bg-success"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>Welcome to the world of KeRnOnline ' + SigUsername + '<br>Account has been successfully created!</div>';
										}else{
											SigUnamMsage.innerHTML = '<div class="nk-info-box bg-danger"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>Unknown error...</div>';
										}	
									};
									xhr1.send(data);
								 }else{
									 SigUnamMsage.innerHTML = '<div class="nk-info-box bg-danger"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>No valid Email...</div>';
								 }
							}
						}
						
						function validateEmail(email) {
						  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
						  return re.test(email);
						}
						
						// function to trim strings
						function trim(sVal)
						{
							var sTrimmed = "";

							for (i = 0; i < sVal.length; i++)
							{
								if (sVal.charAt(i) != " " && sVal.charAt(i) != "\f" && sVal.charAt(i) != "\n" && sVal.charAt(i) != "\r" && sVal.charAt(i) != "\t")
								{
									sTrimmed = sTrimmed + sVal.charAt(i);
								}
							}

							return sTrimmed;
						}	
						</script>
					</div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Large Modal -->
<?php
}
?>