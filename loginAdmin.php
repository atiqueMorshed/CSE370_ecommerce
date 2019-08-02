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

			$sqlQuery = "SELECT* FROM employee WHERE username = :username";
			$statement = $db->prepare($sqlQuery);
			$statement->execute(array(':username' => $user));

			while($row = $statement->fetch()) {
				$type = $row['type'];
				$user =  $row['USERNAME'];
				$hashed_password = $row['Password'];
				$email = $row['EMAIL'];

				if($password === $hashed_password){
					$_SESSION['username'] = $user;
					if($type === "Admin") {
						redirectTo(admin);
					}
					else {
						redirectTo(agent);
					}
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
<?php
$page_title = "HouseBuy - Admin";
include_once 'common/header.php';
?>

	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
			<h2>Admin Login</h2>
		</div>
	</section>
	<!--  Page top end -->

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
                <div class="form-group">
                    <input _ngcontent-c0="" class="form-control form-control-lg" placeholder="Username" type="text" name="username">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" placeholder="Password" type="password" name="password">
                </div>
								<!-- -->
                <div class="form-group">
                    <button class="btn-lg btn-block site-btn" name="loginbtn">Sign In</button>
                </div>
								<div class="form-group">
										<p> Go back to <a href="index.php">Homepage</a></p>
	              </div>
            </form>
        </div>
    </div>
	</div>
  <!-- Login Section end -->
