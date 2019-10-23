<?php  
	include("config.php");
	session_start();
	$username = "veli";
	$flag = 0;
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
		<title>
		<?php
			$sql = "SELECT 	*
					FROM  company as c
					WHERE  c.user_name = 'jose';"; // SESSION WILL INFORM THIS INPUT
			$query = mysqli_query($db, $sql);
			$row = mysqli_fetch_array($query);
			echo $row['company_name'] . "'s Page"; 
		?>

		</title>

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
				          <li class="menu-active"><a href="index.html">Home</a></li>
				          <li><a class="ticker-btn" href="#">Signup</a></li>
				          <li><a class="ticker-btn" href="#">Login</a></li>				          				          
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
								<?php 
								echo $row['company_name'];
								 ?>
							</h1>
							<div class="button-group-area mt-10">
								<a href="#" class="genric-btn primary-border e-large">Edit Company Profile</a>
							</div>	
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
								<div class="thumb">
									<img src="img/companylogo.png"></img>
								</div>
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a><h2>
												<?php
													echo $row['company_name']; 
												?>
											</h2></a>
										</div>
									<ul class="btns">
									<button class="genric-btn primary-border e-large" name = "follow_button" ><a>Follow</a></button>
									</ul>
									</div>
									<p>
										## company motto will be here 

									</p>
									<p class="address"><span class="lnr lnr-map"></span> 
									<?php
										echo $row[ 'city' ] . ", " . $row['country'] . ", " . $row['year'];
									?>
									</p>
								</div>
							</div>

							<div class="single-post job-details">
								<h4 class="single-title">Offices</h4>
								<?php  
									$sql = "SELECT    *
											FROM office as o
											WHERE o.user_name = 'jose'";
									$offices_query = mysqli_query($db, $sql);
									$count = mysqli_num_rows($offices_query);
									if( $count > 0 )
									{
										while( $row_offices = mysqli_fetch_array($offices_query)  ){

								?>
									<p>
										<?php 
											$office_id = $row_offices['office_id'];

										?>
										<p> <a href="office-page.php?office_id = $office_id" id="office_link">
											<?php
												echo $row_offices['city'] . ", " . $row_offices['street'] . " Office";
											?>
										</a></p>
									</p>

								<?php
										}
									}
									else
									{
										?>
										<h4>There is no office
										</h4>
										<?php
									}
								?>
								
							</div>
							<div class="single-post job-details">
								<h4 class="single-title">Description</h4>
								<p>
									<?php
									echo $row['company_motivation_letter'];
									?>
								</p>
							</div>
							<ul class="cat-list">
								<form action = "#" method = "post" >
									<button class="genric-btn primary-border e-small" name = "employee_button" ><a>Employee</a></button>
									<button class="genric-btn primary-border e-small" name = "candidates_button" ><a>Candidates</a></button>
								</form>
							</ul>
							<?php
								$candidate = 0;
								if( isset($_POST['employee_button']) ){
									$sql = "SELECT j.first_name, j.middle_initial, j.last_name
											FROM jobseeker as j, works_for as w, comp_and_office as comp
											WHERE j.user_name = w.user_name AND w.office_id = comp.office_id
											AND comp.user_name = 'jose'";
							        //echo "employee_button";
								}
								else if( isset($_POST['candidates_button']) ){
									$sql = "SELECT js.first_name, js.middle_initial, js.last_name
											FROM jobseeker as js, joboffer as jo, applies as a
											WHERE jo.offer_id = a.offer_id AND a.approval_status =  'UNDER_CONSIDERATION' AND
												 js.user_name = a.user_name AND jo.user_name = 'jose'";
							    	$candidate = 1;
									//echo "candidates_button";

							    }
							    else{
									$sql = "SELECT j.first_name, j.middle_initial, j.last_name
											FROM jobseeker as j, works_for as w, comp_and_office as comp
											WHERE j.user_name = w.user_name AND w.office_id = comp.office_id
											AND comp.user_name = 'jose'";
								}
								$query = mysqli_query($db, $sql);
								$count = mysqli_num_rows($query);
								
							?>
							<div class="single-post job-experience">
								<h4 class="single-title">
									<?php
										if($candidate == 0 )
										{
											echo "Employees";
										}
										else
										{
											echo "Candidates";
										}
									?>
								</h4>
								<ul>
									<?php
									if( $count > 0  && $candidate == 0 )
									{
										while ($row = mysqli_fetch_array($query) ) {
											
									?>
									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>
											<?php
												echo $row['first_name'] . " " . $row['middle_initial'] . " " . $row['last_name'] . " ";
											?>
										</span>
									</li>
									
									<?php
										}
									}
									else if($count > 0 && $flag == 1)
									{
										?>

									<li>
										<img src="img/pages/list.jpg" alt="">
										<span>
											<?php
												echo $row['first_name'] . " " . $row['middle_initial'] . " " . $row['last_name'] . " ";
											?>
										</span>
									</li>
									
										<?php

									}
									?>												
								</ul>
							</div>
							<ul class="cat-list">
								<form method = "post" action="#">
									<button class="genric-btn primary-border e-small"name = "make_review" ><a>Make Review</a></button>
									<button class="genric-btn primary-border e-small"name = "interview_button" ><a>Interview</a></button>
									<button class="genric-btn primary-border e-small"name = "general_button" ><a>General</a></button>
								</form>
							</ul>
							<div class="single-post job-experience">
								<h4 class="single-title">
									<?php
									$
										$flag = 0;
										if( isset($_POST['general_button']) ){
											$sql = "SELECT cr.comment, cr.anonymity, js.first_name, js.middle_initial, js.last_name
													FROM jobseeker as js, write_on as wr, company_review as cr
													WHERE cr.comment_id = wr.comment_id AND wr.comp_user_name = '$username' AND
															js.user_name = wr.j_user_name";
									        echo "General";
										}
										else if( isset($_POST['interview_button']) ){
											$sql = "SELECT ir.comment, ir.anonymity, js.first_name, js.middle_initial, js.last_name
													FROM jobseeker as js, write_on as wr, interview_review as ir
													WHERE ir.comment_id = wr.comment_id AND wr.comp_user_name = '$username' AND
															js.user_name = wr.j_user_name";
									    	$flag = 1;
											echo "Interview";

									    }
									    else
									    {
									    	$sql = "SELECT cr.comment, cr.anonymity, js.first_name, js.middle_initial, js.last_name
													FROM jobseeker as js, write_on as wr, company_review as cr
													WHERE cr.comment_id = wr.comment_id AND wr.comp_user_name = '$username' AND
															js.user_name = wr.j_user_name";
									        echo "General";
									    }
									?>
								Reviews About Company</h4>
								<ul>
									<?php
										$query = mysqli_query($db, $sql);
										$count = mysqli_num_rows($query);
										if( $count > 0)
										{
											while ($row = mysqli_fetch_array($query) ) {

												?>
											<li>
												<img src="img/pages/list.jpg" alt="">
												<span>
													<?php 
														echo $row['comment'];
													?>
													<h5>
														<?php
														if( $row['anonymity'] == "ANONYM")
															echo "ANONYM";
														else
															echo $row['first_name'] . " " .  $row['middle_initial'] . " " . $row['last_name'];
														?>
													</h5>
												</span>
											</li>

												<?php

											}
										}
										else
										{
											?>
											<li>
												<h4>
													There is no comment about company.
												</h4>
											</li>

											<?php
										}
									?>											
								</ul>
							</div>	
						<!-- Start post Area -->
		
					<div class="section-top-border">
						<h3 class="mb-30">Company Statistics</h3>
						<div class="progress-table-wrap">
							<div class="progress-table">
								<div class="table-head">
									<div class="serial">#</div>
									<div class="country">Labels</div>
									<div class="visit">Score</div>
									<div class="percentage">Avarage Score</div>
								</div>

								<?php
								$sql = "	SELECT SUM(number_of_workers) as avg_now
														FROM office 
														WHERE user_name = '$username'";

								$query = mysqli_query($db, $sql);
								$row = mysqli_fetch_array($query);
								$number_of_workers = $row['avg_now'];

								$sql = "		SELECT AVG(employee_value) as avg_ev
														FROM company_review NATURAL JOIN comment NATURAL JOIN write_on 
														WHERE comp_user_name='$username'";

								$query = mysqli_query($db, $sql);
								$row = mysqli_fetch_array($query);
								$employee_value = $row['avg_ev'];

								$sql =  "	SELECT AVG(work_life_balance) as avg_wlb
														FROM company_review NATURAL JOIN comment NATURAL JOIN write_on 
														WHERE comp_user_name='$username'";

								$query = mysqli_query($db, $sql);
								$row = mysqli_fetch_array($query);
								$work_life_balance = $row['avg_wlb'];

								$sql = "SELECT AVG(management_skills) as avg_ms
														FROM company_review NATURAL JOIN comment NATURAL JOIN write_on 
														WHERE comp_user_name='$username'";


								$query = mysqli_query($db, $sql);
								$row = mysqli_fetch_array($query);
								$management_skills = $row['avg_ms'];

								$sql = "	SELECT AVG(working_hour_salary_balance) as avg_whsb
																	FROM company_review NATURAL JOIN comment NATURAL JOIN write_on 
																	WHERE comp_user_name='$username'";

								$query = mysqli_query($db, $sql);
								$row = mysqli_fetch_array($query);
								$working_hour_salary_balance = $row['avg_whsb'];

								$sql = "	SELECT AVG(satisfied_expectancy) as avg_se
															FROM company_review NATURAL JOIN comment NATURAL JOIN write_on 
															WHERE comp_user_name='$username'";

								$query = mysqli_query($db, $sql);
								$row = mysqli_fetch_array($query);
								$satisfied_expectancy = $row['avg_se'];

								$sql = "	SELECT AVG(salary) as avg_salary
											FROM company_review NATURAL JOIN comment NATURAL JOIN write_on 
											WHERE comp_user_name='$username'";

								$query = mysqli_query($db, $sql);
								$row = mysqli_fetch_array($query);
								$salary = $row['avg_salary'];
								?>

								<div class="table-row">
									<div class="serial">01</div>
									<div class="country"> Number of Employee</div>
									<div class="visit">
										<?php
										echo $number_of_workers;
										?>
								</div>	
								</div>
								<div class="table-row">
									<div class="serial">02</div>
									<div class="country">Employee Value</div>
									<div class="visit">
										<?php
										echo $employee_value;
										?>
									</div>
								</div>
								<div class="table-row">
									<div class="serial">03</div>
									<div class="country"> Work-Life Balance</div>
									<div class="visit">
										<?php
										echo $work_life_balance;
										?>
									</div>
								</div>
								<div class="table-row">
									<div class="serial">04</div>
									<div class="country">Management Skill</div>
									<div class="visit">
										<?php
										echo $management_skills;
										?>
									</div>
								</div>

								<div class="table-row">
									<div class="serial">05</div>
									<div class="country">Working Hour-Salary Balance</div>
									<div class="visit">
										<?php
										echo $working_hour_salary_balance;
										?>
									</div>
								</div>

								<div class="table-row">
									<div class="serial">06</div>
									<div class="country">Satisfied Expectancy</div>
									<div class="visit">
										<?php
										echo $satisfied_expectancy;
										?>
									</div>
								</div>

								<div class="table-row">
									<div class="serial">07</div>
									<div class="country">Salary</div>
									<div class="visit">
										<?php
										echo $salary;
										?>
									</div>
								</div>
							</div>
						</div>
					</div>



					<h3 class="mb-30">Available Positions</h3>

							<?php 
							$searchRes = mysqli_query($db,"SELECT * FROM joboffer WHERE user_name='$username'");
			    			$result_number = mysqli_num_rows($searchRes);
							if($result_number > 0){
								while($row = mysqli_fetch_assoc($searchRes))
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
													<a href=\"single.html\"><h4>'$jobTitle'</h4></a>
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
													<a href=\"single.html\"><h4>'$jobTitle'</h4></a>
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
							else{
								echo  
								"
						            <div class=\"single-post d-flex flex-row\">	
										<div class=\"details\">
											<div class=\"title d-flex flex-row justify-content-between\">
												<div class=\"titles\">
													<a href=\"single.html\"><h4>There is not any job offer!</h4></a>				
												</div>
											</div>
										</div>
									</div>";
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
								<h4>Jobs by Category</h4>
								<ul class="cat-list">
									<li><a class="justify-content-between d-flex" href="category.html"><p>Technology</p><span>37</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Media & News</p><span>57</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Goverment</p><span>33</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Medical</p><span>36</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Restaurants</p><span>47</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Developer</p><span>27</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Accounting</p><span>17</span></a></li>
								</ul>
							</div>						
						</div>
					</div>
				</div>	
			</section>
			<!-- End post Area -->

			<!-- start footer Area -->		
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

			<script language="JavaScript">
			function yaziAc(varOne){
			var varFile = "yaziAlani" + varOne;
			var varFlag = document.getElementById(varFile);
			if (window.getComputedStyle(varFlag).visibility == "hidden"){
			 document.getElementById(varFile).style.visibility='visible';
			 } else {
			  document.getElementById(varFile).style.visibility='hidden';
			  //document.getElementById('link1').innerHTML='Yaziyi Aç;';
			 }
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







	

