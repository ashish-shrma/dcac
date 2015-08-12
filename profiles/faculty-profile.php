<?php
session_start();
$_SESSION['id'] = $_GET['id'];
include '_database/database.php';
$user_id=$_SESSION['id'];
$sql = "SELECT * FROM user where user_id='$user_id'";
    $result = mysqli_query($database,$sql) or die(mysqli_error()); 
    $row = mysqli_fetch_array($result); 

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from chanchandrue.net/themes/marinka/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Aug 2015 06:48:31 GMT -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $row['user_firstname']." ".$row['user_lastname']." Profile"  ?></title>
	<meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top">

	<!-- start:main -->
	<div class="container" id="main">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
				<div id="sidebar">
				<br><br><br><br>
					<div class="user">
						<div class="text-center">
							<img src="userfiles/avatars/<?php echo $row['user_avatar'];?>" class="img-responsive img-circle">
						</div>
						<div class="user-head">
							<h1 class="text-uppercase"><?php echo $row['user_firstname']."<br>".$row['user_lastname'] ?></h1>
							<div class="hr-center"></div>
							<h5><?php echo $row['user_profession'];?></h5>
						</div>
					</div>
					<div class="link-me">
						<div class="text-center">
							<a href="userfiles/profiles/<?php echo $row['user_profile'];?>"><i class="fa fa-download fa-2x" data-toggle="tooltip" data-placement="top" title="Download My CV"></i></a>
						</div>
						<div class="hr-center"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
				<div id="content">
					<!-- start:navbar -->
					<nav class="navbar navbar-default navbar-static-top" role="navigation">
						<div class="navbar-header page-scroll">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav navbar-left">
								<li class="page-scroll"><a href="#id-profile">// Profile</a></li>
								<li class="page-scroll"><a href="#id-resume">// Resume</a></li>
								<li class="page-scroll"><a href="#id-contact">// Contact</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class="page-scroll"><a href="#id-work">
									<i class="fa fa-angle-double-down"></i>
								</a></li>
							</ul>
						</div>
					</nav>
					<!-- end:navbar -->

					<!-- start:main content -->
					<div class="main-content">
						<ul class="timeline">
							<!-- start:profile -->
							<li id="id-profile">
								<div class="timeline-badge default"><i class="fa fa-user"></i></div>
								<h1 class="timeline-head">PROFILE</h1>
							</li>
					        <li id="profile">
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel">
					          		<h1><strong><?php echo $row["user_prefix"]." ".$row["user_firstname"]." ".$row["user_lastname"];?></strong></h1>
					          		<h4><?php echo "Department of ".$row['user_papers']."<br>".$row['user_profession'];?></h4>
					          		<div class="hr-left"></div>
					          		
					          		<p><?php echo $row['user_shortbio']?></p>
					          	</div>
					        </li>
					        <li id="personal-info">
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel">
					          		<h1>Personal Info</h1>
					          		<div class="hr-left"></div>

					          		<div class="btn-group">
									  	<button type="button" disabled class="btn btn-primary">Name</button>
									  	<button type="button" disabled class="btn btn-default"><?php echo $row['user_firstname']." ".$row['user_lastname']?></button>
									</div>
									<div class="btn-group">
									  	<button type="button" disabled class="btn btn-primary">Date of birth</button>
									  	<button type="button" disabled class="btn btn-default"><?php echo $row['user_dob']?></button>
									</div>
									<div class="btn-group">
									  	<button type="button" disabled class="btn btn-primary">Email</button>
									  	<button type="button" disabled class="btn btn-default"><?php echo $row['user_email']?></button>
									</div>
									<div class="btn-group">
									  	<button type="button" disabled class="btn btn-primary">Address</button>
									  	<button type="button" disabled class="btn btn-default"><?php echo $row['user_address']?></button>
									</div>
									<div class="btn-group">
									  	<button type="button" disabled class="btn btn-primary">Phone</button>
									  	<button type="button" disabled class="btn btn-default"><?php echo $row['user_contact']?></button>
									</div>
									<div class="btn-group">
									  	<button type="button" disabled class="btn btn-primary">Website</button>
									  	<button type="button" disabled class="btn btn-default"><?php echo $row['user_website']?></button>
									</div>
					          	</div>
					        </li>
					        <!-- end:profile -->

					        <!-- start:resume -->
					        <li id="id-resume">
					        	<div class="timeline-badge default"><i class="fa fa-file"></i></div>
					        	<h1 class="timeline-head">RESUME</h1>
					        </li>
					        <li id="resume">
					          	<div class="timeline-badge warning"></div>
					          	<div class="timeline-panel">
						          	<h1>Work Experience</h1>
						          	<div class="hr-left"></div>
						          	<div class="work-experience">
						          		<h3>Web designer</h3>
						          		<small><i class="fa fa-calendar"></i> 2010 - 2014</small>
						          		<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
						          		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						          		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						          	</div>
						          	<hr>
						          	<div class="work-experience">
						          		<h3>Graphic Designer</h3>
						          		<small><i class="fa fa-calendar"></i> 2010 - 2012</small>
						          		<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
						          		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						          		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						          	</div>
						          	<hr>
						          	<div class="work-experience">
						          		<h3>Web Security</h3>
						          		<small><i class="fa fa-calendar"></i> 2008 - 2010</small>
						          		<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
						          		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						          		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						          	</div>
					          	</div>
					        </li>
					        <li id="resume">
					          	<div class="timeline-badge warning"></div>
					          	<div class="timeline-panel">
						          	<h1>Education</h1>
						          	<div class="hr-left"></div>
						          	<div class="work-experience">
						          		<h3>Web Developer Collage</h3>
						          		<small><i class="fa fa-calendar"></i> 2010 - 2014</small>
						          		<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
						          		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						          		proident.</p>
						          	</div>
						          	<hr>
						          	<div class="work-experience">
						          		<h3>Institude IT</h3>
						          		<small><i class="fa fa-calendar"></i> 2010 - 2012</small>
						          		<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
						          		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						          		proident.</p>
						          	</div>
						          	<hr>
						          	<div class="work-experience">
						          		<h3>Web Design School</h3>
						          		<small><i class="fa fa-calendar"></i> 2008 - 2010</small>
						          		<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
						          		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						          		proident.</p>
						          	</div>
					          	</div>
					        </li>
					        
					        <!-- end:resume -->

					        <!-- start:blog -->
					       
					        <!-- start:contact -->
					        <li id="id-contact">
					        	<div class="timeline-badge default"><i class="fa fa-envelope"></i></div>
					        	<h1 class="timeline-head">CONTACT</h1>
					        </li>
					    
					        <li>
					          	<div class="timeline-badge primary"></div>
					          	<div class="timeline-panel">
					          		<h1>Contact Info</h1>
					          		<div class="hr-left"></div>
					          		<div class="row" id="contact">
					          			<div class="col-md-6">
					          				<address>
											  	<strong class="text-uppercase" ><?php echo $row['user_firstname']." ".$row['user_lastname']?></strong><br>
											  	<?php echo $row['user_address']?>
											  	<br><abbr title="Phone">P:</abbr> <?php echo $row['user_contact']?>
											  <br>	<a href="mailto:#"><?php echo $row['user_email']?></a>
											</address>
					          			</div>
					       
					          		</div>
					          		
					          	</div>
					        </li>
					        <!-- end:contact -->
					    </ul>
					</div>
					<!-- end:main content -->
				</div>
			</div>
		</div>
	</div>
	<!-- end:main -->

	<!-- start:footer -->
	<footer>
		<div class="container">
			<div class="text-center">
				<p>Copyright &copy; 2015. All Right reserved</p>
			</div>
		</div>
	</footer>
	<!-- end:footer -->

	<!-- start:javascript -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/marinka.js"></script>
	<script src="js/portfolio.jquery.js"></script>
	<script src="js/jquery.easing.min.js"></script>
	<script src="js/scrolling-nav.js"></script>
	<script src="js/jquery.scrollUp.js"></script>
	<!-- end:javascript -->

</body>

<!-- Mirrored from chanchandrue.net/themes/marinka/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Aug 2015 06:50:30 GMT -->
</html>