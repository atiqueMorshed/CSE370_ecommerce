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
  if(isset($_SESSION['username']))
  {
  ?>
        <h2><?php echo ""?><h2/>
  			<?php
          $sql = $db->query('Select * FROM preproperty');
  	      if($db->query('select count(*) from preproperty')->fetchColumn()>0 ){

  		      while($row =$sql->fetch(PDO::FETCH_ASSOC)){
                 if($row['verify']==0){
                   $id=$row['PRE_ID'];
                   ?>
                   <!-- <div class="jumbotron">
                    <h1 class="display-4">Hello, world!</h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                  </div> -->
                   <section>
                     <div class="container-fluid h-100">
                       <div class="row justify-content-center align-items-center h-100">
                         <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6" style="background-color: #F7F7F7; padding:20px">
                           <h2><?php echo "USERNAME: {$row['USERNAME']} | PRE PROPERTY ID: {$row['PRE_ID']}" ?></h2>
                           <p style="margin-top:30px">[Location]</p>
                           <p><?php echo " Street: {$row['street']} | City: {$row['city']} | Area: {$row['area']}"?></p>
                           <p style="margin-top:30px">[Rooms]</p>
                            <p><?php echo "Bedroom: {$row['bedroom']} | Washroom: {$row['washroom']} | Balcony: {$row['balcony']} | Size: {$row['size']} sqft"?></p>
                           <p style="margin-top:30px">Description:</p>
                           <p><?php echo "{$row['Description']}" ?></p>
                           <a href="agentForm.php?id=<?php echo $row['PRE_ID'] ?>" target="_blank" class="site-btn">Edit Details</a>
                           <a href="agentReject.php?id=<?php echo $row['PRE_ID'] ?>" target="_blank" class="site-btn">Reject</a>
                        </div>
                      </div>
                    </div>
                   </section>
                     <br>
                   <?php
                 }

                 else
                 {
                  ?>
                  <section>
                    <div class="container-fluid h-100">
                      <div class="row justify-content-center align-items-center h-100">
                        <div class="col col-sm-6 col-md-6 col-lg-6 col-xl-6" style="background-color: #F7F7F7; padding:20px ; margin: 20px">
                          <h2 class="jumborton-heading"> <?php echo " user {$row['USERNAME']}'s property is already verified by an agent" ?> </h2>
                       </div>
                     </div>
                   </div>
                  </section>
                  <?php
                  }
                }
              }else{
              echo "No Pending Requests.";
            }
  }
  else{
  ?>
  <h2 style="color:#30CAA0">You must be logged in to see this page.<a href="loginAdmin.php"> Login here.</a></h2>
  <?php
  }
  include_once 'common/footer.php';
  ?>
