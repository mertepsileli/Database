	<?php
		include("config.php");
		session_start();
		if (!$db) {
			echo "<h1>Conection Error</h1>";
		}
		$email = "";
		$password = "";
		$edit_qua = "";
		//$add_ex = "";
		//photo ve cv eklenecek

		if($_SERVER["REQUEST_METHOD"] == "POST") {

		   // get all the variables from user(picture and logo is not defined upside because they are files also working area and year are email)
			$edit_desc = $_POST['edit_desc'];
			$website = $_POST['website'];
			$password = $_POST['password'];
			$username = 'mepsi';//session ile alinacak
			//get "up_photo" and "up_cv"

			//finds which user will be updated
			$check = mysqli_query($db,"SELECT user_name FROM user WHERE user_name = '$username'") or die(mysqli_error($db));
			if ($check) {
				if($edit_desc != ''){
					$edit_comp_sql = "UPDATE company SET working_area='$edit_desc' WHERE user_name='$username'";
					mysqli_query($db, $edit_comp_sql);
					echo "<script LANGUAGE='JavaScript'>
						window.alert('The company is updated successfully');
					</script>";
				}

				if($website != ''){
					$edit_comp_sql = "UPDATE company SET web_site_link='$website' WHERE user_name='$username'";
					mysqli_query($db, $edit_comp_sql);
					echo "<script LANGUAGE='JavaScript'>
						window.alert('The company is updated successfully');
					</script>";
				}

				$edit_user_sql = "UPDATE user SET password='$password'  WHERE user_name='$username'";
				if(mysqli_query($db, $edit_user_sql)){
						echo "<script LANGUAGE='JavaScript'>
							window.alert('The user is updated successfully');
						</script>";
				}
			}
			else {
				echo "<script type='text/javascript'>alert('The username value would not be found, that is not exist');</script>";
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
								<form action="#" method='post'>
									<div class="mt-10">
										<div class="mt-10">
										<p><input type="file" name="up_photo" placeholder="UploadCover" accept="image/*">Upload Cover Photo</p>
										</div>
										<div class="mt-10">
										<p><input type="file" name="up_logo" placeholder="UploadLogo" accept="image/*">Upload Logo</p>
									<div class="mt-10">
										<input type="text" name="website" placeholder="Change Website Link" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Change Website Link'" class="single-input">
									</div>
									<div class="mt-10">
										<textarea class="single-textarea" name="edit_desc" placeholder="Edit Description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Edit Description'" ></textarea>
									</div>
									<div class=" mt-10">
										<input type="text" name="password" placeholder="Change Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Change Password'" class="single-input">
									</div>
									<div class="button-group-area mt-10">
										<button type='submit' class="genric-btn primary-border e-large">Save Changes</button>
									</div>
								</form>

						</div>
						<div class="col-lg-4 sidebar">
							<div class="single-slidebar">
								<h4>Advanced Company Settings</h4>
								<ul class="cat-list">
									<li><a class="justify-content-between d-flex" href="category.html"><p>Report Review</p></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Add Office</p><span>37</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Show Applications</p><span>57</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Send Name Change Request</p></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Post New Job</p></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
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
		</body>
	</html>
