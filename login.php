<?php
	include_once 'resources/session.php';
	include_once 'resources/Database.php';
	include_once 'resources/regFunc.php';

	if(isset($_POST['loginbtn'])) {
		$form_errors = array();
		$required_fields=array('username', 'password');
		$form_errors = array_merge($form_errors, check_empty_fields($required_fields));
		if(empty($form_errors)) {
			$user = $_POST['username'];
			$password = $_POST['password'];

			$sqlQuery = "SELECT* FROM user WHERE username = :username";
			$statement = $db->prepare($sqlQuery);
			$statement->execute(array(':username' => $user));

			while($row = $statement->fetch()) {
				$username =  $row['USERNAME'];
				$hashed_password = $row['password'];
				$email = $row['EMAIL'];


				if(password_verify($password, $hashed_password)){
					$_SESSION['username'] = $username;
					$_SESSION['email'] = $email;
					header("location: index.php");
				}
				else{
					$result = "<p style='padding: 20px; color: red; border:1px solid gray'>Invalid username or password.</p>";
				}
			}
		}
		else {
			if (count($form_errors) == 1) {
        $result = "<p style='color: red;'>There was 1 error in the form.</p>";
      }
      else{
        $result = "<p style='color: red;'>There were " .count($form_errors). " error in the form.</p>";
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

	<?php
		if (isset($result)) echo $result;
	?>
	<?php
		if (!empty($form_errors)) echo show_errors($form_errors);
	?>
  <!-- Login Section -->
  <form method="post" action="">
    <table>
      <tr><td>Username:</td><td><input type="text" value="" name="username"></td></tr>
      <tr><td>Password:</td><td><input type="password" value="" name="password"></td></tr>
      <tr><td></td><td><input style="float: right" type="submit" name="loginbtn" value="Sign In"></td></tr>
    </table>
  </form>
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
