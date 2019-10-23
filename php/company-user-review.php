	<?php 
		include("config.php");
	    session_start();
	    
	    if($_SERVER["REQUEST_METHOD"] == "POST") {
	    	$comp_user_name = "veli";
	    	$j_user_name = "ali";

	    	$canComment = 0;

		    $satisfied_deadlines = $_POST['satisfied_deadlines'];
		    $work_efficiency = $_POST['work_efficiency'];
		    $ambition = $_POST['ambition'];
		    $compatibility = $_POST['compatibility'];
		    
		    $offices = mysqli_query($db,"SELECT office_id FROM works_for WHERE user_name = '$j_user_name'");

		    if(mysqli_num_rows($offices) > 0)
		    {	
		    		while($officeRow = mysqli_fetch_assoc($offices) )
		    		{
		    			$anOffice = $officeRow['office_id'];
		    			$officeCompany = mysqli_query($db,"SELECT user_name FROM office WHERE office_id = $anOffice");
		    			$names = mysqli_fetch_assoc($officeCompany);
		    			$name = $names['user_name'];
		    			
		    			if($name ==  $comp_user_name)
		    			{
		    				$canComment = 1;
		    				break;
		    			}
		    		}
		    }
		    if($canComment == 1){
		    	$overall = ($satisfied_deadlines + $work_efficiency + $ambition + $compatibility) / 4;
		    	$date = date("Y.m.d");

		  		mysqli_query($db,"INSERT INTO comment(date, overall_rate) VALUES ('$date','$overall')");
		  		
		  		$comment_id = mysqli_insert_id($db);
		    	mysqli_query($db,"INSERT INTO employee_review VALUES ('$comment_id','$work_efficiency','$satisfied_deadlines','$ambition','$compatibility')");


		    	mysqli_query($db,"INSERT INTO write_on VALUES ('$comment_id','$comp_user_name','$j_user_name')");
		    }
			else
			{
				echo "<script type='text/javascript'>alert('You cannot comment about this person because he/she did not work for you!');</script>";
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
								<h3 class="mb-30">Employee Review Page</h3>
								<form action="#" method="post">
									<p>Work Efficiency</p>
									<div class="default-select" id="default-select">
										<select name="work_efficiency">
											<option value="5">Perfect</option>
											<option value="4">Good</option>
											<option value="3">Average</option>
											<option value="2">Not good</option>
											<option value="1">Bad</option>
										</select>
									</div>
									<p>Satisfied Deadlines</p>
									<div class="default-select" id="default-select">
										<select name="satisfied_deadlines">
											<option value="5">Perfect</option>
											<option value="4">Good</option>
											<option value="3">Average</option>
											<option value="2">Not good</option>
											<option value="1">Bad</option>
										</select>
									</div>
									<p>Ambition</p>
									<div class="default-select" id="default-select">
										<select name="ambition">
											<option value="5">Perfect</option>
											<option value="4">Good</option>
											<option value="3">Average</option>
											<option value="2">Not good</option>
											<option value="1">Bad</option>
										</select>
									</div>
									<p>Compatibility</p>
									<div class="default-select" id="default-select">
										<select name="compatibility">
											<option value="5">Perfect</option>
											<option value="4">Good</option>
											<option value="3">Average</option>
											<option value="2">Not good</option>
											<option value="1">Bad</option>
										</select>
									</div>
									<div class="button-group-area mt-10">
										<button type="submit" class="genric-btn primary-border e-large">Send Review</button>
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