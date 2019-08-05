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
      <title>Housebuy-Admin</title>
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
      <?php
      if(isset($_SESSION['username'])){
      ?>
      <header>
        <div class="navbar navbar-dark bg-dark box-shadow">
           <div class="container d-flex justify-content-between">
              <a href="#" class="navbar-brand d-flex align-items-center">
                 <strong>Hi, Admin</strong>
              </a>
              <div class="pull-right">
                  <form method="post">
                      <button name="logout" class="btn btn-danger my-2">Logout</button>
                  </form>
              </div>
          </div>
        </div>
      </header>

  <?php
  }
  if(isset($_SESSION['username']))
  {
?>
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
