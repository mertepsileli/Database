<?php
	include("config.php");
	session_start();
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
		<title>Admin's Home Page</title>
		
		<link href="https://fonts.googleapis.com/css?family=Poppins:10,200,400,300,500,600,700" rel="stylesheet"> 
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

			 

			  <section class="admin-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Admin, Welcome!			
							</h1>
						</div>											
					</div>
				</div>
			</section>


		<!--<section style="position: relative; left: 100px;" class="popular-post-area pt-100">-->
			

		<section class="popular-post-area pt-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="single-feature">
							<form action="admin.php" method = "post">
							<button name = "deletion_requests_button"><a>Deletion Requests</a></button>
							</form>
							<p>
								Deletion Requests that made by companies.
							</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="single-feature">
							<form action = "admin.php" method = "post">
								<button name = "companies_button"> <a>Companies</a></button>
							</form>
							<p>
								Job Finder system companies are listed in this section.
							</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="single-feature">
							<form action="admin.php" method = "post">
							<button name = "home_page_button" onclick="window.location.href='index.php'"><a>Home Page</a></button>
							</form>
							<p>
								Turn to JobFinder system home page.
							</p>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="single-feature">
							<form action="admin.php" method = "post">
							<button name = job_seekers_button ><a>Job Seekers</a></button>
							</form>
							<p>
								Job Finder system users are listed in this section.
							</p>
						</div>
					</div>
					<?php
						$sql = "";
						if( isset($_POST['deletion_requests_button']))
							$flag = 0; // do nothing
						else if ( isset($_POST['companies_button']) )
						{
							$sql = "SELECT    c.company_name, c.web_site_link
									FROM      company as c";
							$flag = 2; // companies button
						}
						else if ( isset($_POST['job_seekers_button']))
						{
							$sql = "SELECT j.first_name, j.middle_initial, j.last_name, j.user_name
									FROM jobseeker as j";
							$flag = 3; // that means there will be only shown job seekers
						}
					?>
			</div>	

		</section>
		<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-8 post-list">
							<?php if( $flag == 0 || $flag == 1) { ?>
							<ul class="cat-list">
								<form action = "admin.php" method="post">
									<li><button name = "deleted_button" ><a>Deleted</a> </button></li>
									<li><button name = "waiting_button" > <a>Waiting</a> </button></li>
								</form>
							</ul>
							<?php
						}
								if( isset($_POST['deleted_button']) ){
									$sql = "SELECT comp.company_name, cr.comment, dr.comment_id
									FROM company as comp, company_review as cr, delete_req as dr
									WHERE 	comp.user_name = dr.ref_comp_user_name AND
											dr.comment_id = cr.comment_id AND
							         		dr.deletion_status = 'ACCEPTED'";
							        $flag = 1;
							        echo "deleted_button";
								}
								else if( isset($_POST['waiting_button']) ){
									$sql = "SELECT comp.company_name, cr.comment, dr.comment_id
									FROM company as comp, company_review as cr, delete_req as dr
									WHERE 	comp.user_name = dr.ref_comp_user_name AND
											dr.comment_id = cr.comment_id AND
							         		dr.deletion_status = 'UNDER_CONSIDERATION'";
							    	$flag = 0;
									echo "waiting_button";

							    }
							    else if( $flag == 0 )
							    {
									$sql = "SELECT comp.company_name, cr.comment, dr.comment_id
											FROM company as comp, company_review as cr, delete_req as dr
											WHERE 	comp.user_name = dr.ref_comp_user_name AND
													dr.comment_id = cr.comment_id AND
									         		dr.deletion_status = 'UNDER_CONSIDERATION'";
									$flag = 0;
									echo "no button";
								}
								$query = mysqli_query($db, $sql);
								$count = mysqli_num_rows($query);
								if( $count > 0 )
								{
									while ($row = mysqli_fetch_array($query) ) {
							?>
							<div class="single-post d-flex flex-row">
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<?php
											if( $flag == 3)
											{
												echo "<a";
												echo "<h4> Name: " . $row['first_name'] . " " . $row['middle_initial'] . " ";
												echo $row['last_name'] . "</h4></a>";
												echo "<h6> User ID:" . $row['user_name'] . "</h6>"; 
											}
											else if( $flag == 2)
											{
												echo "<a";
												echo "<h4> Company Name: " . $row['company_name'] . "</h4>";
												echo "</a>";
												echo "<h6> Web Site Link:" . $row['web_site_link'] . "</h6>"; 	
											}
											else{
												echo "<a";
												echo "href = \"single.html\">";
												echo "<h4>" . $row['company_name'] . "</h4>" . "</a>";
												echo "<h6> Comment ID:" . $row['comment_id'] . "</h6>"; 
											}
											?>
										</div>
											
										<?php 
											if( $flag == 0){
										?>
										<ul class="btns">
										<form action = "admin.php" method="post"> <button name = "accept_button"><p>Accept</p></button> </form>
										<?php
											if(isset($_POST['accept_button'])){
												$sql = "UPDATE delete_request as dr
														set deletion_status = 'ACCEPTED'
														WHERE dr.comment_id =" . $row['comment_id'];
												$query = mysqli_query($db, $sql);
											
												$deletion_sql = "DELETE FROM comment as c
														WHERE c.comment_id =" . $row['comment_id'];

												$del_query = mysqli_query($db, $deletion_sql);
												if( $del_query > 0 ){
													echo "	<script type=\"text/javascript\">
															alert(\"Comment is successfully deleted!\");
															</script>";
												}
												else{
													echo "	<script type=\"text/javascript\">
															alert(\"Problem has occurred about deletion. Try Again!\");
															</script>";
												}
											}
										?> 
										<form action="admin.php" method="post"> <button name="decline_button"><p>Decline</p></button> </form>
											<?php
												if(isset($_POST['decline_button'])){
													$sql = "UPDATE delete_request as dr
															set deletion_status = 'REJECTED'
															WHERE dr.comment_id = " . $row['comment_id'];
													$query = mysqli_query($db, $sql);
													if( $query > 0 ){
														echo "	<script type=\"text/javascript\">
																alert(\"Request is Rejected!\");
																</script>";
													}
													else{
														echo "	<script type=\"text/javascript\">
																alert(\"Problem has occurred about rejection. Try Again!\");
																</script>";
													}
												}
											?>
										</ul>
						<?php 
								}  ?>
								</div>
								<?php
								if( $flag == 0){
									echo "<p>" . $row['comment'] . "</p>";
								}

							}
						?>
								</div>
							</div>
									<?php
											}else{
									?>
									<div class="single-post d-flex flex-row">
											<div class="details">
												<div class="title d-flex flex-row justify-content-between">
													<div class="titles">

													<?php echo "<a <h4>There is no account or job seeker</h4> </a>";
													?>
											  				
													</div>			
												</div>
											</div>
										</div>
									<?php 
								}
									?>
							<!--
							<div class="single-post d-flex flex-row">
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="single.html"><h4>Company Name</h4></a>
											<h6>Comment Name - Comment ID</h6>					
										</div>
										<ul class="btns">
											<li><a href="#">Accept</a></li>
											<li><a href="#">Decline</a></li>
										</ul>
									</div>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
									</p>
								</div>
							</div>
							<div class="single-post d-flex flex-row">
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="single.html"><h4>Company Name</h4></a>
											<h6>Comment Name - Comment ID</h6>					
										</div>
										<ul class="btns">
											<li><a href="#">Accept</a></li>
											<li><a href="#">Decline</a></li>
										</ul>
									</div>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
									</p>
								</div>
							</div>
							<div class="single-post d-flex flex-row">
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="single.html"><h4>Company Name</h4></a>
											<h6>Comment Name - Comment ID</h6>					
										</div>
										<ul class="btns">
											<li><a href="#">Accept</a></li>
											<li><a href="#">Decline</a></li>
										</ul>
									</div>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
									</p>
								</div>
							</div>
							<div class="single-post d-flex flex-row">
								<div class="details">
									<div class="title d-flex flex-row justify-content-between">
										<div class="titles">
											<a href="single.html"><h4>Company Name</h4></a>
											<h6>Comment Name - Comment ID</h6>					
										</div>
										<ul class="btns">
											<li><a href="#">Accept</a></li>
											<li><a href="#">Decline</a></li>
										</ul>
									</div>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
									</p>
								</div>
							</div>
							-->
							<a class="text-uppercase loadmore-btn mx-auto d-block" href="category.html">Load More</a>
						</div>
					</div>
				</div>
			</section>
		<script type="text/javascript">
				if ( window.history.replaceState ) {
			        window.history.replaceState( null, null, window.location.href );
			    }
		</script>
	</body>
</html>