<?php
	include_once 'resources/session.php';
	include_once 'resources/Database.php';
	include_once 'resources/regFunc.php';

	if(isset($_POST['loginbtn'])) {
		$form_errors = array();
		$required_fields=array('username', 'password');
		$form_errors = array_merge($form_errors, check_empty_fields($required_fields));
		if(empty($form_errors)) {
			// $ux = $_POST['username'];
			$user = $_POST['username'];
			$password = $_POST['password'];

			$sqlQuery = "SELECT* FROM user WHERE username = :username";
			$statement = $db->prepare($sqlQuery);
			$statement->execute(array(':username' => $user));
			if($statement->rowCount() < 1){
				$result = flashMessage("Username does not exist.");
			}
			while($row = $statement->fetch()) {
				$user =  $row['USERNAME'];
				$hashed_password = $row['Password'];
				$email = $row['EMAIL'];

				if(password_verify($password, $hashed_password)){
					$_SESSION['username'] = $user;
					//set($username);
					redirectTo(index);
				}
				else{
					$result = flashMessage("Invalid username or password.");
				}
			}
		}
		else {
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
	<title>HouseBuy - Signin</title>
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
                <div class="form-group">
                    <input _ngcontent-c0="" class="form-control form-control-lg" placeholder="Username" type="text" name="username">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" placeholder="Password" type="password" name="password">
                </div>

                <div class="form-group">
                    <button class="btn-lg btn-block site-btn" name="loginbtn">Sign In</button>
                </div>
								<div class="form-group">
	                  <p>Not a member? <a href="registration.php">Register<a/></p>
										<p> Go back to <a href="index.php">Homepage</a></p>
	              </div>
            </form>
        </div>
    </div>
	</div>
  <!-- Login Section end -->


	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/sweetalert2.all.min.js"></script>
	<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
</body>
</html>
