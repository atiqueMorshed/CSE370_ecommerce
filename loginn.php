<?php include_once 'resources/session.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>HouseBuy - Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/custom.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body background="img/bg.jpg">
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 header-top-left">
						<div class="top-info">
							<i class="fa fa-phone"></i>
							(+88) 01711112223
						</div>
						<div class="top-info">
							<i class="fa fa-envelope"></i>
							support@housebuy.com
						</div>
					</div>
					<div class="col-lg-6 text-lg-right header-top-right">
						<div class="top-social">
							<a href=""><i class="fa fa-facebook"></i></a>
							<a href=""><i class="fa fa-twitter"></i></a>
							<a href=""><i class="fa fa-instagram"></i></a>
							<a href=""><i class="fa fa-pinterest"></i></a>
							<a href=""><i class="fa fa-linkedin"></i></a>
						</div>
						<div class="user-panel">
							<?php if(!isset($_SESSION['username'])): ?>
								<a href="registration.php"><i class="fa fa-user-circle-o"></i> Register</a>
								<a href="login.php"><i class="fa fa-sign-in"></i> Login</a>
							<?php else: ?>
								<a href=""><i class="fa fa-user-circle-o"></i> Profile</a>
								<a href="logout.php"><i class="fa fa-sign-in"></i> Logout</a>
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="site-navbar">
						<a href="#" class="site-logo"><img src="img/logo.png" alt=""></a>
						<div class="nav-switch">
							<i class="fa fa-bars"></i>
						</div>
						<ul class="main-menu">
							<li><a href="index.html">Home</a></li>
							<li><a href="categories.html">FEATURED LISTING</a></li>
							<li><a href="about.html">ABOUT US</a></li>
							<li><a href="single-list.html">Pages</a></li>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->

	<div class="container-fluid h-100">
		<div class="row justify-content-center align-items-center h-100">
				<div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
					<form method="post" action="">
						<div class="form-row">
							<div class="form-group col-md-6">
								<input type="text" class="form-control form-control-lg" id="name" placeholder="Name" name="name">
							</div>
							<div class="form-group col-md-6">
								<input type="username" class="form-control form-control-lg" id="username" placeholder="Username" name="username">
							</div>
						</div>
						<div class="form-group">
								<input type="email" class="form-control form-control-lg" placeholder="Email" name="email">
						</div>
						<div class="form-group">
								<input class="form-control form-control-lg" placeholder="Password" type="password" name="password">
						</div>
						<div class="form-group">
							<input type="phone" class="form-control form-control-lg" id="phone" placeholder="(+880)-" name="phone">
						</div>
						<div class="form-group">
							<input type="text" class="form-control form-control-lg" id="address" placeholder="Address" name="address">
						</div>
						<div class="form-group">
								<button class="btn-lg btn-block site-btn" type="submit" name="registerbtn" value="Register">Register</button>
						</div>
						<div class="form-group">
								<p>Already a member? <a href="login.php">Login<a/></p>
						</div>
						</form>
				</div>
		</div>
	</div>




	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
