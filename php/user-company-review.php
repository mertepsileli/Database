	<?php 
		include("config.php");
	    session_start();
	    
	    if($_SERVER["REQUEST_METHOD"] == "POST") {
	    	$j_user_name = "ali";
	    	$comp_user_name = "veli";

	    	$canComment = 0;

		    $employee_value = $_POST['employee_value'];
		    $work_life_balance = $_POST['work_life_balance'];
		    $management_skills = $_POST['management_skills'];
		    $career_opportunities = $_POST['career_opportunities'];
		    $work_salary_balance = $_POST['work_salary_balance'];
		    $satisfied_expectancy = $_POST['satisfied_expectancy'];
		    $salary = $_POST['salary'];
		    $anonymity = $_POST['anonymity'];
		    $comment = $_POST['comment'];
		    $pros = $_POST['pros']; 
		    $cons = $_POST['cons']; 
		    
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
		    	$overall = ($employee_value + $work_life_balance + $management_skills + $career_opportunities + $work_salary_balance + $satisfied_expectancy) / 6;
		    	$date = date("Y.m.d");

		  		mysqli_query($db,"INSERT INTO comment(date, overall_rate) VALUES ('$date','$overall')");
		  		
		  		$comment_id = mysqli_insert_id($db);
		    	mysqli_query($db,"INSERT INTO company_review VALUES ('$comment_id','$employee_value','$work_life_balance','$management_skills','$career_opportunities','$work_salary_balance','$satisfied_expectancy','$pros','$cons', $salary , '$comment', '$anonymity')");


		    	mysqli_query($db,"INSERT INTO write_on VALUES ('$comment_id','$comp_user_name','$j_user_name')");
		    }
			else
			{
				echo "<script type='text/javascript'>alert('You cannot comment about this company because you did not work there!');</script>";
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
								<h3 class="mb-30">Company Review Page</h3>
								<form action="#" method="post">
									<p>Employee Value</p>
									<div class="default-select" id="default-select">
										<select name="employee_value">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</div>
									<p>Work Life Balance</p>
									<div class="default-select" id="default-select">
										<select name="work_life_balance">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</div>
									<p>Management Skills</p>
									<div class="default-select" id="default-select">
										<select name="management_skills">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</div>
									<p>Career Opportunities</p>
									<div class="default-select" id="default-select">
										<select name="career_opportunities">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</div>
									<p>Work Salary Balance</p>
									<div class="default-select" id="default-select">
										<select name="work_salary_balance">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</div>
									<p>Satisfied Expectancy</p>
									<div class="default-select" id="default-select">
										<select name="satisfied_expectancy">
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
										</select>
									</div>
									<p>Montly Salary</p>
									<div class="default-select" id="default-select">
										<select name="salary">
											<option value="30000">>30.000$</option>
											<option value="20000">>20.000$</option>
											<option value="10000">>10.000$</option>
											<option value="5000">>5.000$</option>
											<option value="1000">>1.000$</option>
										</select>
									</div>
									<p>Anonymity</p>
									<div class="default-select" id="default-select">
										<select name="anonymity">
											<option value="NORMAL">Normal</option>
											<option value="ANONYM">Anonym</option>									
										</select>
									</div>
									<div class="mt-10">
										<textarea name="comment" class="single-textarea" placeholder="Comments" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Comments'" required></textarea>
									</div>
									<div class="mt-10">
										<textarea name="pros" class="single-textarea" placeholder="Pros" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pros'" required></textarea>
									</div>
									<div class="mt-10">
										<textarea name="cons" class="single-textarea" placeholder="Cons" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cons'" required></textarea>
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