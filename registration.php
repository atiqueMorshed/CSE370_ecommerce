<?php
  include_once 'resources/Database.php';
  include_once 'resources/regFunc.php';

  if (isset($_POST['registerbtn'])) {
    $form_errors = array();
    $required_fields = array('username','name','email','password','address','phone');
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));
    $fields_to_check_length = array('username'=>6, 'password'=> 6, 'phone' => 11);
    $form_errors =  array_merge($form_errors, check_min_length($fields_to_check_length));
    $form_errors = array_merge($form_errors, check_email($_POST));

    if (empty($form_errors)) {
      $username = $_POST['username'];
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $address = $_POST['address'];
      $phone = $_POST['phone'];

      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      try {
        $sqlInsert = "INSERT INTO user(username, password, email, name, address, phone)
        VALUES(:username, :password, :email, :name, :address, :phone)";

        $statement = $db->prepare($sqlInsert);
        $statement->execute(array(':username'=>$username,':name'=>$name,':email'=>$email,':password'=> $hashed_password,':address'=>$address,':phone'=>$phone));
        if($statement->rowCount() == 1) {
          $result = "<p style='padding:20px; border: 1px solid gray; color: green;'>Registration Successful.</p>";
        }
      } catch (PDOException $ex) {
          $result = "<p style='padding:20px; color: red;'>An error occured:".$ex->getMessage()."</p>";
      }
    }
    else{
      if (count($form_errors) == 1) {
        $result = "<p style='color: red;'>There was 1 error in the form.<br>";
      }
      else{
        $result = "<p style='color: red;'>There were " .count($form_errors). " error in the form.<br>";
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
    <?php
      if (isset($result)) echo $result;
    ?>
    <?php
      if (!empty($form_errors)) echo show_errors($form_errors);
    ?>
  <form method="post" action="">
    <table>
      <tr><td>Username:</td><td><input type="text" value="" name="username"></td></tr>
      <tr><td>Name:</td><td><input type="text" value="" name="name"></td></tr>
      <tr><td>Email:</td><td><input type="email" value="" name="email"></td></tr>
      <tr><td>Password:</td><td><input type="password" value="" name="password"></td></tr>
      <tr><td>Address:</td><td><input type="address" value="" name="address"></td></tr>
      <tr><td>Phone:</td><td><input type="phone" value="" name="phone"></td></tr>
      <tr><td></td><td><input style="float: right" type="submit" name="registerbtn" value="Register"></td></tr>
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
