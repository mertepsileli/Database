	<?php 
	session_start();
	include("config.php");
	$loged = false;	

	if(isset($_SESSION['username'])){
		$loged = true;
		#$_SESSION['userType'] = "COMPANY";
		#$_SESSION['userType'] = "ADMIN";
		$username = $_SESSION['username'];
		$userType = $_SESSION['userType'];
	}

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$applied_id = $_POST["apply_submit"];
	   	mysqli_query($db,"INSERT INTO applies VALUES('$applied_id','$username','UNDER_CONSIDERATION')");
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
					<div class="row fullscreen d-flex align-items-center justify-content-center">
						<div class="banner-content col-lg-12">
							<h1 class="text-white">
								<span>150+</span> Jobs posted
							</h1>
							<form action="search.php" class="serach-form-area">
								<div class="row justify-content-center form-wrap">
									
									<div class="col-lg-3 form-cols">
										<div class="default-select" id="default-selects2">
											<input type="text" class="form-control" name="cn" placeholder="Company Name">
										</div>
									</div>
									<div class="col-lg-3 form-cols">
										<div class="default-select" id="default-selects2">
											<input type="text" class="form-control" name="jt" placeholder="Job Title">
										</div>
									</div>
									<div class="col-lg-3 form-cols">
										<div class="default-select" id="default_s">
											<select name="sp">
												<option value="Offer">Search in Offers</option>
												<option value="Tender">Search in Tenders</option>
											</select>
										</div>
									</div>
									<div class="col-lg-2 form-cols">
									    <button type="submit" class="btn btn-info">
									      <span class="lnr lnr-magnifier"></span> Search
									    </button>
									</div>
								</div>
							</form>
							<p class="text-white"> Search in Tenders or Offers </p>
						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<!-- Start features Area -->
			<section class="features-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="single-feature">
								<h4>Searching</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-feature">
								<h4>Applying</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-feature">
								<h4>Security</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-feature">
								<h4>Notifications</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing.
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End features Area -->

			<!-- Start feature-cat Area -->
			<section class="feature-cat-area pt-100" id="category">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">Popular Titles</h1>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.html">
									<img src="img/o1.png" alt="">
								</a>
								<p>Accounting</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.html">
									<img src="img/o2.png" alt="">
								</a>
								<p>Development</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.html">
									<img src="img/o3.png" alt="">
								</a>
								<p>Computer Engineer</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.html">
									<img src="img/o4.png" alt="">
								</a>
								<p>Journalist</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.html">
									<img src="img/o5.png" alt="">
								</a>
								<p>Medical Doctor</p>
							</div>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a href="category.html">
									<img src="img/o6.png" alt="">
								</a>
								<p>Manager</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End feature-cat Area -->

			<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-8 post-list">
						<?php

						if($loged){	
							$jobOffers = mysqli_query($db,"SELECT * FROM joboffer");
							$results = 0;
							$results = mysqli_num_rows($jobOffers);

							if($results > 0){
								while($row = mysqli_fetch_assoc($jobOffers))
								{
									$jobTitle = $row['job_title'];
									$jobDescription = $row['job_description'];
									$jobLocation = $row['address'];
									$offer_id = $row['offer_id'];
									$appliedControl = 0;

									echo
									"
									 <div class=\"single-post d-flex flex-row\">
										<div class=\"details\">
											<div class=\"title d-flex flex-row justify-content-between\">
												<div class=\"titles\">
												<ul class= \"btns\">";
									
									$idResult = mysqli_query($db,"SELECT offer_id FROM applies WHERE user_name= '$username'");
									while($idArray = mysqli_fetch_assoc($idResult)){
			    						if($offer_id == $idArray['offer_id'])
			    						{
			    							$appliedControl = 1;
			    							break;
			    						}
			    					}

			    					if($appliedControl == 0){
			    						echo "
												<form action = \"#\" method = \"post\"> 
													<button type = \"submit\" name = \"apply_submit\" value=\"$offer_id\" href=\"signupuser.php\" class=\"genric-btn primary\" style=\" position:absolute; right: 20px;\" >Apply</button> 
													</form>
												</ul>
													<a href=\"detailedOffer.php?oid=$offer_id\"><h4>'$jobTitle'</h4></a>
												</div>
											</div>
											<p>
												'$jobDescription'
											</p>
											<p class=\"address\"><span class=\"lnr lnr-map\"></span> '$jobLocation' </p>
										</div>
									</div>";
			    					}
			    					else{
			    						echo "
												<form action = \"#\" method = \"post\"> 
													<button type = \"submit\" value=\"$offer_id\" href=\"signupuser.php\" class=\"genric-btn primary\" style=\" position:absolute; right: 20px;\" disabled>Alredy Applied</button> 
													</form>
												</ul>
													<a href=\"detailedOffer.php?oid=$offer_id\"><h4>'$jobTitle'</h4></a>
												</div>
											</div>
											<p>
												'$jobDescription'
											</p>
											<p class=\"address\"><span class=\"lnr lnr-map\"></span> '$jobLocation' </p>
										</div>
									</div>";
			    					}	
			    				}
			    			}
			    		}
			    		else{
			    			$jobOffers = mysqli_query($db,"SELECT * FROM joboffer");
							$results = 0;
							$results = mysqli_num_rows($jobOffers);

							if($results > 0){
								while($row = mysqli_fetch_assoc($jobOffers))
								{
									$jobTitle = $row['job_title'];
									$jobDescription = $row['job_description'];
									$jobLocation = $row['address'];
									$offer_id = $row['offer_id'];

									echo
									"
	 								<div class=\"single-post d-flex flex-row\">
										<div class=\"details\">
											<div class=\"title d-flex flex-row justify-content-between\">
												<div class=\"titles\">
												<ul class= \"btns\">

												<form action =\"#\" method = \"post\">
													</form>
												</ul>
													<a href=\"detailedOffer.php?oid=$offer_id\"><h4>'$jobTitle'</h4></a>
												</div>
											</div>
											<p>
												'$jobDescription'
											</p>
											<p class=\"address\"><span class=\"lnr lnr-map\"></span> '$jobLocation' </p>
										</div>
									</div>";
								}
							}
							else{
								echo
								"
									<div class=\"single-post d-flex flex-row\">
										<div class=\"details\">
											<div class=\"title d-flex flex-row justify-content-between\">
												<div class=\"titles\">
													<h4>There is no job offer!</h4>
												</div>
											</div>
										</div>
									</div>";
							}
			    		}
			    		?>

						</div>
						<div class="col-lg-4 sidebar">
							<div class="single-slidebar">
								<h4>Jobs by Location</h4>
								<ul class="cat-list">
									<li><a class="justify-content-between d-flex" href="category.html"><p>New York</p><span>37</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Park Montana</p><span>57</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Atlanta</p><span>33</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Arizona</p><span>36</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Florida</p><span>47</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Rocky Beach</p><span>27</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Chicago</p><span>17</span></a></li>
								</ul>
							</div>

							<div class="single-slidebar">
								<h4>Top rated job posts</h4>
								<div class="active-relatedjob-carusel">
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
								</div>
							</div>

							<div class="single-slidebar">
								<h4>Jobs by Title</h4>
								<ul class="cat-list">
									<li><a class="justify-content-between d-flex" href="category.html"><p>Computer Engineering</p><span>37</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Industrial Engineering</p><span>57</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Accounting</p><span>33</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Medical Doctor</p><span>36</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Manager</p><span>47</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Developer</p><span>27</span></a></li>
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
