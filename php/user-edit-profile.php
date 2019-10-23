	<?php
		include("config.php");
		session_start();
		if (!$db) {
			echo "<h1>Conection Error</h1>";
		}
		$email = "";
		$password = "";
		$edit_qua = "";
		$edit_tit = "";
		$edit_def = "";
		$edit_beg = "";
		$edit_end = "";
		//photo ve cv eklenecek

		if($_SERVER["REQUEST_METHOD"] == "POST") {

		   // get all the variables from user(picture and logo is not defined upside because they are files also working area and year are email)
			$email = $_POST['email'];
			$edit_qua = $_POST['edit_qua'];
			$password = $_POST['password'];
			$edit_tit = $_POST['edit_tit'];
			$edit_def = $_POST['edit_def'];
			$edit_beg = $_POST['edit_beg'];
			$edit_end = $_POST['edit_end'];
			$username = 'mertt';
			$temp_pdf_name = $_FILES['up_cv']['tmp_name'];
			$temp_photo_name = $_FILES['up_photo']['tmp_name'];

			//finds which user will be updated
			$check = mysqli_query($db,"SELECT user_name FROM user WHERE user_name = '$username'") or die(mysqli_error($db));
			if ($check) {
				if($email != ''){
					$edit_job_sql = "UPDATE jobseeker SET email='$email' WHERE user_name='$username'";
					mysqli_query($db, $edit_job_sql);
					echo "<script LANGUAGE='JavaScript'>
						window.alert('The jobseeker email is updated successfully');
					</script>";
				}

				if($edit_qua != ''){
					$edit_job_sql = "UPDATE jobseeker SET qualifications='$edit_qua' WHERE user_name='$username'";
					mysqli_query($db, $edit_job_sql);
					echo "<script LANGUAGE='JavaScript'>
						window.alert('The jobseeker qualifications are updated successfully');
					</script>";
				}

				if($edit_tit != ''){
					$edit_job_sql = "UPDATE experience SET job_title='$edit_tit' WHERE user_name='$username'";
					mysqli_query($db, $edit_job_sql);
					echo "<script LANGUAGE='JavaScript'>
						window.alert('The jobseeker title is updated successfully');
					</script>";
				}

				if($edit_def != ''){
					$edit_job_sql = "UPDATE experience SET job_definitions='$edit_def' WHERE user_name='$username'";
					mysqli_query($db, $edit_job_sql);
					echo "<script LANGUAGE='JavaScript'>
						window.alert('The jobseeker definitions are updated successfully');
					</script>";
				}

				if($edit_beg != ''){
					$edit_job_sql = "UPDATE experience SET beginning_time='$edit_beg' WHERE user_name='$username'";
					mysqli_query($db, $edit_job_sql);
					echo "<script LANGUAGE='JavaScript'>
						window.alert('The jobseeker begin time is updated successfully');
					</script>";
				}

				if($edit_end != ''){
					$edit_job_sql = "UPDATE experience SET end_time='$edit_end' WHERE user_name='$username'";
					mysqli_query($db, $edit_job_sql);
					echo "<script LANGUAGE='JavaScript'>
						window.alert('The jobseeker end time is updated successfully');
					</script>";
				}

				if($_FILES['up_cv'] != ''){
					move_uploaded_file($temp_pdf_name,"cvs/". $username. ".pdf");
				}

				if($_FILES['up_photo'] != ''){
					$type = getimagesize($temp_photo_name);
					$cover_extension = image_type_to_extension($type[2]);
					move_uploaded_file($temp_photo_name,"covers/". $username. $cover_extension);

				}

				if($password != ''){
					$edit_user_sql = "UPDATE user SET password='$password'  WHERE user_name='$username'";
					if(mysqli_query($db, $edit_user_sql)){
							echo "<script LANGUAGE='JavaScript'>
								window.alert('The user passwrod is updated successfully');
							</script>";
					}
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
		<meta name="viewport" content="width=device-width, initial-scale=1≥, shrink-to-fit=no">
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
			<style>
			.collapsible {
			  background-color: #777;
			  color: white;
			  cursor: pointer;
			  padding: 18px;
			  width: 100%;
			  border: none;
			  text-align: left;
			  outline: none;
			  font-size: 15px;
			}

			.active, .collapsible:hover {
			  background-color: #555;
			}

			.content {
			  padding: 0 18px;
			  display: none;
			  overflow: hidden;
			  background-color: #f1f1f1;
			}
			</style>
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
								<form action="#" method='post' enctype="multipart/form-data">
									<div class="mt-10">
										<div class="mt-10">
										<p><input type="file" name="up_photo" placeholder="Upload CV" accept="image/*">Upload Profile Picture</p>
										</div>
										<input type="email" name="email" placeholder="Change Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" class="single-input">
										</div>
									<div class="mt-10">
										<p><input type="file" name="up_cv" placeholder="Upload CV" accept="application/pdf">Upload your CV</p>
									</div>
									<div class=" mt-10">
										<input type="text" name="password" placeholder="Change Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Change Password'" class="single-input">
									</div>

									<div class="mt-10">
										<textarea class="single-textarea" name="edit_qua" placeholder="Edit Qualifications" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Edit Qualifications'"></textarea>
									</div>

									<br>
									<li class="collapsible">Add Experiences</li>
									<div class="content">
										<textarea class="single-textarea" name="edit_tit" placeholder="Job Title"></textarea>
										<br>
										<textarea class="single-textarea" name="edit_def" placeholder="Job Definition" ></textarea>
										<br>
										<textarea class="single-textarea" name="edit_beg" placeholder="Beginning Time"></textarea>
										<br>
										<textarea class="single-textarea" name="edit_end" placeholder="End Time" ></textarea>
									</div>
									<br>
									<li class="collapsible">Edit Experiences</li>
									<div class="content">
										<div class = "table-area">
										            <table class="table">
										              <thead>
										                <tr>
										                  <th class="col-md-1">JobTitle</th>
																			<th class="col-md-2">JobDefinition</th>
										                  <th class="col-md-3">Period</th>
										                </tr>
										              </thead>
										            </table>
										          <br>
										</div>
									</div>
									<div class="button-group-area mt-10">
										<button type='submit' class="genric-btn primary-border e-large">Save Changes</button>
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
			<script>
			var coll = document.getElementsByClassName("collapsible");
			var i;

			for (i = 0; i < coll.length; i++) {
			  coll[i].addEventListener("click", function() {
			    this.classList.toggle("active");
			    var content = this.nextElementSibling;
			    if (content.style.display === "block") {
			      content.style.display = "none";
			    } else {
			      content.style.display = "block";
			    }
			  });
			}
			</script>

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
