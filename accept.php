<?php
session_start();
include_once 'resources/Database.php';
include_once 'resources/regFunc.php';
try{
$id = $_SESSION['id'];


    $stmt=$db->prepare("SELECT * from preproperty WHERE PRE_ID=?");
    $stmt->execute([$id]);
    $row=$stmt->fetch();
    $empid = $_SESSION['emp_id'];
    $username = $row['USERNAME'];
    $bedroom = $row['bedroom'];
    $washroom = $row['washroom'];
    $balcony=$row['balcony'];
    $size=$row['street'];
    $street=$row['size'];
    $city=$row['city'];
    $area=$row['area'];
    $description=$row['Description'];
    $image1=$row['Image1'];
    $image2=$row['Image2'];
    $image3=$row['Image3'];
    $image4=$row['Image4'];
    $image5=$row['Image5'];
    $price=$_SESSION['price'];
    $propertyname=$_SESSION['propertyname'];

    $sqlinsert="INSERT INTO property(`EMP_ID`, `USERNAME`, `PROPERTY_NAME`, `PRICE`, `BEDROOM`, `WASHROOM`, `BALCONY`, `SIZE`, `street`, `city`, `area`, `description`, `Image1`, `Image2`, `Image3`, `Image4`, `Image5`)
    VALUES (:empid,:username,:propertyname,:price,:bedroom,:washroom,:balcony,:size,:street,:city,:area,:description,:image1,:image2,:image3,:image4,:image5)";

    $stmt = $db->prepare($sqlinsert);
    $stmt->bindValue(':username',$username);
    $stmt->bindValue(':empid',$empid);
    $stmt->bindValue(':bedroom',$bedroom);
    $stmt->bindValue(':washroom',$washroom);
    $stmt->bindValue(':balcony',$balcony);
    $stmt->bindValue(':size',$size);
    $stmt->bindValue(':street',$street);
    $stmt->bindValue(':city',$city);
    $stmt->bindValue(':area',$area);
    $stmt->bindValue(':image1',$image1);
    $stmt->bindValue(':image2',$image2);
    $stmt->bindValue(':image3',$image3);
    $stmt->bindValue(':image4',$image4);
    $stmt->bindValue(':image5',$image5);
    $stmt->bindValue(':price',$price);
    $stmt->bindValue(':description',$description);
    $stmt->bindValue(':propertyname',$propertyname);

    $inserted=$stmt->execute();

    $sql="DELETE FROM preproperty WHERE PRE_ID = :id";
    $sttmt=$db->prepare($sql);
    $sttmt->bindValue(':id',$id);
    $delete=$sttmt->execute();
    echo "Property is accepted";




?>
<br/><br/>
<a href="admin.php">Back</a>
<?php
}
catch (PDOException $ex) {
    $result = flashMessage("An error has occured");
    ?>
    <a href="admin.php">Back</a>
    <?php
}
?>
