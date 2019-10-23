	<?php
		session_start();
		include("config.php");
		$loged=false;

		if (!$db){
			echo "<h1>Conection Error</h1>";
		}
		if(isset($_SESSION['username'])){
		$loged = true;
		$username = $_SESSION['username'];
		$userType = $_SESSION['userType'];
		}

		$offer_id = $_GET['oid'];
		//finds which user will be updated
		$check = mysqli_query($db,"SELECT * FROM joboffer WHERE offer_id = '$offer_id'") or die(mysqli_error($db));
		$row = mysqli_fetch_assoc($check);

		$job_title = $row['job_title'];
		$job_description = $row['job_description'];
		$basic_qualifications = $row['basic_qualifications'];
		$preferred_qualifications = $row['preferred_qualifications'];
		$address = $row['address'];


		if($_SERVER["REQUEST_METHOD"] == "POST") {
				$sql = "INSERT INTO applies VALUES('$offer_id','$username', 'UNDER_CONSIDERATION')";
				mysqli_query($db, $sql);
		}
	?>

	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Job Listing</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

			  <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="index.php">Home</a></li>

				          <?php
				          if($loged){
				          		echo "<li> <a href=\"followings.php\">Following</a></li>";
				          		echo "<li> <a href=\"tenders.php\">Tenders</a></li>";
				          		if($userType == "COMPANY")
				          			echo "<li> <a href=\"companyProfile.php\">Profile Page</a></li>";
				          		if($userType == "USER")
				          			echo "<li> <a href=\"userProfile.php\">Profile Page</a></li>";
				          		echo "<li><a class=\"ticker-btn\" href=\"logout.php\">Log out</a></li>";
				          }
				          else{
				          		echo "<li><a class=\"ticker-btn\" href=\"login/index.php\">Login</a></li>";

				          }
				          ?>
				        </ul>
				      </nav><!-- #nav-menu-container -->
			    	</div>
			    </div>
			  </header><!-- #header -->


			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Job Details
							</h1>
							<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="single.html"> Job Details</a></p>
						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-8 post-list">
							<div class="single-post d-flex flex-row">
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="#"><h4><?php echo $job_title; ?></h4></a>
										</div>
										<?php 
											$appliedControl = 0;
											if($loged){
												$idResult = mysqli_query($db,"SELECT offer_id FROM applies WHERE user_name= '$username'");
												while($idArray = mysqli_fetch_assoc($idResult)){
						    						if($offer_id == $idArray['offer_id'])
						    						{
						    							$appliedControl = 1;
						    							break;
						    						}
					    						}
												if($appliedControl == 0){
													echo "<form action=\"#\" method='post'>
													<div class=\"button-group-area mt-10\"  style=\"float:right\">
													<button type='submit' class=\"genric-btn primary\" style= \" position:absolute; right: 20px;\" >Apply</button>
													</div>
													</form>";
												}
												else{
													echo "<form action=\"#\" method='post'>
													<div class=\"button-group-area mt-10\"  style=\"float:right\">
													<button type='submit' class=\"genric-btn primary\" style= \" position:absolute; right: 20px;\" disabled>Already applied</button>
													</div>
													</form>";
												}
												
											}
												
										?>
										
									</div>
									<p class="address"><?php echo " <h5> Adress:</h5> $address";?></p>
								</div>
							</div>
							<div class="single-post job-details">
								<h4 class="single-title">Job Description</h4>
								<p>
									<?php echo $job_description;?>
								</p>
							</div>
							<div class="single-post job-experience">
								<h4 class="single-title">Basic Qualifications</h4>
								<ul>
									<p>
										<?php echo $basic_qualifications;?>
									</p>

								</ul>
							</div>
							<div class="single-post job-experience">
								<h4 class="single-title">Preferred Qualifications</h4>
								<ul>
									<p>
										<?php echo $preferred_qualifications;?>
									</p>
								</ul>
							</div>
						</div>
						<div class="col-lg-4 sidebar">
							<div class="single-slidebar">
								<h4>Companies by Location</h4>
								<ul class="cat-list">
								<?php
									$sql = "SELECT c.city, COUNT(*) as no_of_jobs
											FROM company as c
											GROUP BY c.city
											ORDER BY no_of_jobs asc";
									$query = mysqli_query($db, $sql);
									$count = mysqli_num_rows($query);
									if( $count > 0)
									{
										while ($row = mysqli_fetch_array($query) ) {
								?>
									<li>
										<a class="justify-content-between d-flex">
										<p>
											<?php
											echo $row['city'];
											?>
										</p>
										<span>
											<?php
												echo $row['no_of_jobs'];
											?>
										</span>
										</a>
									</li>
									<?php
										}
									}
									?>
								</ul>
							</div>

							<div class="single-slidebar">
								<h4>Top rated job posts</h4>
								<div class="active-relatedjob-carusel">
									<?php
										$sql = "SELECT jo.address, jo.job_title, jo.job_description, c.company_name, a.offer_id, COUNT(a.user_name) as no_of_applications
											FROM joboffer as jo, applies as a, company as c WHERE jo.user_name = c.user_name AND a.offer_id = jo.offer_id
											GROUP BY a.offer_id;";
											$query = mysqli_query($db, $sql);
											$count = mysqli_num_rows($query);
											if( $count > 0)
											{
												while ($row = mysqli_fetch_array($query) ) {
									?>
									<div class="single-rated">
										<a href="single.html"><h4>
											<?php
												echo $row['job_title'];
											?>
										</h4></a>
										<h6>
											<?php
												echo $row['company_name'];
											?>
										</h6>
										<p>
											<?php
												echo $row['job_description'];
											?>
										</p>
										<p class="address"><span class="lnr lnr-map"></span>
											<?php
												echo $row['address'];
											?>
										</p>
										<a href="#" class="btns text-uppercase">Apply job</a>
									</div>
									<?php
								}
							}
								?>
								<!--
									<div class="single-rated">
										<img class="img-fluid" src="img/r1.jpg" alt="">
										<a href="single.html"><h4>Creative Art Designer</h4></a>
										<h6>Premium Labels Limited</h6>
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
										</p>
										<h5>Job Nature: Full time</h5>
										<p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
										<p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
										<a href="#" class="btns text-uppercase">Apply job</a>
									</div>
											-->
								</div>
							</div>

							<div class="single-slidebar">
								<h4>Jobs by Titles</h4>
								<ul class="cat-list">
									<?php
										$sql = "SELECT j.job_title, COUNT(*) as no_of_title
												FROM joboffer as j
												GROUP BY j.job_title";
										$query = mysqli_query($db, $sql);
											$count = mysqli_num_rows($query);
											if( $count > 0)
											{
												while ($row = mysqli_fetch_array($query) ) {

									?>
									<li><a class="justify-content-between d-flex">
										<p>
											<?php
												echo $row['job_title'];
											?>
										</p>
										<span>
											<?php
												echo $row['no_of_title'];
											?>
										</span>
										</a>
									</li>

									<?php
											}
										}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End post Area -->



			<!-- start footer Area -->
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">

					</div>

					<div class="row footer-bottom d-flex justify-content-between">
						<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>
			<script src="js/owl.carousel.min.js"></script>
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>
			<script src="js/parallax.min.js"></script>
			<script src="js/mail-script.js"></script>
			<script src="js/main.js"></script>
			<script type="text/javascript">
				if ( window.history.replaceState ) {
			        window.history.replaceState( null, null, window.location.href );
			    }
			</script>
		</body>
	</html>
