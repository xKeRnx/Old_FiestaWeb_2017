<?php
if($__TOKEN = "hardcoreshitbykernstudios"){
?>
<nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-autohide">
            <div class="container">
                <div class="nk-nav-table">

                    <a href="<?php echo $_SITEURL; ?>" class="nk-nav-logo">
                        <img src="assets/images/logo.png" alt="" width="90">
                    </a>


                    <ul class="nk-nav nk-nav-right hidden-md-down" data-nav-mobile="#nk-nav-mobile">
                        <li class="  ">
                            <a href="<?php echo $_SITEURL; ?>">Home</a>
                        </li>
						
                        <li class="nk-drop-item">
                            <a href="#">TOP 100</a>
                            <ul class="dropdown">
                                <li class="">
                                    <a href="TOPC">Character</a>
                                </li>
                                <li class="">
                                    <a href="TOPG">Guilds</a>
                                </li>
								<li class="">
                                    <a href="TOPP">Playmin</a>
                                </li>
                            </ul>
                        </li>
						
						<li class="  ">
                            <a href="Statistics">Statistics</a>
                        </li>
                        <li class="  ">
                            <a href="Rules">Rules</a>
                        </li>
                        <li class="  ">
                            <a href="About">About</a>
                        </li>
						
					<?php
					if(isset($_SESSION['nUserNo'])){
					?>
                        <li class="  nk-drop-item">
                            <a href="#">
								<span class="nk-icon-burger">
                                    <span class="nk-t-1"></span>
                                    <span class="nk-t-2"></span>
                                    <span class="nk-t-3"></span>
                                </span>
							</a>
                            <ul class="dropdown">
                                <li class="">
                                    <a href="account">Account Panel</a>
                                </li>
								<li class="">
                                    <a href="characters">Characters Panel</a>
                                </li>
								<li class="">
                                    <a href="mall">Item Mall</a>
                                </li>
								<li class="">
                                    <a href="donate">Donate</a>
                                </li>
								<li class="">
                                    <a href="https://topoffiesta.com/serverlist/1/<?php echo $_SESSION['nUserNo']; ?>" target="_blank">Vote4Coins</a>
                                </li>
								<li class="">
                                    <a href="pwchange">Change Password</a>
                                </li>
								<li class="">
                                    <a href="logout">Logout</a>
                                </li>
                            </ul>
                        </li>
					<?php
					}else{
					?>
					    <li class="single-icon">
                            <a href="#" class="no-link-effect" data-toggle="modal" data-target=".bd-example-modal-lg">
                                <span class="nk-icon-burger">
                                    <span class="nk-t-1"></span>
                                    <span class="nk-t-2"></span>
                                    <span class="nk-t-3"></span>
                                </span>
                            </a>
                        </li>
					<?php
					}
					?>
                    </ul>

                    <ul class="nk-nav nk-nav-right nk-nav-icons">

                        <li class="single-icon hidden-lg-up">
                            <a href="#" class="no-link-effect" data-nav-toggle="#nk-nav-mobile">
                                <span class="nk-icon-burger">
                                    <span class="nk-t-1"></span>
                                    <span class="nk-t-2"></span>
                                    <span class="nk-t-3"></span>
                                </span>
                            </a>
                        </li>

                    </ul>
				
                </div>
            </div>
        </nav>
		
<?php
}
?>