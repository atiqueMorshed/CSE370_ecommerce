<?php
$page_title = "HouseBuy - Home";
include_once 'common/header.php';
//DB connection
$username = "root";
$password = "";
$dbName = "house_buy";
$server = "localhost";
$conn = mysqli_connect($server, $username, $password, $dbName);
?>


	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/bg.jpg">
		<div class="container hero-text text-white">
			<h2>find your place with our local life style</h2>
			<p>Search real estate property records, houses, condos, land and more on houseBuy.com®.<br>Find property info from the most comprehensive source data.</p>
			<a href="categories.php" class="site-btn">VIEW DETAIL</a>
		</div>
	</section>
	<!-- Hero section end -->

<!-- Properties section -
	<section class="properties-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>RECENT PROPERTIES</h3>
				<p>Discover how much the latest properties have been sold for</p>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="propertie-item set-bg" data-setbg="img/propertie/1.jpg">
						<div class="sale-notic">FOR SALE</div>
						<div class="propertie-info text-white">
							<div class="info-warp">
								<h5>176 Kingsberry, Dr Anderson</h5>
								<p><i class="fa fa-map-marker"></i> Rochester, NY 14626</p>
							</div>
							<div class="price">$1,777,000</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="propertie-item set-bg" data-setbg="img/propertie/2.jpg">
						<div class="rent-notic">FOR Rent</div>
						<div class="propertie-info text-white">
							<div class="info-warp">
								<h5>45 Lianne Dr, Greece Street</h5>
								<p><i class="fa fa-map-marker"></i> Tasley, VA 23441</p>
							</div>
							<div class="price">$1255/month</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="propertie-item set-bg" data-setbg="img/propertie/3.jpg">
						<div class="sale-notic">FOR SALE</div>
						<div class="propertie-info text-white">
							<div class="info-warp">
								<h5>6101 Aqua Ave Apt 603</h5>
								<p><i class="fa fa-map-marker"></i> Miami Beach, FL 33141</p>
							</div>
							<div class="price">$150,000</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="propertie-item set-bg" data-setbg="img/propertie/4.jpg">
						<div class="rent-notic">FOR Rent</div>
						<div class="propertie-info text-white">
							<div class="info-warp">
								<h5>339 N Oakhurst Dr Apt 303</h5>
								<p><i class="fa fa-map-marker"></i> Beverly Hills, CA 90210</p>
							</div>
							<div class="price">$3000/month</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
-- Properties section end -->


<!-- Services section -->
	<section class="services-section spad set-bg" data-setbg="img/service-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<img src="img/service.jpg" alt="">
				</div>
				<div class="col-lg-5 offset-lg-1 pl-lg-0">
					<div class="section-title text-white">
						<h3>OUR SERVICES</h3>
						<p>We provide the perfect service for </p>
					</div>
					<div class="services">
						<div class="service-item">
							<i class="fa fa-comments"></i>
							<div class="service-text">
								<h5>Consultant Service</h5>
								<p>In Aenean purus, pretium sito amet sapien denim consectet sed urna placerat sodales magna leo.</p>
							</div>
						</div>
						<div class="service-item">
							<i class="fa fa-home"></i>
							<div class="service-text">
								<h5>Properties Management</h5>
								<p>In Aenean purus, pretium sito amet sapien denim consectet sed urna placerat sodales magna leo.</p>
							</div>
						</div>
						<div class="service-item">
							<i class="fa fa-briefcase"></i>
							<div class="service-text">
								<h5>Renting and Selling</h5>
								<p>In Aenean purus, pretium sito amet sapien denim consectet sed urna placerat sodales magna leo.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- Services section end -->

<!-- Gallery section -->
	<section class="gallery-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>Popular Places</h3>
				<p>We understand the value and importance of place</p>
			</div>
			<div class="gallery">
				<div class="grid-sizer"></div>
				<a href="search.php?q=chittagong&submit=" class="gallery-item grid-long set-bg" data-setbg="img/places/chittagong.jpg">
					<div class="gi-info">
						<h3>Chittagong</h3>
						<p><?php 
						$sql = "SELECT * from property WHERE city = 'Chittagong'";
						$result = mysqli_query($conn, $sql);		
						$resultCount = mysqli_num_rows($result);
						echo "$resultCount", " Properties";
						 ?></p>
					</div>
				</a>
				<a href="search.php?q=Dhaka&submit=" class="gallery-item grid-wide set-bg" data-setbg="img/places/dhaka.jpg">
					<div class="gi-info">
						<h3>Dhaka</h3>
						<p><?php 
						$sql = "SELECT * from property WHERE city = 'Dhaka'";
						$result = mysqli_query($conn, $sql);		
						$resultCount = mysqli_num_rows($result);
						echo "$resultCount", " Properties";
						 ?></p>
					</div>
				</a>
				<a href="search.php?q=Rangpur&submit=" class="gallery-item grid-long set-bg" data-setbg="img/places/rangpur.jpg">
					<div class="gi-info">
						<h3>Rangpur</h3>
						<p><?php 
						$sql = "SELECT * from property WHERE city = 'Rangpur'";
						$result = mysqli_query($conn, $sql);		
						$resultCount = mysqli_num_rows($result);
						echo "$resultCount", " Properties";
						 ?></p>
					</div>
				</a>
			</div>
		</div>
	</section>
<!-- Gallery section end -->


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

<?php
include_once 'common/footer.php';
 ?>
