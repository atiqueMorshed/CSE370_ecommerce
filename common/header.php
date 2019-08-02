<?php include_once 'resources/session.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php if(isset($page_title)) echo $page_title ?></title>
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
<body>
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
							<a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
		          <a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a>
		          <a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
		          <a href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i></a>
		          <a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
						</div>
						<div class="user-panel">
							<?php if(!isset($_SESSION['username'])): ?>
								<a href="registration.php"><i class="fa fa-user-circle-o"></i> Register</a>
								<a href="login.php"><i class="fa fa-sign-in"></i> Login</a>
							<?php else: ?>
								<a href="sellHouse.php"><i class="fa fa-user-circle-o"></i> Sell Property</a>
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
						<a href="index.php" class="site-logo"><img src="img/logo.png" alt=""></a>
						<div class="nav-switch">
							<i class="fa fa-bars"></i>
						</div>
						<ul class="main-menu">
							<li><a href="index.php">Home</a></li>
							<li><a href="categories.php">FEATURED LISTING</a></li>
							<li><a href="about.php">ABOUT US</a></li>
							<li><a href="sellHouse.php">Sell Property</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->
