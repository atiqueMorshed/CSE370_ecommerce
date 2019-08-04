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
    <?php
    if(isset($_SESSION['username'])){
    ?>
    <header>
      <div class="navbar navbar-dark bg-dark box-shadow">
         <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
               <strong>Hi, Agent</strong>
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
      <h2><?php echo "If this property is verified upload images and press accept, else press reject"?><h2/>
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
                         <br>
                         <h4 class="lead text-muted"><?php echo "USERNAME: {$row['USERNAME']} | PRE PROPERTY ID: {$row['PRE_ID']} wants to add a property located at Street:{$row['street']}, City:{$row['city']}, Area:{$row['area']}" ?></h4>
                         <p class="lead text-muted"><?php echo "It has {$row['bedroom']} bedrooms, {$row['washroom']} washroom(s), {$row['balcony']} balcony(s). " ?></p>
                         <p class="lead text-muted"><?php echo "Size is {$row['size']} acre(s)." ?></p>
                         <p class="lead text-muted"><?php echo "Description is {$row['Description']}" ?></p>
                         <a href="agentReject.php?id=<?php echo $row['PRE_ID'] ?>" class="btn btn-secondary my-2">Reject</a>
                         <a href="agentForm.php?id=<?php echo $row['PRE_ID'] ?>" class="btn btn-secondary my-2">Edit Details</a>
                     </div>
                   </div>
                 </section>
                   <br>
                 <?php
               }
               else
               {
                ?>
                <section class="jumbotron text-center">
                    <div class="container" style="background-color:lavenderblush">
                      <h2 class="jumborton-heading"> <?php echo " user {$row['USERNAME']}'s property is already verified by an agent" ?> </h2>
                      <br>
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
