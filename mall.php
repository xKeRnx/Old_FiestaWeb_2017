<?php $__TOKEN = "hardcoreshitbykernstudios"; require_once('includes/_init.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="KeRn">
    <title><?php echo $_SITETITLE; ?> | Mall</title>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">

    <!-- START: Styles -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300i,400,700%7cMarcellus+SC" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="assets/bower_components/fontawesome/css/font-awesome.min.css">

    <!-- IonIcons -->
    <link rel="stylesheet" href="assets/bower_components/ionicons/css/ionicons.min.css">

    <!-- Revolution Slider -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/revolution/css/settings.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/revolution/css/navigation.css">

    <!-- Flickity -->
    <link rel="stylesheet" href="assets/bower_components/flickity/dist/flickity.min.css">

    <!-- Photoswipe -->
    <link rel="stylesheet" type="text/css" href="assets/bower_components/photoswipe/dist/photoswipe.css">
    <link rel="stylesheet" type="text/css" href="assets/bower_components/photoswipe/dist/default-skin/default-skin.css">

    <!-- DateTimePicker -->
    <link rel="stylesheet" type="text/css" href="assets/bower_components/datetimepicker/build/jquery.datetimepicker.min.css">

    <!-- Revolution Slider -->
    <link rel="stylesheet" type="text/css" href="assets/plugins/revolution/css/settings.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="assets/plugins/revolution/css/navigation.css">

    <!-- Prism -->
    <link rel="stylesheet" type="text/css" href="assets/bower_components/prism/themes/prism-tomorrow.css">

    <!-- Summernote -->
    <link rel="stylesheet" type="text/css" href="assets/bower_components/summernote/dist/summernote.css">

    <!-- GODLIKE -->
    <link rel="stylesheet" href="assets/css/godlike.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- END: Styles -->

    <!-- jQuery -->
    <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
</head>

<body>
    <!-- START: Page Preloader -->
    <div class="nk-preloader">
        <div class="nk-preloader-bg" style="background-color: #000;" data-close-frames="23" data-close-speed="1.2" data-close-sprites="./assets/images/preloader-bg.png" data-open-frames="23" data-open-speed="1.2" data-open-sprites="./assets/images/preloader-bg-bw.png">
        </div>

        <div class="nk-preloader-content">
            <div>
                <img class="nk-img" src="assets/images/logo.png" alt="GodLike - Gaming Bootstrap 4 Template" width="170">
                <div class="nk-preloader-animation"></div>
            </div>
        </div>

        <div class="nk-preloader-skip">Skip</div>
    </div>
    <!-- END: Page Preloader -->


    <!-- START: Page Background -->
    <div class="nk-page-background op-5" data-bg-mp4="assets/video/bg-2.mp4" data-bg-webm="assets/video/bg-2.webm" data-bg-ogv="assets/video/bg-2.ogv" data-bg-poster="assets/video/bg-2.jpg"></div>
    <!-- END: Page Background -->



    <!-- START: Page Border -->
    <div class="nk-page-border">
        <div class="nk-page-border-t"></div>
        <div class="nk-page-border-r"></div>
        <div class="nk-page-border-b"></div>
        <div class="nk-page-border-l"></div>
    </div>
    <!-- END: Page Border -->







    <header class="nk-header nk-header-opaque">
        <!-- START: Navbar -->
			<?php Include('includes/navbar.php'); ?>
        <!-- END: Navbar -->
    </header>





    <!--
    START: Navbar Mobile
	-->
    <div id="nk-nav-mobile" class="nk-navbar nk-navbar-side nk-navbar-left-side nk-navbar-overlay-content hidden-lg-up">
        <div class="nano">
            <div class="nano-content">
                <a href="#" class="nk-nav-logo">
                    <img src="assets/images/logo.png" alt="" width="90">
                </a>
                <div class="nk-navbar-mobile-content">
                    <ul class="nk-nav">
                        <!-- Here will be inserted menu from [data-mobile-menu="#nk-nav-mobile"] -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Navbar Mobile -->



    <div class="nk-main">
        <div class="nk-gap-4"></div>

        <div class="container">
		<div class="nk-store">
           <div class="row equal-height multi-columns-row no-gap">
                <div class="col-lg-8">
                    <div class="nk-gap-4"></div>
					<?php
					if(isset($_GET['item'])){
						$item = mssql_escape_string($_GET['item']);
						
						$selectItems = sqlsrv_query($conn, "SELECT * FROM tMallItems WHERE goodsNo = ? AND sEnabled = 1;", array($item), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
						if(sqlsrv_has_rows($selectItems) == 1){

							while ($fetchItems = sqlsrv_fetch_array($selectItems)){
								if($fetchItems['sPrice'] > 0){
									$price = $fetchItems['sPrice'].' Coins';
								}else{
									$price = 'Free';
								}	
									If ($fetchItems['sImage2'] == "-"){
									$Image2 = '';
									}else{
									$Image2 = '<img style="box-shadow: 10px 20px 30px grey;max-width:500px;" max-width="300px" max-height="300px" src="./template/default/images/mall/'.$fetchItems['sImage2'].'.jpg" alt="'.$fetchItems['sName'].'"><br>';
									}
									
									$selusercoi = sqlsrv_query($conn, "SELECT * FROM tUser WHERE nUserNo = ? ;", array($_SESSION['nUserNo']), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
									if(sqlsrv_has_rows($selusercoi) == 1){
										$fetchusercoins = sqlsrv_fetch_array($selusercoi);
										$usercoins = $fetchusercoins['nAGPoints'];
									}else{
										$usercoins = 0;
									}
									
								?>
								<div class="row xl-gap equal-height vertical-gap">
									<div class="col-md-5">
										<div class="nk-vertical-center">
											<div>
												<div class="nk-carousel-3" data-size="1">
														<img src="assets/images/mall/<?php echo $fetchItems['sImage']; ?>.jpg" alt="">
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-7">
										<div class="nk-vertical-center">
											<div>
												<h2 class="nk-product-title"><?php echo $fetchItems['sUnit'].'x '.$fetchItems['sName']; ?></h2>

												<div class="nk-product-description">
													<p><?php echo $fetchItems['sDescription']; ?></p>
												</div>
													<?php 
													if($usercoins >= $price){
														echo '<a href="?buy='.$fetchItems['goodsNo'].'" class="nk-btn nk-btn-x2 link-effect-4">BUY</a>';
													}
													?>
													<span class="nk-product-price"><?php echo $price; ?></span>
											</div>
										</div>
									</div>
								</div>
								<?php								
							}

						}else{
							echo '<div class="nk-info-box bg-info"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>Sorry.. Item not found!</div>';
						}
					}elseif(isset($_GET['buy'])){
						$goodsNo = mssql_escape_string($_GET['buy']);
						
						$checkItem = sqlsrv_query($conn, "SELECT * FROM tMallItems WHERE goodsNo = ? AND sEnabled = 1;", array($goodsNo), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
						if(sqlsrv_num_rows($checkItem) == 1){
							$fetchItem = sqlsrv_fetch_array($checkItem);
							
							$selectAccount = sqlsrv_query($conn, "SELECT * FROM tUser WHERE nUserNo = ? AND nAGPoints >= ?;", array($_SESSION['nUserNo'], $fetchItem['sPrice']), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
							if(sqlsrv_has_rows($selectAccount) == 1){
								$deletePoints = sqlsrv_query($conn, "UPDATE tUser SET nAGPoints -= ? WHERE nUserNo = ?;", array($fetchItem['sPrice'], $_SESSION['nUserNo']));
								$points = $fetchItem['sPrice'];
								$status = 2;
								if($points != null && $status != null){
									$insertItem = sqlsrv_query($conn, "INSERT INTO tPurchases (nAGID, nPrice, nGoodsNo, nQuantity, nUsed, sIP, nIsGift, nStatus, nName) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);", array($_SESSION['nUserNo'], $points, $fetchItem['goodsNo'], $fetchItem['sUnit'],0 , getRemoteIP(), 0, $status, $fetchItem['sName']));
									$insertItem1 = sqlsrv_query($conn, "INSERT INTO tChargeItem (userNo, orderNo, goodsNo, amount) VALUES (?, ?, ?, ?);", array($_SESSION['nUserNo'], '1', $fetchItem['goodsNo'], $fetchItem['sUnit']));
									if($insertItem1 && $insertItem && $deletePoints){
										echo '<div class="nk-info-box bg-success"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>Bought item successfully!</div>';
									}else{
										echo '<div class="nk-info-box bg-danger"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>SP Error RS-1!</div>';
									}
								}else{
									echo '<div class="nk-info-box bg-danger"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>SP Error RS-0!</div>';
								}
								
							}else{
								echo '<div class="nk-info-box bg-danger"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>You not have enough Coins to buy this Item!</div>';
							}
						}else{
								echo '<div class="nk-info-box bg-danger"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>Tampered ? Item not exists ?!?!</div>';
						}
					}elseif(isset($_GET['cat'])){
						$cat = mssql_escape_string($_GET['cat']);
						$selectItems = sqlsrv_query($conn, "SELECT * FROM tMallItems WHERE sCategory = ? AND sEnabled = 1;", array($cat), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
						if(sqlsrv_has_rows($selectItems) == 1){
							
							$selcatnam = sqlsrv_query($conn, "SELECT * FROM tMallCategory WHERE nNo = ? AND sEnabled = 1;", array($cat), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
							if(sqlsrv_has_rows($selcatnam) == 1){
								$fecatnam = sqlsrv_fetch_array($selcatnam);
								$thecatnam = $fecatnam['sName'];
							}else{
								$thecatnam = 'Unknown';
							}
							?>
							<div class="nk-box-3">
								<h2><?php echo $thecatnam; ?></h2>
									<!-- START: Products in Cart -->
									<table class="table nk-store-cart-products">
										<tbody>
										<?php
											while ($fetchItems = sqlsrv_fetch_array($selectItems)){
											if($fetchItems['sPrice'] > 0){
												$price = $fetchItems['sPrice'].' Coins';
											}else{
												$price = 'Free';
											}
										?>

											
										<div class="col-sm-6 col-lg-4">
											<!-- START: Product -->
											<div class="nk-product" data-mouse-parallax-z="2">
												<div>
													<div class="nk-carousel-3" data-size="1" data-mouse-parallax-z="3">
														<a href="<?php echo '?item='.$fetchItems['goodsNo']; ?>"><img class="nk-img-stretch" src="assets/images/mall/<?php echo $fetchItems['sImage']; ?>.jpg" alt="<?php echo $fetchItems['sName']; ?>"></a>
													</div>
													<h2 class="nk-product-title h5" data-mouse-parallax-z="1"><a href="<?php echo '?item='.$fetchItems['goodsNo']; ?>"><?php echo $fetchItems['sName']; ?></a></h2>

													<div class="nk-product-rating"><?php echo 'x'.$fetchItems['sUnit']; ?></div>

													<div class="nk-product-bottom">
														<div>
															<div class="nk-product-price"><?php echo $price; ?></div>
															<a href="<?php echo '?buy='.$fetchItems['goodsNo']; ?>">FAST BUY</a>
														</div>
													</div>
												</div>
											</div>
											<!-- END: Product -->
										</div>
										<?php
										}
										?>
										</tbody>
									</table>
									<!-- END: Products in Cart -->

							</div>
							<?php
						}else{
							echo '<div class="nk-info-box bg-info"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>No items exists in this category!</div>';
						}
					}elseif(isset($_GET['lucky'])){
						$lucky = mssql_escape_string($_GET['lucky']);
						
						$selectItems = sqlsrv_query($conn, "SELECT * FROM tLuckyCategory WHERE nNo = ? AND sEnabled = 1;", array($lucky), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
						if(sqlsrv_has_rows($selectItems) == 1){

							while ($fetchItems = sqlsrv_fetch_array($selectItems)){
								if($fetchItems['sPrice'] > 0){
									$price = $fetchItems['sPrice'].' Coins';
								}else{
									$price = 'Free';
								}	
								
								$thiscate = $fetchItems['nNo'];
								$CategoryItems = sqlsrv_query($conn, "SELECT * FROM tLuckyItems WHERE sCategory = ? AND sEnabled = 1;", array($thiscate), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
								if(sqlsrv_num_rows($CategoryItems) > 1){
									
									$selusercoi = sqlsrv_query($conn, "SELECT * FROM tUser WHERE nUserNo = ? ;", array($_SESSION['nUserNo']), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
									if(sqlsrv_has_rows($selusercoi) == 1){
										$fetchusercoins = sqlsrv_fetch_array($selusercoi);
										$usercoins = $fetchusercoins['nAGPoints'];
									}else{
										$usercoins = 0;
									}
								?>
										<div class="row xl-gap equal-height vertical-gap">
											<div class="col-md-5">
												<div class="nk-vertical-center">
													<!-- START: Product Photos Carousel -->
														<div class="slideshow-container">
														
														<div id="0" class="fader" style="display: none;">
															  <img src="assets/images/mall/Lucky_Box.png" style="width:100%">
															  <div class="text"></div>
														</div>
														
														<?php
														while ($fetchCateItems = sqlsrv_fetch_array($CategoryItems)){
															$fetchrandomGoNo = $fetchCateItems['goodsNo'];
														?>
															<div id="<?php echo $fetchCateItems['goodsNo']; ?>" class="mySlides fader" style="display: none;">
															  <img src="assets/images/mall/<?php echo $fetchCateItems['sImage']; ?>.jpg" style="width:100%">
															  <div class="text"><?php echo $fetchCateItems['sName']; ?></div>
															</div>
														<?php														
														}
														?>
														</div>

														<script>
														document.getElementById("0").style.display = "block"; 
														
														var slideIndex = 1;
														var i2 = 0;
														var ifbuy = 0;
														function BUY() {
															if (ifbuy == 0){
																LogMsage.innerHTML = '';
																i1 = 0;
																i2 = 0;
																ifbuy = 1;
																funcx();
															}
														}
														
														function funcx()
														{
																i2++;
																if(i2 == 50){
																	var LogMsage = document.getElementById("LogMsage");
																	var sendNo = <?php echo $fetchItems['nNo']; ?>;
																	
																	var data = new FormData();
																	data.append('nNo', sendNo);
																	var xhr1 = new XMLHttpRequest();
																	xhr1.open('POST', 'ins/buyrandom.php', true);
																	xhr1.onload = function () {
																		var chunammasg = trim(this.responseText);
																		var i;
																		var slides = document.getElementsByClassName("mySlides");
																		for (i = 0; i < slides.length; i++) {
																			slides[i].style.display = "none"; 	
																		}
																		ifbuy = 0;
																		if (chunammasg == "nocoins"){
																			document.getElementById("0").style.display = "block"; 
																			LogMsage.innerHTML = '<div class="nk-info-box bg-danger"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>Not enough Coins!...</div>';
																		}else if (chunammasg == "error"){
																			document.getElementById("0").style.display = "block"; 
																			LogMsage.innerHTML = '<div class="nk-info-box bg-danger"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>Unknown error...</div>';
																		}else{
																			if (chunammasg.includes("ok#") == true){
																				var split = chunammasg.split("#");
																				var goodsno = split[1];
																				var itnam = split[2];
																				document.getElementById(goodsno).style.display = "block"; 
																				LogMsage.innerHTML = '<div class="nk-info-box bg-success"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>Congratulations, youve won this item: '+itnam+'</div>';
																			}else{
																				document.getElementById("0").style.display = "block"; 
																				LogMsage.innerHTML = '<div class="nk-info-box bg-danger"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>Unknown error...</div>';
																			}
																		}	
																	};
																	xhr1.send(data);
																	return;
																}
																showSlides(slideIndex += 1); 
																setTimeout(funcx, 200); 
														}
													

														function showSlides(n) {
															document.getElementById("0").style.display = "none"; 
															var i;
															var slides = document.getElementsByClassName("mySlides");
															if (n > slides.length) {slideIndex = 1}    
															if (n < 1) {slideIndex = slides.length}
															for (i = 0; i < slides.length; i++) {
															slides[i].style.display = "none";  
															}
															slides[slideIndex-1].style.display = "block";  
														}
														</script>
													<!-- END: Product Photos Carousel -->
												</div>
											</div>
											<div class="col-md-7">
												<div class="nk-vertical-center">
													<div>
														<div id="LogMsage"></div>
														<h2 class="nk-product-title"><?php echo $fetchItems['sName']; ?></h2>

														<div class="nk-product-description">
															<p><?php echo $fetchItems['sDescription']; ?></p>
														</div>
														<?php if($usercoins >= $price){
															echo '<a onclick="BUY()" class="nk-btn nk-btn-x2 link-effect-4">Try now</a>';
															}
														?>
															<span class="nk-product-price"><?php echo $price; ?></span>
													</div>
												</div>
											</div>	
											<?php
											$CategoryItems1 = sqlsrv_query($conn, "SELECT * FROM tLuckyItems WHERE sCategory = ? AND sEnabled = 1;", array($thiscate), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
											if(sqlsrv_num_rows($CategoryItems1) > 1){
											?>							
											<div class="nk-box-3">
											<h2>Items in this Lucky Box</h2>
													<!-- START: Products in Cart -->
													<table class="table nk-store-cart-products">
														<tbody>
														<?php
														while ($fetchCateItems1 = sqlsrv_fetch_array($CategoryItems1)){
														?>

															
														<div class="col-sm-6 col-lg-4">
															<!-- START: Product -->
															<div class="nk-product" data-mouse-parallax-z="2">
																<div>
																	<div class="nk-carousel-3" data-size="1" data-mouse-parallax-z="3">
																		<img class="nk-img-stretch" src="assets/images/mall/<?php echo $fetchCateItems1['sImage']; ?>.jpg" alt="<?php echo $fetchCateItems1['sName']; ?>">
																	</div>
																	<h2 class="nk-product-title h5" data-mouse-parallax-z="1"><?php echo $fetchCateItems1['sName']; ?></h2>

																	<div class="nk-product-rating"><?php echo 'x'.$fetchCateItems1['sUnit']; ?></div>
																</div>
															</div>
															<!-- END: Product -->
														</div>
														<?php
														}
														?>
														</tbody>
													</table>
													<!-- END: Products in Cart -->

											</div>
											<?php
											}
											?>

										</div>
										<?php				
							}else{
								echo '<div class="nk-info-box bg-info"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>Sorry.. There a no Items in this Lucky Box!</div>';
							}
						}
						}else{
							echo '<div class="nk-info-box bg-info"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>Sorry.. Category not found!</div>';
						}
					}else{
						//LUCKY BOX
						$selectItems = sqlsrv_query($conn, "SELECT * FROM tLuckyCategory WHERE sEnabled = ?;", array('1'), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
						if(sqlsrv_has_rows($selectItems) == 1){
							?>
							<div class="nk-box-3">
								<h2>Lucky Box</h2>
									<!-- START: Products in Cart -->
									<table class="table nk-store-cart-products">
										<tbody>
										<?php
											while ($fetchItems = sqlsrv_fetch_array($selectItems)){
											if($fetchItems['sPrice'] > 0){
												$price = $fetchItems['sPrice'].' Coins';
											}else{
												$price = 'Free';
											}
										?>

											
										<div class="col-sm-6 col-lg-4">
											<!-- START: Product -->
											<div class="nk-product" data-mouse-parallax-z="2">
												<div>
													<div class="nk-carousel-3" data-size="1" data-mouse-parallax-z="3">
														<a href="<?php echo '?lucky='.$fetchItems['nNo']; ?>"><img class="nk-img-stretch" src="assets/images/mall/<?php echo $fetchItems['sImage']; ?>.jpg" alt="<?php echo $fetchItems['sName']; ?>"></a>
													</div>
													<h2 class="nk-product-title h5" data-mouse-parallax-z="1"><a href="<?php echo '?lucky='.$fetchItems['nNo']; ?>"><?php echo $fetchItems['sName']; ?></a></h2>

													<div class="nk-product-bottom">
														<div>
															<div class="nk-product-price"><a href="<?php echo '?lucky='.$fetchItems['nNo']; ?>"><?php echo $price; ?></a></div>
														</div>
													</div>
												</div>
											</div>
											<!-- END: Product -->
										</div>
										<?php
										}
										?>
										</tbody>
									</table>
									<!-- END: Products in Cart -->

							</div>
					<?php
						}else{
							echo '<div class="nk-info-box bg-info"><div class="nk-info-box-icon"><i class="ion-alert-circled"></i></div>No items exists in this category!</div>';
						}					
					}
					?>
					<div class="nk-gap-4"></div>
                </div>
                <div class="col-lg-4">
				
                <!-- START: Sidebar  -->
                    <aside class="nk-sidebar nk-sidebar-right nk-sidebar-sticky">
                        <div class="nk-gap-4"></div>
                        <div class="nk-widget">
                            <h4 class="nk-widget-title"><a href="<?php echo $_SITEURL?>mall">Categories</a></h4>
                            <div>
                                <ul class="nk-widget-categories">
									<?php
										$selectCategory = sqlsrv_query($conn, "SELECT nNo, sName FROM tMallCategory WHERE sEnabled = 1 AND sSubCategory = 0 ORDER BY Sort ASC;", array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
										if(sqlsrv_has_rows($selectCategory) == 1){
											echo '<li><a href="mall">Lucky Box</a></li>';
											while ($fetchCategory = sqlsrv_fetch_array($selectCategory)){
												echo '<li><a href="?cat='.$fetchCategory['nNo'].'">'.$fetchCategory['sName'].'</a></li>';
											}
										}
									?>
                                </ul>
                            </div>
                        </div>
                        <div class="nk-gap-4"></div>

                    </aside>
            <!-- END: Sidebar -->
                </div>
            </div>
			</div>
        </div>

        <div class="nk-gap-4"></div>

    </div>

    <!-- START: Footer -->
		<?php Include('includes/footer.php'); ?>
    <!-- END: Footer -->



    <!-- START: Side Buttons -->
		<?php Include('includes/sidebtn.php'); ?>
    <!-- END: Side Buttons -->


    <!-- START: Scripts -->

    <!-- GSAP -->
    <script src="assets/bower_components/gsap/src/minified/TweenMax.min.js"></script>
    <script src="assets/bower_components/gsap/src/minified/plugins/ScrollToPlugin.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/bower_components/tether/dist/js/tether.min.js"></script>
    <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Sticky Kit -->
    <script src="assets/bower_components/sticky-kit/dist/sticky-kit.min.js"></script>

    <!-- Jarallax -->
    <script src="assets/bower_components/jarallax/dist/jarallax.min.js"></script>
    <script src="assets/bower_components/jarallax/dist/jarallax-video.min.js"></script>

    <!-- Flickity -->
    <script src="assets/bower_components/flickity/dist/flickity.pkgd.min.js"></script>

    <!-- Isotope -->
    <script src="assets/bower_components/isotope/dist/isotope.pkgd.min.js"></script>

    <!-- Photoswipe -->
    <script src="assets/bower_components/photoswipe/dist/photoswipe.min.js"></script>
    <script src="assets/bower_components/photoswipe/dist/photoswipe-ui-default.min.js"></script>

    <!-- Typed.js -->
    <script src="assets/bower_components/typed.js/dist/typed.min.js"></script>

    <!-- Jquery Form -->
    <script src="assets/bower_components/jquery-form/jquery.form.js"></script>

    <!-- Jquery Validation -->
    <script src="assets/bower_components/jquery-validation/dist/jquery.validate.min.js"></script>

    <!-- Jquery Countdown + Moment -->
    <script src="assets/bower_components/jquery.countdown/dist/jquery.countdown.min.js"></script>
    <script src="assets/bower_components/moment/min/moment.min.js"></script>
    <script src="assets/bower_components/moment-timezone/builds/moment-timezone-with-data.js"></script>

    <!-- Hammer.js -->
    <script src="assets/bower_components/hammer.js/hammer.min.js"></script>

    <!-- nK Share -->
    <script src="assets/plugins/nk-share/nk-share.js"></script>

    <!-- NanoSroller -->
    <script src="assets/bower_components/nanoscroller/bin/javascripts/jquery.nanoscroller.min.js"></script>

    <!-- SoundManager2 -->
    <script src="assets/bower_components/SoundManager2/script/soundmanager2-nodebug-jsmin.js"></script>

    <!-- DateTimePicker -->
    <script src="assets/bower_components/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>

    <!-- Revolution Slider -->
    <script type="text/javascript" src="assets/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="assets/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="assets/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script type="text/javascript" src="assets/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript" src="assets/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>

    <!-- Keymaster -->
    <script src="assets/bower_components/keymaster/keymaster.js"></script>

    <!-- Summernote -->
    <script src="assets/bower_components/summernote/dist/summernote.min.js"></script>

    <!-- Prism -->
    <script src="assets/bower_components/prism/prism.js"></script>

    <!-- GODLIKE -->
    <script src="assets/js/godlike.min.js"></script>
    <script src="assets/js/godlike-init.js"></script>
    <!-- END: Scripts -->



</body>

</html>