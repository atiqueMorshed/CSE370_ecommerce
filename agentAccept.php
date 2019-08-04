<?php
session_start();
include_once 'resources/Database.php';
include_once 'resources/regFunc.php';
if(isset($_SESSION['username'])){
    $id = $_SESSION['id'];
    $sql = "UPDATE preproperty SET Verify= 1 where PRE_ID=:id";
    $stmt=$db->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->execute();

    echo "Account has been accepted.";


?>

<br/><br/>
<a href="agent.php">Back</a>
<?php
}
else{
?>
<h2 style="color:#30CAA0">You must be logged in to see this page.<a href="loginAdmin.php"> Login here.</a></h2>
<?php
}
?>
