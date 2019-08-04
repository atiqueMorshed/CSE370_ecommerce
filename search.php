<?php 
include_once 'common/header.php';
include_once 'functions.php';

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
			<div class="col-lg-7 pb-5">
			<form action="" method="GET" id="srchForm"> 
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
	<div class="col-lg-4 pb-5">
		<div class="form-group p-5">
			<form action="" method="get">
				<select class="form-control bg-light" name="sortBy">
					<option value="Default">Default</option>
					<option value="PRICE ASC">Price (Low to High)</option>
					<option value="PRICE DESC">Price (High to Low)</option>
					<option value="PROPERTY_NAME ASC">Name (A to Z)</option>
					<option value="PROPERTY_NAME DESC">Name (Z to A)</option>
					<option value="SIZE ASC">Size (Low to High)</option>
					<option value="SIZE DESC">Size (High to Low)</option>
				</select>
				<div class="input-group-btn">
						<button class="btn btn-secondary bg-primary" id="sort" type="submit" name="sort-submit">
						<b>Sort</b>
						</button>
					</div>	
				</form>		  
				</div>
			</div>                                                                            
		</div>
	</div>
<!-- Sort bar End -->

<div class="container	">  

<!-- Filter Panel --
	<div class="row">
		<div class="col-lg-2">
			<div class="pl-3">
				<div class="border border-warning p-3">
					<h5 class="text-center">Filter</h5> <hr>

					<h6 class="text-info">No of Bedrooms</h6> <br>
					<ul class="list-group">
						<?php 
						$sql = "SELECT DISTINCT BEDROOM FROM property ORDER BY BEDROOM ASC";
						$result = mysqli_query($conn, $sql);
						while ($row = $result -> fetch_assoc()) {						
						?>
						<li class="list-group-item">
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" name="form-check-input product-check" value="<?= $row['BEDROOM']; ?>" id="bedroom"> <?= $row['BEDROOM']; ?>
								</label>
							</div>
						</li>
						<?php } ?>
					</ul>

					<br>
					<h6 class="text-info">No of Washrooms</h6> <br>
					<ul class="list-group">
						<?php 
						$sql = "SELECT DISTINCT WASHROOM FROM property ORDER BY WASHROOM ASC";
						$result = mysqli_query($conn, $sql);
						while ($row = $result -> fetch_assoc()) {						
						?>
						<li class="list-group-item">
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" name="form-check-input product-check" value="<?= $row['WASHROOM']; ?>" id="washroom"> <?= $row['WASHROOM']; ?>
								</label>
							</div>
						</li>
						<?php } ?>
					</ul>

					<br>
					<h6 class="text-info">Location</h6> <br>
					<ul class="list-group">
						<?php 
						$sql = "SELECT DISTINCT LOCATION FROM property ORDER BY LOCATION ASC";
						$result = mysqli_query($conn, $sql);
						while ($row = $result -> fetch_assoc()) {						
						?>
						<li class="list-group-item">
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" name="form-check-input product-check" value="<?= $row['LOCATION']; ?>" id="washroom"> <?= $row['LOCATION']; ?>
								</label>
							</div>
						</li>
						<?php } ?>
					</ul>

				</div>
			</div>
	</div>
 Filter Panel End -->

<!-- Search Page Body -->
	
	<div class="col-lg-12 pl-5 pb-5"> 

	<?php
	$srch_key = '';

	//if searching
	if (isset($_GET['submit']))
	 {
	   $srch_key = $_GET["q"];
		srch_rslt($srch_key);
	 } 
	 //if ordering
	  if (isset ($_GET["sort-submit"]))
	 { 
		 if ($_GET["sortBy"] == "Default") //for default value
		  {
			  srch_rslt($srch_key);
			}
	 else {
		 sort_order();  //for custom value 
	 }
	}
	
	?>
	</div>
	
	</div> 
	</div>
<!-- Search Page Body -->

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