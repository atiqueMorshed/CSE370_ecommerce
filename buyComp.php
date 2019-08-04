

<?php
  include_once 'resources/session.php';
  include_once 'resources/Database.php';
  include_once 'resources/regFunc.php';

  if(isset($_POST['submit'])) {
      $username = $_SESSION['username'];
      $email = $row['EMAIL'];
      $PROPERTY_NAME = $_SESSION['PROPERTY_NAME'];
      $sqlQuery = "SELECT* FROM property WHERE username = :username AND PROPERTY_NAME = :PROPERTY_NAME";
			$statement = $db->prepare($sqlQuery);
			$statement->execute(array(':username' => $username, ':PROPERTY_NAME' => $PROPERTY_NAME));
			if($statement->rowCount() < 1){
				$result = flashMessage("Proprety does not exist.");
			}
			while($row = $statement->fetch()) {
				$PROPERTY_ID =  $row['PROPERTY_ID'];
				$ORDER_DATE = date("Y/m/d");
        $xoid = 0;
        try {
          $sqlInsert = "INSERT INTO `buy_order`(`ORDER_ID`, `PROPERTY_ID`, `USERNAME`, `ORDER_DATE`) VALUES (:xoid, :PROPERTY_ID, :username, :ORDER_DATE)";

          $statement = $db->prepare($sqlInsert);
          $statement->execute(array(':xoid'=>$xoid,':PROPERTY_ID'=>$PROPERTY_ID,':username'=>$username,':ORDER_DATE'=> $ORDER_DATE));
          if($statement->rowCount() == 1) {
            redirectTo(buyconfirm);
          }
        } catch (PDOException $ex) {
            $result = flashMessage("An error has occured: " .$ex->getMessage());
        }


				}
			}

			// $sqlQuery = "SELECT* FROM user WHERE username = :username";
			// $statement = $db->prepare($sqlQuery);
			// $statement->execute(array(':username' => $username));

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
  <?php
  echo $_SESSION["proid"];
?>
            <?php if(isset($_SESSION['username'])): ?>

              <div class="form-group">
                  <button class="btn-lg btn-block site-btn" type="button" name="buy" value="buy">Buy Now</button>
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
