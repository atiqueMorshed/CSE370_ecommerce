<!-- <?php
  include_once 'resources/session.php';
  include_once 'resources/Database.php';
  include_once 'resources/regFunc.php';

  if(isset($_POST['submit'])) {
		$form_errors = array();
		$required_fields=array('street', 'city', 'state', 'size', 'bedroom', 'washroom', 'balcony');
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    if(empty($form_errors)) {
      $username = $_SESSION['username'];
      $street = $_POST['street'];
      $city = $_POST['city'];
      $state = $_POST['state'];
      $size = $_POST['size'];
      $bedroom = $_POST['bedroom'];
      $washroom = $_POST['washroom'];
      $balcony = $_POST['balcony'];
      $pid = 0;
      $description = $_POST['description'];

			// $sqlQuery = "SELECT* FROM user WHERE username = :username";
			// $statement = $db->prepare($sqlQuery);
			// $statement->execute(array(':username' => $username));

      try {
        //$sqlInsert = "INSERT INTO preproperty(PRE_ID, username, bedroom, washroom, balcony, size, street, city, state, Description)
        VALUES(:pid, :username, :bedroom, :washroom, :balcony, :size, :street, :city, :state, :description)";
        $sqlInsert = "INSERT INTO `preproperty`(`PRE_ID`, `USERNAME`, `bedroom`, `washroom`, `balcony`, `size`, `street`, `city`, `state`, `Description`) VALUES (:pid, :username, :bedroom, :washroom, :balcony, :size, :street, :city, :state, :description)";
        $statement = $db->prepare($sqlInsert);
        $statement->execute(array(':pid'=> $pid,':username'=>$username,':bedroom'=>$bedroom,':washroom'=>$washroom,':balcony'=> $balcony,':size'=>$size,':street'=>$street,':city'=>$city,':state'=>$state,':description'=>$description));
        if($statement->rowCount() == 1) {
          $result = flashMessage("Thank you!", "Pass");
        }
      } catch (PDOException $ex) {
          $result = flashMessage("An error has occured: " .$ex->getMessage());
      }
		else {
			if (count($form_errors) == 1) {
        $result = flashMessage("There was 1 error in the form.");
      }
      else{
        $result = flashMessage("There were " .count($form_errors). " errors in the form.");
      }
	}
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
	<title>HouseBuy - Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

  <!-- Stylesheets -->
	<!--<link rel="stylesheet" href="css/bootstrap.min.css"/> -->
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>

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
							(+88) 666 121 4321
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
							<li><a href="index.php">Home</a></li>
							<li><a href="categories.php">FEATURED LISTING</a></li>
							<li><a href="about.php">ABOUT US</a></li>
							<li><a href="single-list.php">Pages</a></li>
							<li><a href="sellHouse.php">Sell Property</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
			<h2>Sell Your Property</h2>
		</div>
	</section>
	<!--  Page top end -->

  <!-- seperator -->
  <br><br>
  <div class="">
    <div class="row justify-content-center align-items-center ">
          <h2 style="color:#30CAA0">How it works</h2>
    </div>
  </div>
  <br><br>

  <!-- Services section -->
  <section class="services-section spad set-bg" data-setbg="img/service-bg.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <img src="img/service.jpg" alt="">
        </div>
        <div class="col-lg-5 offset-lg-1 pl-lg-0">
          <div class="section-title text-white">
            <h3>What you need to do</h3>
            <p>Just follow these simple steps</p>
          </div>
          <div class="services">
            <div class="service-item">
              <i class="fa fa-comments"></i>
              <div class="service-text">
                <h5>Fill the form</h5>
                <p>Fill the form bellow with proper information.</p>
              </div>
            </div>
            <div class="service-item">
              <i class="fa fa-home"></i>
              <div class="service-text">
                <h5>Almost there</h5>
                <p>Our agents will contact you and verify your information. They will take all the nesessary photos too!</p>
              </div>
            </div>
            <div class="service-item">
              <i class="fa fa-briefcase"></i>
              <div class="service-text">
                <h5>Thats it!</h5>
                <p>Now wait for someone to buy your property.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Services section end -->

  <!-- Login Section -->

    <div class="container-fluid h-100">
      <div class="row justify-content-center align-items-center h-100">
          <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-4">
            <div>
  						<?php
  							if (isset($result)) echo $result;
  						?>
  						<?php
  							if (!empty($form_errors)) echo show_errors($form_errors);
  						?>
  					</div>
  					<div class="clearfix"></div>
            <?php if(isset($_SESSION['username'])): ?>
            <form method="post" action="">
              <div class="form-group">
                  <input type="address" class="form-control form-control-lg" placeholder="Street Adress" name="street">
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="address" class="form-control form-control-lg" id="city" placeholder="City" name="city">
                </div>
                <div class="form-group col-md-6">
                  <input type="State" class="form-control form-control-lg" id="state" placeholder="State" name="state">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="number" class="form-control form-control-lg" id="size" placeholder="Size(in acres)" name="size">
                </div>
                <div class="form-group col-md-6">
                  <input type="number" class="form-control form-control-lg" id="bedroom" placeholder="Bedroom(s)" name="bedroom">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="number" class="form-control form-control-lg" id="washroom" placeholder="Washroom(s)" name="washroom">
                </div>
                <div class="form-group col-md-6">
                  <input type="number" class="form-control form-control-lg" id="balcony" placeholder="Balcony(s)" name="balcony">
                </div>
              </div>

              <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="description" placeholder="Description"></textarea>
              </div>
              <div class="form-group">
                  <button class="btn-lg btn-block site-btn" type="submit" name="submit" value="Register">Submit</button>
              </div>
              </form>
            <?php else: ?>
              <br><br>
                <h2 style="color:#30CAA0">You must be logged in to see this page.<a href="login.php"> Login here.</a></h2>
              </div>
              <br><br>
            <?php endif ?>
          </div>
      </div>
    </div>

    <!-- Footer section -->
    <footer class="footer-section set-bg" data-setbg="img/footer-bg.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-widget">
            <img src="img/logo.png" alt="">
            <p>Lorem ipsum dolo sit azmet, consecter dipise consult  elit. Maecenas mamus antesme non anean a dolor sample tempor nuncest erat.</p>
            <div class="social">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
              <a href="#"><i class="fa fa-pinterest"></i></a>
              <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 footer-widget">
            <div class="contact-widget">
              <h5 class="fw-title">CONTACT US</h5>
              <p><i class="fa fa-map-marker"></i>3711-2880 Nulla St, Mankato, Mississippi </p>
              <p><i class="fa fa-phone"></i>(+88) 666 121 4321</p>
              <p><i class="fa fa-envelope"></i>info.leramiz@colorlib.com</p>
              <p><i class="fa fa-clock-o"></i>Mon - Sat, 08 AM - 06 PM</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 footer-widget">
            <div class="double-menu-widget">
              <h5 class="fw-title">POPULAR PLACES</h5>
              <ul>
                <li><a href="">Florida</a></li>
                <li><a href="">New York</a></li>
                <li><a href="">Washington</a></li>
                <li><a href="">Los Angeles</a></li>
                <li><a href="">Chicago</a></li>
              </ul>
              <ul>
                <li><a href="">St Louis</a></li>
                <li><a href="">Jacksonville</a></li>
                <li><a href="">San Jose</a></li>
                <li><a href="">San Diego</a></li>
                <li><a href="">Houston</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6  footer-widget">
            <div class="newslatter-widget">
              <h5 class="fw-title">NEWSLETTER</h5>
              <p>Subscribe your email to get the latest news and new offer also discount</p>
              <form class="footer-newslatter-form">
                <input type="text" placeholder="Email address">
                <button><i class="fa fa-send"></i></button>
              </form>
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <div class="footer-nav">
            <ul>
              <li><a href="">Home</a></li>
              <li><a href="">Featured Listing</a></li>
              <li><a href="">About us</a></li>
              <li><a href="">Pages</a></li>
              <li><a href="">Blog</a></li>
              <li><a href="">Contact</a></li>
            </ul>
          </div>
          <div class="copyright">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer section end -->

    <!--
  <form method="post" action="">
    <table>
      <label for="barca">Username</label>
      <input type="text" value="" name="username"><br />

      <tr><td>Name:</td><td><input type="text" value="" name="name"></td></tr>
      <tr><td>Email:</td><td><input type="email" value="" name="email"></td></tr>
      <tr><td>Password:</td><td><input type="password" value="" name="password"></td></tr>
      <tr><td>Address:</td><td><input type="address" value="" name="address"></td></tr>
      <tr><td>Phone:</td><td><input type="phone" value="" name="phone"></td></tr>
      <tr><td></td><td><input style="float: right" type="submit" name="registerbtn" value="Register"></td></tr>
    </table>
  </form> -->
  <!-- Login Section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
