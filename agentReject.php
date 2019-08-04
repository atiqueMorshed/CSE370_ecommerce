<?php
include_once 'resources/Database.php';
include_once 'resources/regFunc.php';
try{
    $id = $_GET['id'];

    $sql = "DELETE FROM preproperty WHERE PRE_ID = :id";
    $stmt=$db->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->execute();

    echo "Property has been rejected.";
?>
<br/><br/>
<a href="agent.php">Back</a>
<?php
}
catch (PDOException $ex) {
    $result = flashMessage("An error has occured");
    ?>
    <a href="admin.php">Back</a>

<?php
}
?>
