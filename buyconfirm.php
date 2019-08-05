<?php
$page_title = "HouseBuy - Home";
include_once 'resources/session.php';
include_once 'resources/Database.php';
include_once 'resources/regFunc.php';
  if(isset($_SESSION['username'])) {
    $PROPERTY_ID = $_GET['id'];

    $sqlQuery = "SELECT* FROM PROPERTY WHERE PROPERTY_ID = :PROPERTY_ID";
    $statement = $db->prepare($sqlQuery);
    $statement->execute(array(':PROPERTY_ID' => $PROPERTY_ID));
    while($row = $statement->fetch()) {
      $pname = $row['PROPERTY_NAME'];
      $price = $row['PROPERTY_NAME'];

    }

    if(isset($_POST['confirm'])) {
        $xoid = 0;
        $username = $_SESSION['username'];
        // $PROPERTY_ID = $_SESSION["proid"];
        $ORDER_DATE = date("Y/m/d");
        try {
          $sqlInsert = "INSERT INTO `buy_order`(`ORDER_ID`, `PROPERTY_ID`, `USERNAME`, `ORDER_DATE`) VALUES (:ORDER_ID, :PROPERTY_ID, :USERNAME, :ORDER_DATE)";

          $statement = $db->prepare($sqlInsert);
          $statement->execute(array(':ORDER_ID'=>$xoid,':PROPERTY_ID'=>$PROPERTY_ID,':USERNAME'=>$username,':ORDER_DATE'=> $ORDER_DATE));
          if($statement->rowCount() == 1 ) {
            $result = flashMessage("Successfully placed order. Our agent will contact you soon.", "Pass");
          }
        } catch (PDOException $ex) {
            $result = flashMessage("An error has occured: " .$ex->getMessage());
        }
      }
  }

  // else {
  //   $result = flashMessage("You must be logged in." .$ex->getMessage());
  // }
?>

<?php
$page_title = "HouseBuy - Register";
include_once 'common/header.php';
?>

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
  <div class="container text-white">
    <h2>Confirm Order</h2>
  </div>
</section>
<!--  Page top end -->
      <div class="container-fluid h-50">
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
              <h5>Userame: <?php echo $_SESSION["username"]; ?></h5>
              <br>
              <h5>Property Name: <?php echo $pname; ?></h5>
              <br>
              <h5>Order Date: <?php echo date("Y/m/d"); ?></h5>
              <form method="post" action="">
                <br>
                <button class="btn btn-success " type="submit" name="confirm" value="">Confirm Order</button>
              </form>
              <?php else: ?>
              <br><br>
                <h2 style="color:#30CAA0">You must be logged in to see this page.<a href="login.php"> Login here.</a></h2>
                <?php endif ?>
              </div>
              <br><br>

       </div>
     </div>
   </div>
<?php
include_once 'common/footer.php';
?>
