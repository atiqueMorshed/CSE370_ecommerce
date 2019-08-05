<?php
include_once 'common/header.php';

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
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
			<h2>SINGLE LISTING</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Single Listing</span>
		</div>
	</div>

	<!-- Page -->
	<section class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 single-list-page">
					<div class="single-list-slider owl-carousel" id="sl-slider">
						<div class="sl-item set-bg" data-setbg="img/single-list-slider/1.jpg">
							<div class="sale-notic">FOR SALE</div>
						</div>
						<div class="sl-item set-bg" data-setbg="img/single-list-slider/2.jpg">
							<div class="rent-notic">FOR Rent</div>
						</div>
						<div class="sl-item set-bg" data-setbg="img/single-list-slider/3.jpg">
							<div class="sale-notic">FOR SALE</div>
						</div>
						<div class="sl-item set-bg" data-setbg="img/single-list-slider/4.jpg">
							<div class="rent-notic">FOR Rent</div>
						</div>
						<div class="sl-item set-bg" data-setbg="img/single-list-slider/5.jpg">
							<div class="sale-notic">FOR SALE</div>
						</div>
					</div>
					<div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">
						<div class="sl-thumb set-bg" data-setbg="img/single-list-slider/1.jpg"></div>
						<div class="sl-thumb set-bg" data-setbg="img/single-list-slider/2.jpg"></div>
						<div class="sl-thumb set-bg" data-setbg="img/single-list-slider/3.jpg"></div>
						<div class="sl-thumb set-bg" data-setbg="img/single-list-slider/4.jpg"></div>
						<div class="sl-thumb set-bg" data-setbg="img/single-list-slider/5.jpg"></div>
					</div>
					<div class="single-list-content">
						<div class="row">
							<div class="col-xl-8 sl-title">
								<h2>







								

<?php
   $id = $_GET['id'];
   $sql = "SELECT * FROM  property where PROPERTY_ID = $id";
   $result = mysqli_query($conn, $sql);
  // echo "$sql"; 
  // $r1 = $result['PROPERTY_NAME'];
   $resultCount = mysqli_num_rows($result);
   // echo "$resultCount";
  // echo "$result";

  while ($row = mysqli_fetch_assoc($result)) { 
	  echo $row['PROPERTY_NAME'];
  }
  
?>

</h2>



								<p><i class="fa fa-map-marker"></i>





<?php
   $id = $_GET['id'];
   $sql = "SELECT * FROM  property where PROPERTY_ID = $id";
   $result = mysqli_query($conn, $sql);
  // echo "$sql"; 
  // $r1 = $result['PROPERTY_NAME'];
   $resultCount = mysqli_num_rows($result);
   // echo "$resultCount";
  // echo "$result";

  while ($row = mysqli_fetch_assoc($result)) { 
	        echo $row['street'];
		echo "<h10>, </h10>";
		echo $row['area'];
		echo "<h10>, </h10>";
		echo $row['city'];
  }
  
?>







</p>
							</div>
							<div class="col-xl-4">
								<button class="price-btn">



<?php
   $id = $_GET['id'];
   $sql = "SELECT * FROM  property where PROPERTY_ID = $id";
   $result = mysqli_query($conn, $sql);
  // echo "$sql"; 
  // $r1 = $result['PROPERTY_NAME'];
   $resultCount = mysqli_num_rows($result);
   // echo "$resultCount";
  // echo "$result";

  while ($row = mysqli_fetch_assoc($result)) { 
		echo "<a target='_blank' href = 'buyconfirm.php?id=". $row['PROPERTY_ID'] ."'><h10 class='text-light'>TK: </h10>";
	        echo "<h10 class='text-light'>" . $row['PRICE'] . "</h10>";
  }
  
?>








</a>
							</div>
						</div>
						<h3 class="sl-sp-title">Property Details</h3>
						<div class="row property-details-list">
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-th-large"></i>




<?php
   $id = $_GET['id'];
   $sql = "SELECT * FROM  property where PROPERTY_ID = $id";
   $result = mysqli_query($conn, $sql);
  // echo "$sql"; 
  // $r1 = $result['PROPERTY_NAME'];
   $resultCount = mysqli_num_rows($result);
   // echo "$resultCount";
  // echo "$result";

  while ($row = mysqli_fetch_assoc($result)) { 
	        echo $row['SIZE'];
		echo "<h10> sqft</h10>";

  }
  
?>







</p>
								<p><i class="fa fa-bed"></i> 



<?php
   $id = $_GET['id'];
   $sql = "SELECT * FROM  property where PROPERTY_ID = $id";
   $result = mysqli_query($conn, $sql);
  // echo "$sql"; 
  // $r1 = $result['PROPERTY_NAME'];
   $resultCount = mysqli_num_rows($result);
   // echo "$resultCount";
  // echo "$result";

  while ($row = mysqli_fetch_assoc($result)) { 
	        echo $row['BEDROOM'];
		echo "<h10> Bedroom(s)</h10>";

  }
  
?>





</p>
								
							</div>
							<div class="col-md-4 col-sm-6">
							<p><i class="fa fa-building-o"></i> 


<?php
   $id = $_GET['id'];
   $sql = "SELECT * FROM  property where PROPERTY_ID = $id";
   $result = mysqli_query($conn, $sql);
  // echo "$sql"; 
  // $r1 = $result['PROPERTY_NAME'];
   $resultCount = mysqli_num_rows($result);
   // echo "$resultCount";
  // echo "$result";

  while ($row = mysqli_fetch_assoc($result)) { 
		echo "<h10>Balcony: </h10>";
	        echo $row['BALCONY'];
		

  }
  
?>






</p>

<p><i class="fa fa-user"></i> 




