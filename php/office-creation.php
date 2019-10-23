	<?php 
		include("config.php");
	    session_start(); 
	    
	    if($_SERVER["REQUEST_METHOD"] == "POST") {
		    $username = "veli";
		    $employeenumber = $_POST['employeenumber'];
		    $departments = $_POST['departments'];
		    $zip = $_POST['zip'];
		    $streetname = $_POST['streetname'];
		    $city = $_POST['city'];
		    $country = $_POST['country'];
		   	$check = mysqli_query($db,"INSERT INTO office VALUES (NULL,'$streetname','$zip','$employeenumber','$city','$country','$username')");
		   	if($check){
		   		$office_id = mysqli_insert_id($db);
		   		$deptArray = explode(",", $departments);
		   		for ($index = 0; $index < count($deptArray); $index++){
		   			$aDepartment = $deptArray[$index];
		   			mysqli_query($db,"INSERT INTO department VALUES ('$office_id','$aDepartment')");
		   		}	
		   	}
		   	
		}
    ?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/elements/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
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
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/nice-select.css">			
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/bootstrap.css">
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
				          <li class="menu-active"><a href="index.html">Find Job</a></li>
				          <li><a href="about-us.html"></a></li>
				          <li><a href="category.html">Category</a></li>
				          <li><a href="contact.html">List Companies</a></li>
				          <li><a href="contact.html">Profile</a></li>
				          </li>
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
					</div>
				</div>
			</section>
			<div class="whole-wrap">

				<div class="container">

					<div class="section-top-border">

						<div class="row">
							<div class="col-lg-8 col-md-8">
								<form action="#" method="post">
								<p></p>
								<h3 class="mb-30">Create Office</h3>
									<div class="mt-10">
										<input type="number" name="employeenumber" placeholder="Number of Employees" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Number of Employees'" required class="single-input">
										</div>
									<div class="mt-10">
										<textarea class="single-textarea" name="departments" placeholder="Departments(Please separate each department by comma)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Departments'" required></textarea>
									</div>
									<div class="mt-10">
										<input type="text" name="streetname" placeholder="Street name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Street name'" required class="single-input-primary">
									</div>
									<div class="mt-10">
										<input type="number" name="zip" placeholder="Zip code" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Zip code" required class="single-input-primary">
									</div>
									<div class="mt-10">
										<input type="text" name="city" placeholder="City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'" required class="single-input-primary">
									</div>
									<div class="mt-10">
										<input type="text" name="country" placeholder="Country" onfocus="this.placeholder = ''" onblur="this.placeholder = 'country'" required class="single-input-primary">
									</div>

									<div class="button-group-area mt-10">
										<button type="submit" class="genric-btn primary-border e-large">Create Office</button>
										<a href="company-profile-page.html" class="genric-btn primary-border e-large">Back to Company Page</a>
									</div>
								</form>
							</div>
							<div class="col-lg-3 col-md-4 mt-sm-30">
								<div class="single-element-widget">
								</div>
								<div class="single-element-widget mt-30">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Align Area -->

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