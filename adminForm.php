<?php
  session_start();
  include_once 'resources/Database.php';
  include_once 'resources/regFunc.php';

  if(isset($_POST['logout'])){
      session_destroy();
      header('location:loginAdmin.php');
  }
  $id = $_GET['id'];
  $stmt=$db->prepare("SELECT * from preproperty WHERE PRE_ID=?");
  $stmt->execute([$id]);
  $row=$stmt->fetch();
  if(isset($_POST['btn-add'])){
    $_SESSION['price']=$_POST['price'];
    $_SESSION['propertyname']=$_POST['propertyname'];
    $_SESSION['id']=$row['PRE_ID'];
    header("Location: accept.php");
  }
  ?>
  <!doctype html>
  <html lang="en">
    <head>
      <title>Housebuy-Agent</title>
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
    	<link rel="stylesheet" href="css/custom.css"/>

      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>

    <body>
      <div id="preloder">
        <div class="loader"></div>
      </div>
      <!-- Page Preloder -->

      <!-- Header section -->
      <header class="header-section">
        <div class="header-top">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 header-top-left">
                <div class="top-info">
                  <i class="fa fa-phone"></i>
                  (+88) 01711112223
                </div>
                <div class="top-info">
                  <i class="fa fa-envelope"></i>
                  support@housebuy.com
                </div>
              </div>
              <div class="col-lg-6 text-lg-right header-top-right">
                <div class="top-social">
                  <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                  <a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a>
                  <a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
                  <a href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i></a>
                  <a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a>
                </div>
                <div class="user-panel">
                  <?php if(!isset($_SESSION['username'])): ?>
                    <a href="registration.php"><i class="fa fa-user-circle-o"></i> Register</a>
                    <a href="login.php"><i class="fa fa-sign-in"></i> Login</a>
                  <?php else: ?>
                    <a href="sellHouse.php"><i class="fa fa-user-circle-o"></i> Sell Property</a>
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
                <a href="index.php" class="site-logo"><img src="img/logo.png" alt=""></a>
                <div class="nav-switch">
                  <i class="fa fa-bars"></i>
                </div>
                <ul class="main-menu">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="categories.php">FEATURED LISTING</a></li>
                  <li><a href="about.php">ABOUT US</a></li>
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
          <h2>Product Verification.</h2>
        </div>
      </section>
      <!--  Page top end -->
       <?php
          if(isset($_SESSION['username']))
          {
        ?>

        <div class="container-fluid h-50">
          <div class="row justify-content-center align-items-center h-100">
              <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-4">
                <div class="clearfix"></div>

                <?php if(isset($_SESSION['username'])): ?>
                    <form method="post" action="" enctype="multipart/form-data">
                      <div class="form-group">
                          <input type="Name" class="form-control form-control-lg" placeholder="Enter property name" name="propertyname">
                      </div>
                      <div class="form-group">
                        <input type="number" class="form-control form-control-lg" id="Price" placeholder="Enter Price" name="price">
                      </div>

                      <div class="form-group">
                          <button class="btn-lg btn-block site-btn" type="submit" name="btn-add" value="Register">Add Product</button>
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



        <section class="jumbotron text-center">
                <div class="container" style="background-color:lavenderblush">
             <h3 class="lead text-muted"><?php echo "{$row['USERNAME']} wants to add a property  at Street:{$row['street']}, City:{$row['city']}, Area:{$row['area']}" ?></h3>
             <form method="post" action="" enctype="multipart/form-data">
                <input type="propertyname" name="propertyname" placeholder="Enter property name.." class="form-control form-control-lg" >
                <input type="number" name="price" placeholder="Enter price.." class="form-control form-control-lg" >
                <button type="submit"  name="btn-add"> Add Products</button>
             </form>

            <br>
          </div>
        </section>
      <?php
    }
    else{
      ?>
      <h2 style="color:#30CAA0">You must be logged in to see this page.<a href="loginAdmin.php"> Login here.</a></h2>
      <?php
    }
    include_once 'common/footer.php';
    ?>
