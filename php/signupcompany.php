	<?php
		include("config.php");
		session_start();

		if($_SERVER["REQUEST_METHOD"] == "POST") {
			$user_name = $_POST['user_name'];
			$password = $_POST['password'];
			$company_name = $_POST['company_name'];	
			$website = $_POST['website'];
			$trade_reg_id = $_POST['trade_reg_id'];
			$country = $_POST['country'];
			$year = $_POST['year'];
			$working_area = $_POST['working_area'];
			$city = $_POST['city'];
			$comp_letter = $_POST['comp_letter'];

			$check = mysqli_query($db,"INSERT INTO user VALUES ('$user_name','$password')");
   	    	if($check){
		    	$result = mysqli_query($db,"SELECT * FROM company WHERE web_site_link = '$website'");
		    	if($result !== false){
		    		if(mysqli_num_rows($result) === 1){
			    		mysqli_query($db,"DELETE FROM user WHERE user_name = '$user_name'");
			    		echo "<script type='text/javascript'>alert('This web site is already used!');</script>";
		    		}
		    		else{
		    			
		    			//Download logo, change name and add it to company
		    			if($_FILES['logo']['name'] != ""){
						$temp_logo_name = $_FILES['logo']['tmp_name'];
						$type = getimagesize($temp_logo_name);
						$logo_extension = image_type_to_extension($type[2]);
						move_uploaded_file($temp_logo_name,"logos/". $user_name. $logo_extension);
						}

						//Download cover photo, change name and add it to company
						if($_FILES['photo']['name'] != ""){
						$temp_cover_name = $_FILES['photo']['tmp_name'];
						$type = getimagesize($temp_cover_name);
						$cover_extension = image_type_to_extension($type[2]);
						move_uploaded_file($temp_cover_name,"covers/". $user_name. $cover_extension);
						}

		    			$check = mysqli_query($db,"CALL insert_company('$company_name','$website','$trade_reg_id','$city','$country','$year','$working_area','$comp_letter','$user_name')");
		    			if(!$check)
		    				echo "<script type='text/javascript'>alert('Hata!');</script>";
		    		}
		    	}
		    	
			}else
			{
				echo "<script type='text/javascript'>alert('This username is already used!');</script>";
			}
			mysqli_close($db);
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
				          <li class="menu-active"><a href="index.html">Home</a></li>
				          <li><a href="about-us.html">About Us</a></li>
				          <li><a href="category.html">Category</a></li>
				          <li><a href="contact.html">Contact</a></li>
				          </li>
				          <li><a class="ticker-btn" href="login/index.php">Login</a></li>
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
							<p class="text-white link-nav"> 
								<span class="lnr lnr-apartment"></span>
								<a href="signupcompany.php"> <font size = "4">Sign Up as Company</font></a>
								<span class="lnr lnr-user"></span>
								<a href="signupuser.php"> <font size = "4">Sign Up as User</font></a>
							</p>
						</div>
					</div>
				</div>
			</section>
			<div class="whole-wrap">

				<div class="container">

					<div class="section-top-border">

						<div class="row">
							<div class="col-lg-8 col-md-8">
							<h3 class="mb-30">Company Sign Up</h3>
								<form action="#" method='post' enctype = "multipart/form-data">
									<div class="mt-10">
										<input type="text" name="user_name" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required class="single-input">
									</div>
									<div class="mt-10">
										<input type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required class="single-input">
									</div>
									<div class="mt-10">
										<input type="text" name="company_name" placeholder="Company Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Company Name'" required class="single-input">
									</div>
									<div class="mt-10">
										<input type="text" name="website" placeholder="Website" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Website'" required class="single-input">
									</div>
									<div class="mt-10">
										<input type="text" name="trade_reg_id" placeholder="Trade Register ID" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Trade Register ID'" required class="single-input">
									</div>
									<div class="mt-10">
										<input type="text" name="city" placeholder="City" onfocus="this.placeholder = ''" onblur="this.placeholder = 'City'" required class="single-input">
									</div>
									<div class="mt-10">
										<input type="text" name="country" placeholder="Country" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Country'" required class="single-input">
									</div>
									<div class="mt-10">
										<input type="text" name="year" placeholder="Year" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Year'" required class="single-input">
									</div>
									<div class="mt-10">
										<input type="text" name="working_area" placeholder="Working Area" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Working Area'" required class="single-input">
									</div>
									<div class="mt-10">
										<p><input type="file" name="logo" placeholder="Upload Logo" accept="image/*">Upload your Logo</p>
									</div>
									<div class="mt-10">
										<p><input type="file" name="photo" placeholder="Cover Photo " accept="image/*">Cover Photo</p>
									</div>
									<div class="mt-10">
										<input type="text" name="comp_letter" placeholder="Company Letter" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Company Letter'" required class="single-input-accent">
									</div>
									<div class="button-group-area mt-10">
										<button type='submit' class="genric-btn primary-border e-large">Sign Up</button>
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
