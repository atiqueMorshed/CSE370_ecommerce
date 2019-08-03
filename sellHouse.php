

<?php
  include_once 'resources/session.php';
  include_once 'resources/Database.php';
  include_once 'resources/regFunc.php';

  if(isset($_POST['submit'])) {
		$form_errors = array();
		$required_fields=array('street', 'city', 'area', 'size', 'bedroom', 'washroom', 'balcony');
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    if(empty($form_errors)) {
      $username = $_SESSION['username'];
      $street = $_POST['street'];
      $city = $_POST['city'];
      $area = $_POST['area'];
      $size = $_POST['size'];
      $bedroom = $_POST['bedroom'];
      $washroom = $_POST['washroom'];
      $balcony = $_POST['balcony'];
      $verify = 0;
      $pid = 0;
      $description = $_POST['description'];

			// $sqlQuery = "SELECT* FROM user WHERE username = :username";
			// $statement = $db->prepare($sqlQuery);
			// $statement->execute(array(':username' => $username));

      try {
        //$sqlInsert = "INSERT INTO preproperty(PRE_ID, username, bedroom, washroom, balcony, size, street, city, state, Description) VALUES(:pid, :username, :bedroom, :washroom, :balcony, :size, :street, :city, :state, :description)";
        $sqlInsert = "INSERT INTO `preproperty`(`PRE_ID`, `USERNAME`, `verify`, `bedroom`, `washroom`, `balcony`, `size`, `street`, `city`, `area`, `Description`) VALUES (:pid, :username, :verify, :bedroom, :washroom, :balcony, :size, :street, :city, :area, :description)";
        $statement = $db->prepare($sqlInsert);
        $statement->execute(array(':pid'=> $pid,':username'=>$username,':verify'=>$verify,':bedroom'=>$bedroom,':washroom'=>$washroom,':balcony'=> $balcony,':size'=>$size,':street'=>$street,':city'=>$city,':area'=>$area,':description'=>$description));
        if($statement->rowCount() == 1) {
          $result = flashMessage("Thank you!", "Pass");
        }
      } catch (PDOException $ex) {
          $result = flashMessage("An error has occured: " .$ex->getMessage());
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
$page_title = "HouseBuy - Sell Property";
include_once 'common/header.php';
?>


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
                <p>Our agents will contact you and verify your information. They will take all the necessary photos too!</p>
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
							<h2 style="color:#30CAA0">Sell your property.</h2>
							<br>
              <div class="form-group">
                  <input type="address" class="form-control form-control-lg" placeholder="Street Adress" name="street">
              </div>
							<br>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <!-- <input type="address" class="form-control form-control-lg" id="city" placeholder="City" name="city"> -->
                  <select name="city" id="city" class="form-control form-control-lg">
                   <option value="">Select City</option>
                  </select>
                  <br />

                </div>
                <div class="form-group col-md-6">
                  <!-- <input type="area" class="form-control form-control-lg" id="area" placeholder="Area" name="area"> -->
                  <select name="area" id="area" class="form-control form-control-lg">
                   <option value="">Select Area</option>
                  </select>
                </div>
              </div>
							<br>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="number" class="form-control form-control-lg" id="size" placeholder="Size(in acres)" name="size">
                </div>
                <div class="form-group col-md-6">
                  <input type="number" class="form-control form-control-lg" id="bedroom" placeholder="Bedroom(s)" name="bedroom">
                </div>
              </div>
							<br>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="number" class="form-control form-control-lg" id="washroom" placeholder="Washroom(s)" name="washroom">
                </div>
                <div class="form-group col-md-6">
                  <input type="number" class="form-control form-control-lg" id="balcony" placeholder="Balcony(s)" name="balcony">
                </div>
              </div>
							<br>
              <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="description" placeholder="Description"></textarea>
              </div>
							<br>
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

    <?php
    include_once 'common/footer.php';
     ?>

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
  <script>
  $(document).ready(function(){

   load_json_data('city');

   function load_json_data(id, parent_id)
   {
    var html_code = '';
    $.getJSON('country_state_city.json', function(data){

     html_code += '<option value="">Select '+id+'</option>';
     $.each(data, function(key, value){
      if(id == 'city')
      {
       if(value.parent_id == '0')
       {
        html_code += '<option value="'+value.id+'">'+value.name+'</option>';
       }
      }
      else
      {
       if(value.parent_id == parent_id)
       {
        html_code += '<option value="'+value.id+'">'+value.name+'</option>';
       }
      }
     });
     $('#'+id).html(html_code);
    });

   }

   $(document).on('change', '#city', function(){
    var city_id = $(this).val();
    if(city_id != '')
    {
     load_json_data('area', city_id);
    }
    else
    {
     $('#area').html('<option value="">Select Area</option>');
    }
   });
  });
  </script>
