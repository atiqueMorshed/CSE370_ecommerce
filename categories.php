<?php
include_once 'common/header.php';
require_once 'functions.php';
//DB connection
$username = "root";
$password = "";
$dbName = "house_buy";
$server = "localhost";
$conn = mysqli_connect($server, $username, $password, $dbName);
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>LERAMIZ - Landing Page Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="LERAMIZ Landing Page Template">
	<meta name="keywords" content="LERAMIZ, unica, creative, html">
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
</head>
<body>

	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
			<h2>Featured Listings</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Featured Listings</span>
		</div>
	</div>


<!-- Search bar -->
	<div class="container">
		<div class="row">
			<div class="col-sm-7 pb-5">
			<form action="categories.php" method="GET" id="srchForm">
				<div class="input-group p-5">
					<input type="text" class="form-control" placeholder="Location or Property Name" name="q" maxlength="20">
					<div class="input-group-btn">
						<button class="btn btn-secondary bg-primary" id="srch" type="submit" name="submit">
							<b class="glyphicon glyphicon-search">Find Property</b>
						</button>
					</div>
				</div>
			</form>
	</div>
<!-- Search bar End -->

<!-- Sort bar -->
	<div class="col-sm-4 pb-5">
		<div class="form-group p-5">
				<select class="form-control bg-secondary text-white">
					<option disabled selected>Sort By</option>
					<option> <button name="price_asc" > Price (Low to High) </button> </option>
					<option> <button name="price_desc" > Price (High to Low) </button> </option>
					<option> <button name="name_asc"> Name (Ascending) </button> </option>
					<option> <button name="name_desc"> Name (Descending) </button> </option>
					<option> <button name="asc"> Size (Ascending) </button> </option>
					<option> <button name="asc"> Size (Descdending) </button> </option>
				</select>
				</div>
			</div>
		</div>
	</div>
<!-- Sort bar End -->

<div class="container-fluid">

<!-- Filter Panel -->
	<div class="row">
		<div class="col-sm-2">
			<div class="pl-3">
							<div class="border border-warning p-3">
								<button type="button" class="btn btn-success btn-block" data-toggle="" data-target="#FilterDropDown"><strong>Filter</strong></button>
									<div id="FilterDropDown" class="">
										<p>Lorem ipsum dolor sit amet consectetur
										adipisicing elit. Velit accusamus
										necessitatibus architecto. Veniam, sapiente.
										Quisquam porro modi accusantium error sint?
										Ut laborum omnis corrupti dicta voluptas excepturi.
										Accusantium, asperiores vel?</p>
										</div>
									</div>
				</div>
	</div>
<!-- Filter Panel End -->

<!-- All Products -->

	<div class="col-lg-8 pl-5 pb-5">

	<?php
	if (isset($_GET['submit'])) {
		srch_rslt();
 }	else {
	 all_prod();
 }
	?>
	</div>

	</div>
	</div>
<!-- All Products End -->

<!-- Clients section -->
	<div class="clients-section">
		<div class="container">
			<div class="clients-slider owl-carousel">
				<a href="#">
					<img src="img/partner/1.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/2.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/3.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/4.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/5.png" alt="">
				</a>
			</div>
		</div>
	</div>
<!-- Clients section end -->


<!-- Footer section -->
	<?php
	include_once 'common/footer.php';
	?>
<!-- Footer section end-->

<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
