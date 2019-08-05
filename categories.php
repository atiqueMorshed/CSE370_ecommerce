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
	<link href="img/favicon.ico" rel="shortcut icon" />

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/animate.css" />
	<link rel="stylesheet" href="css/owl.carousel.css" />
	<link rel="stylesheet" href="css/style.css" />
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
			<div class="col-lg-7 pt-3 pb-3">
				<form action="search.php" method="GET" id="srchForm">
					<div class="input-group p-5">
						<input type="text" class="form-control" placeholder="Street, Area, City or Property Name" name="q" maxlength="20">
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
			<div class="col-lg-4 pt-4">
				<div class="form-group p-3">
					<form action="categories.php" method="get">
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
							<button class="btn btn-success bg-primary btn-block" id="sort" type="submit" id="sort-s" name="sort-submit">
								<b>Sort</b>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<!-- Sort bar End -->


<!-- All products $ Filter Panel -->
	<div class="container-fluid">
		<div class="row">

	<!-- Filter Panel -->

			<div class="col-lg-2 border border-warning border-top-0 border-left-0 border-bottom-0">
				<h5 class="text-center">Filter Products</h5>
				<hr>
				<br>
				<h6 class="text-info">City</h6> <br>
				<ul class="list-group">
					<?php
					$sql = "SELECT DISTINCT city FROM property ORDER BY city ASC";
					$result = mysqli_query($conn, $sql);
					while ($row = $result->fetch_assoc()) {
						?>
						<li class="list-group-item">
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input product_check" value="<?= $row['city']; ?>" id="city"> <?= $row['city']; ?>
								</label>
							</div>
						</li>
					<?php } ?>
				</ul>
				<br>

				<h6 class="text-info">Size</h6> <br>
				<ul class="list-group">
					<?php
					$sql = "SELECT DISTINCT SIZE FROM property ORDER BY SIZE ASC";
					$result = mysqli_query($conn, $sql);
					while ($row = $result->fetch_assoc()) {
						?>
						<li class="list-group-item">
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input product_check" value="<?= $row['SIZE']; ?>" id="size"> <?= $row['SIZE']; ?> Sqft.
								</label>
							</div>
						</li>
					<?php } ?>
				</ul>
				<br>

				<h6 class="text-info">No of Bedrooms</h6> <br>
				<ul class="list-group">
					<?php
					$sql = "SELECT DISTINCT BEDROOM FROM property ORDER BY BEDROOM ASC";
					$result = mysqli_query($conn, $sql);
					while ($row = $result->fetch_assoc()) {
						?>
						<li class="list-group-item">
							<div class="form-check">
								<label class="form-check-label">
								<input type="checkbox" class="form-check-input product_check" value="<?= $row['BEDROOM']; ?>" id="bedroom"> <?= $row['BEDROOM']; ?>
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
					while ($row = $result->fetch_assoc()) {
						?>
						<li class="list-group-item">
							<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input product_check" value="<?= $row['WASHROOM']; ?>" id="washroom"> <?= $row['WASHROOM']; ?>
								</label>
							</div>
						</li>
					<?php } ?>
				</ul>			
			</div>
	<!-- Filter Panel End -->

	<!-- All Products -->
			<div class="col-lg-9">
				<h5 class="text-center" id="textChange">All Properties</h5> <br> <br>	

				<div class="row" id="result">
					<?php	
					if (isset ($_GET["sort-submit"]))
					{
						sort_order1();  //for custom value 
				   }				   
				   else {
					$sql = "SELECT * FROM  property";
					$result = $conn -> query($sql);
					while ($row = $result -> fetch_assoc()) {
					?>					
					<div class="col-md-3 mb-2">
						<div class="card-deck"> 
							<div class="card border-secondary"> 
							<a href="single-list.php?id=<?php echo $row['PROPERTY_ID'] ?>">	
								<img src="img/bg" class="card-img-top" alt="">							
								<div class="card-body">
									<h5 class="card-title text-info text-center"><?= $row['PROPERTY_NAME'];?></h5>
									<h6 class="card-title text-center"><?= $row['street'],', '. $row['area'],', '. $row['city']; ?></h6>
										<div class="room-info">
											<div class="rf-left">
											<h6 class="text-muted"><?= $row['SIZE'];?> Sqft.</h6> <br>
											<h6 class="text-muted"><?= $row['BEDROOM'];?> Bedroom(s)</h6> <br>
											</div>
											<div class="rf-right">
											<h6 class="text-muted"><?= $row['BALCONY'];?> Balcony(s)</h6> <br>
											<h6 class="text-muted"><?= $row['WASHROOM'];?> Washroom(s)</h6> <br>
											</div>
										</div> 
								</div> 
							</a>
							<div class="card-footer">

									<a href="buyconfirm.php?id=<?php echo $row['PROPERTY_ID'] ?>" target="_blank" class="btn btn-success btn-block"><h6 class="text-light"><?= $row['PRICE'];?> tk</h6></a>
									
								<!-- </form> -->
								</div>
							</div>
						</div>
					</div>
					<?php } }?>
				</div>
			</div>
		</div>
	</div>
	<!-- All Products End -->
<!-- All products $ Filter Panel End -->


<!-- Footer section -->
	<br> <br>
	<?php
	include_once 'common/footer.php';
	?>
<!-- Footer section end-->


<script type="text/Javascript">
		$(document).ready(function() {
			$(".product_check").click(function(){
				var action = 'data';
				var city = get_filter_text('city');
				var size = get_filter_text('size');
				var bedroom = get_filter_text('bedroom');
				var washroom = get_filter_text('washroom');				
				$.ajax ({
						url : 'action.php',
						method : 'POST',
						data : {action:action, city:city, size:size, bedroom:bedroom, washroom:washroom},
						success : function(response) {
							$("#result").html(response);
						}
					});
			});

		function get_filter_text(text_id) {
			var filterData = [];
			$('#'+text_id+':checked').each(function(){
				filterData.push($(this).val());
			});
			return filterData;
		}
	});
</script>


<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/x.js"></script>


</body>
</html>