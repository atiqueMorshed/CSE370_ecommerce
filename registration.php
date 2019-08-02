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
<?php
$page_title = "HouseBuy - Register";
include_once 'common/header.php';
?>

	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
			<h2>Register Now!</h2>
		</div>
	</section>
	<!--  Page top end -->
  <br>
  <!-- Login Section -->
    <div class="container-fluid h-50">
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
  	<script src="js/sweetalert2.all.min.js"></script>
  	<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
  	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
  </body>
  </html>
