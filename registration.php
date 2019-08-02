<?php
  include_once 'resources/session.php';
  include_once 'resources/Database.php';
  include_once 'resources/regFunc.php';

  if (isset($_POST['registerbtn'])) {
    $form_errors = array();
    $required_fields = array('username','name','email','password','address');
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));
    $fields_to_check_length = array('username'=>6, 'password'=> 6);
    $form_errors =  array_merge($form_errors, check_min_length($fields_to_check_length));
    $form_errors = array_merge($form_errors, check_email($_POST));

    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    if(checkDuplicateEntries("user", "USERNAME", $username, $db)) {
      $result = flashMessage("Username is already taken.");
    }
    else if(checkDuplicateEntries("user", "EMAIL", $email, $db)) {
      $result = flashMessage("Email is already taken.");
    }

    else if (empty($form_errors)) {
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      try {
        $sqlInsert = "INSERT INTO user(username, password, email, name, address)
        VALUES(:username, :password, :email, :name, :address)";

        $statement = $db->prepare($sqlInsert);
        $statement->execute(array(':username'=>$username,':name'=>$name,':email'=>$email,':password'=> $hashed_password,':address'=>$address));
        if($statement->rowCount() == 1) {
          $result = flashMessage("Registration Successful", "Pass");
        }
      } catch (PDOException $ex) {
          $result = flashMessage("An error has occured: " .$ex->getMessage());
      }
    }
    else{
      if (count($form_errors) == 1) {
        $result = flashMessage("There was 1 error in the form.");
      }
      else{
        $result = flashMessage("There were " .count($form_errors). " errors in the form.");
      }
    }
  }
?>

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

  <!-- Login Section -->
    <div class="container-fluid h-100">
      <div class="row justify-content-center align-items-center h-100">
          <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
            <div>
  						<?php
  							if (isset($result)) echo $result;
  						?>
  						<?php
  							if (!empty($form_errors)) echo show_errors($form_errors);
  						?>
  					</div>
  					<div class="clearfix"></div>
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
                <input type="text" class="form-control form-control-lg" id="address" placeholder="Address" name="address">
              </div>
              <div class="form-group">
                  <button class="btn-lg btn-block site-btn" type="submit" name="registerbtn" value="Register">Register</button>
              </div>
              <div class="form-group">
                  <p>Already a member? <a href="login.php">Login<a/></p>
                  <p> Go back to Homepage <a href="index.php">Here</a></p>
              </div>
              </form>
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
