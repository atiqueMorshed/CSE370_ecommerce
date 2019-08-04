<?php
  session_start();
  include_once 'resources/Database.php';
  include_once 'resources/regFunc.php';
  $conn = mysqli_connect("localhost","root","","house_buy");


  if(isset($_POST['logout'])){
      session_destroy();
      header('location:loginAdmin.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php if(isset($page_title)) echo $page_title ?></title>
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
  }
  if(isset($_SESSION['username']))
  {
    $id = $_GET['id'];
    $stmt=$db->prepare("SELECT * from preproperty WHERE PRE_ID=?");
    $stmt->execute([$id]);
    $row=$stmt->fetch();
      if(isset($_POST['btn-add'])){
       $_SESSION['id']=$row['PRE_ID'];
       $image1 =$_FILES['image1']['name'];
       $sql1 = "UPDATE preproperty SET Image1='$image1' where PRE_ID = {$row['PRE_ID']}";
       $qry1 = mysqli_query($conn,  $sql1);


       $image2 =$_FILES['image2']['name'];
       $sql2 = "UPDATE preproperty SET Image2='$image2' where PRE_ID = {$row['PRE_ID']}";
       $qry2 = mysqli_query($conn,  $sql2);

       $image3 =$_FILES['image3']['name'];
       $sql3 = "UPDATE preproperty SET Image3='$image3' where PRE_ID = {$row['PRE_ID']}";
       $qry3 = mysqli_query($conn,  $sql3);

       $image1 =$_FILES['image4']['name'];
       $sql4 = "UPDATE preproperty SET Image4='$image1' where PRE_ID = {$row['PRE_ID']}";
       $qry4 = mysqli_query($conn,  $sql4);


       $image5 =$_FILES['image5']['name'];
       $sql5 = "UPDATE preproperty SET Image5='$image5' where PRE_ID = {$row['PRE_ID']}";
       $qry5 = mysqli_query($conn,  $sql5);


       $image6 =$_FILES['image6']['name'];
       $sql6 = "UPDATE preproperty SET floor1 ='$image6' where PRE_ID = {$row['PRE_ID']}";
       $qry6 = mysqli_query($conn,  $sql6);


       $image7 =$_FILES['image7']['name'];
       $sql7 = "UPDATE preproperty SET floor2='$image7' where PRE_ID = {$row['PRE_ID']}";
       $qry7 = mysqli_query($conn,  $sql7);

       $image8 =$_FILES['image8']['name'];
       $sql8 = "UPDATE preproperty SET floor3='$image8' where PRE_ID = {$row['PRE_ID']}";
       $qry8 = mysqli_query($conn,  $sql8);

       $image9 =$_FILES['image9']['name'];
       $sql9 = "UPDATE preproperty SET floor4='$image9' where PRE_ID = {$row['PRE_ID']}";
       $qry9 = mysqli_query($conn,  $sql9);


       $image10 =$_FILES['image10']['name'];
       $sql10 = "UPDATE preproperty SET floor5='$image10' where PRE_ID = {$row['PRE_ID']}";
       $qry10 = mysqli_query($conn,  $sql10);

       $street = $_POST['street'];
       $city = $_POST['city'];
       $area = $_POST['area'];
       $size = $_POST['size'];
       $bedroom = $_POST['bedroom'];
       $washroom = $_POST['washroom'];
       $balcony = $_POST['balcony'];
       $description = $_POST['description'];
       $id= $row['PRE_ID'];
       $sqlupdate = "UPDATE preproperty SET street = COALESCE(NULLIF(:street, ''),street), city = COALESCE(NULLIF(:city, ''),city), area = COALESCE(NULLIF(:area, ''),area), size = COALESCE(NULLIF(:size, ''),size), bedroom = COALESCE(NULLIF(:bedroom, ''),bedroom), washroom = COALESCE(NULLIF(:washroom, ''),washroom), balcony = COALESCE(NULLIF(:balcony, ''),balcony), description = COALESCE(NULLIF(:description, ''),description) WHERE PRE_ID=:id";
       $stmt = $db->prepare($sqlupdate);
       $stmt->bindParam(':id',$id);
       $stmt->bindValue(':bedroom',$bedroom);
       $stmt->bindValue(':washroom',$washroom);
       $stmt->bindValue(':balcony',$balcony);
       $stmt->bindValue(':size',$size);
       $stmt->bindValue(':street',$street);
       $stmt->bindValue(':city',$city);
       $stmt->bindValue(':area',$area);
       $stmt->bindValue(':description',$description);
       $stmt->execute();
       header("Location: agentAccept.php");
     }

  ?>
    <section class="jumbotron text-center">
       <div class="container">
    <form method="post" action="" enctype="multipart/form-data">

      <input type="address" class="form-control form-control-lg" placeholder="Street Adress" name="street">
      <input type="address" class="form-control form-control-lg" id="city" placeholder="City" name="city">
      <input type="Area" class="form-control form-control-lg" id="state" placeholder="Area" name="area">
      <input type="number" class="form-control form-control-lg" id="size" placeholder="Size(in acres)" name="size">
      <input type="number" class="form-control form-control-lg" id="bedroom" placeholder="Bedroom(s)" name="bedroom">
      <input type="number" class="form-control form-control-lg" id="washroom" placeholder="Washroom(s)" name="washroom">
      <input type="number" class="form-control form-control-lg" id="balcony" placeholder="Balcony(s)" name="balcony">
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="description" placeholder="Finalize Description"></textarea>
      <p class="lead text-muted"><?php echo "Insert Property Images" ?></p>
      <input type="file" name="image1" class="form-control" >
      <input type="file" name="image2" class="form-control" >
      <input type="file" name="image3" class="form-control" >
      <input type="file" name="image4" class="form-control" >
      <input type="file" name="image5" class="form-control" >
      <p class="lead text-muted"><?php echo "Insert Floor Plans Images" ?></p>
      <input type="file" name="image6" class="form-control" >
      <input type="file" name="image7" class="form-control" >
      <input type="file" name="image8" class="form-control" >
      <input type="file" name="image9" class="form-control" >
      <input type="file" name="image10" class="form-control" >
      <button type="submit"  name="btn-add">Verify Property </button>
    </form>
  </div>
  </section>
  <?php
  }
  else{
  ?>
  <h2 style="color:#30CAA0">You must be logged in to see this page.<a href="loginAdmin.php"> Login here.</a></h2>
  <?php
  }
  <?php
  include_once 'common/footer.php';
  ?>