<?php
   $id = $_GET['id'];
   $sql = "SELECT * FROM  property where PROPERTY_ID = $id";
   $result = mysqli_query($conn, $sql);
  // echo "$sql"; 
  // $r1 = $result['PROPERTY_NAME'];
   $resultCount = mysqli_num_rows($result);
   // echo "$resultCount";
  // echo "$result";

  while ($row = mysqli_fetch_assoc($result)) { 
		echo "<h10>Owner: </h10>";
	        echo $row['USERNAME'];
		

  }
  
?>






</p>
							</div>
							<div class="col-md-4">
								<p><i class="fa fa-bath"></i> <?php
   $id = $_GET['id'];
   $sql = "SELECT * FROM  property where PROPERTY_ID = $id";
   $result = mysqli_query($conn, $sql);
  // echo "$sql"; 
  // $r1 = $result['PROPERTY_NAME'];
   $resultCount = mysqli_num_rows($result);
   // echo "$resultCount";
  // echo "$result";

  while ($row = mysqli_fetch_assoc($result)) { 
		echo "<h10>Washroom: </h10>";
	        echo $row['WASHROOM'];
		

  }
  
?>



</p>
								
							</div>
						</div>
						<h3 class="sl-sp-title">Description</h3>
						<div class="description">
							<p>




<?php
   $id = $_GET['id'];
   $sql = "SELECT * FROM  property where PROPERTY_ID = $id";
   $result = mysqli_query($conn, $sql);
  // echo "$sql"; 
  // $r1 = $result['PROPERTY_NAME'];
   $resultCount = mysqli_num_rows($result);
   // echo "$resultCount";
  // echo "$result";

  while ($row = mysqli_fetch_assoc($result)) { 
echo $row['Description'];
		

  }
  
?>







</p>
							</div>
						<h3 class="sl-sp-title">Property Details</h3>
						<div class="row property-details-list">
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-check-circle-o"></i> Air conditioning</p>
								<p><i class="fa fa-check-circle-o"></i> Telephone</p>
								<p><i class="fa fa-check-circle-o"></i> Laundry Room</p>
							</div>
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-check-circle-o"></i> Central Heating</p>
								<p><i class="fa fa-check-circle-o"></i> Family Villa</p>
								<p><i class="fa fa-check-circle-o"></i> Metro Central</p>
							</div>
							<div class="col-md-4">
								<p><i class="fa fa-check-circle-o"></i> City views</p>
								<p><i class="fa fa-check-circle-o"></i> Internet</p>
								<p><i class="fa fa-check-circle-o"></i> Electric Range</p>
							</div>
						</div>
						<h3 class="sl-sp-title bd-no">Floorplans</h3>
						<div id="accordion" class="plan-accordion">
							<div class="panel">
								<div class="panel-header" id="headingOne">
									<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">First Floor: 	<i class="fa fa-angle-down"></i></button>
								</div>
								<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="panel-body">
										


<?php
   $id = $_GET['id'];
   $sql = "SELECT * FROM  property where PROPERTY_ID = $id";
   $result = mysqli_query($conn, $sql);
  // echo "$sql"; 
  // $r1 = $result['PROPERTY_NAME'];
   $resultCount = mysqli_num_rows($result);
   // echo "$resultCount";
  // echo "$result";

  while ($row = mysqli_fetch_assoc($result)) { 
		
	        echo $row['floor1'];
		

  }
  
?>

									</div>
								</div>
							</div>
							<div class="panel">
								<div class="panel-header" id="headingTwo">
									<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">Second Floor	<i class="fa fa-angle-down"></i>
									</button>
								</div>
								<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
									<div class="panel-body">
										




<?php
   $id = $_GET['id'];
   $sql = "SELECT * FROM  property where PROPERTY_ID = $id";
   $result = mysqli_query($conn, $sql);
  // echo "$sql"; 
  // $r1 = $result['PROPERTY_NAME'];
   $resultCount = mysqli_num_rows($result);
   // echo "$resultCount";
  // echo "$result";

  while ($row = mysqli_fetch_assoc($result)) { 

	echo $row['floor2'];
		
  }
  
?>






									</div>
								</div>
							</div>
							<div class="panel">
								<div class="panel-header" id="headingThree">
									<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Third Floor : <i class="fa fa-angle-down"></i>
									</button>
								</div>
								<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
									<div class="panel-body">
										


<?php
   $id = $_GET['id'];
   $sql = "SELECT * FROM  property where PROPERTY_ID = $id";
   $result = mysqli_query($conn, $sql);
  // echo "$sql"; 
  // $r1 = $result['PROPERTY_NAME'];
   $resultCount = mysqli_num_rows($result);
   // echo "$resultCount";
  // echo "$result";

  while ($row = mysqli_fetch_assoc($result)) { 

	echo $row['floor3'];
		
  }
  
?>







									</div>
								</div>
							</div>
						</div>

																	<h3 class="sl-sp-title bd-no">Location</h3>
						<div class="pos-map" id="map-canvas"></div>
					</div>
				</div>
				<!-- sidebar -->
				<div class="col-lg-3 col-md-7 sidebar">
				<div class="contact-form-card">
						<h5>Do you have any question?</h5>
						<form>
							<input type="text" placeholder="Your name">
							<input type="text" placeholder="Your email">
							<textarea placeholder="Your question"></textarea>
							<button>SEND</button>
						</form>
					</div>
										
	</section>
	<!-- Page end -->


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

	<!-- Footer Section -->
	<?php
	include_once 'common/footer.php';
	?>
	<!-- Footer Section -->
<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/main.js"></script>


	<!-- load for map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo"></script>
	<script src="js/map-2.js"></script>

</body>
</html>
