<?php
  session_start();
  include_once 'resources/Database.php';
  include_once 'resources/regFunc.php';

  if(isset($_POST['logout'])){
      session_destroy();
      header('location:loginAdmin.php');
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
  <section class="jumbotron text-center">
			<div class="container">
			<?php
        $sql = $db->query('Select * FROM preproperty');
	      if($db->query('select count(*) from preproperty')->fetchColumn()>0 ){
		      while($row =$sql->fetch(PDO::FETCH_ASSOC)){
              if(isset($_POST['btn-add'])){
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
                 if( $qry1 && $qry2 && $qry3 && $qry4 && $qry5) {
                   //echo "</br>image uploaded";
                 }
               }
               if($row['verify']==0){
                 ?>
                 <h2 class="jumbotron-heading"><?php echo "If this property is verified press reject else upload images and press accept"?><h2/>
                 <h2 class="jumbotron-heading"><?php echo "{$row['USERNAME']}" ?></h2>
                 <p class="lead text-muted"><?php echo "wants to add a property at Street:{$row['street']}, City:{$row['city']}, Area:{$row['area']}" ?></p>
                 <a href="agentReject.php?id=<?php echo $row['PRE_ID'] ?>" class="btn btn-secondary my-2">Reject</a>
                 </p>
<!-- form insert -->
                 <div class="container">
                  <div class="add-form">
                    <form method="post" action="agentAccept.php?id=<?php echo $row['PRE_ID'] ?>" enctype="multipart/form-data">
                      <input type="file" name="image1" class="form-control" >
                      <input type="file" name="image2" class="form-control" >
                      <input type="file" name="image3" class="form-control" >
                      <input type="file" name="image4" class="form-control" >
                      <input type="file" name="image5" class="form-control" >
                      <button type="submit"  name="btn-add">Add New </button>
                    </form>
                  </div>
                </div>
<!-- end form insert -->
                <?php
              }
            }
          }else{
            echo "No Pending Requests.";
                    }
                ?>
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
