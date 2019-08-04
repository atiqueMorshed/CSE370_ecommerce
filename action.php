<?php
$username = "root";
$password = "";
$dbName = "house_buy";
$server = "localhost";
$conn = mysqli_connect($server, $username, $password, $dbName);


if(isset($_POST['action'])) {
    $sql = "SELECT * FROM property WHERE PROPERTY_NAME  != '' ";

    if (isset($_POST['city'])) {
        $city = implode("','", $_POST['city']);
        $sql .= "AND city IN('" .$city. "')";
    }
    if (isset($_POST['size'])) {
        $size = implode("','", $_POST['size']);
        $sql .= "AND SIZE IN('" .$size. "')";
    }
    if (isset($_POST['bedroom'])) {
        $bedroom = implode("','", $_POST['bedroom']);
        $sql .= "AND BEDROOM IN('" .$bedroom. "')";
    }
    if (isset($_POST['washroom'])) {
        $washroom = implode("','", $_POST['washroom']);
        $sql .= "AND WASHROOM IN('" .$washroom. "')";
    }

    $result = $conn -> query($sql);
    $output = '';

    if ($result -> num_rows>0) {
        while ($row = $result -> fetch_assoc()) {
            $output .= '<div class="col-md-3 mb-2">
            <div class="card-deck">
                <div class="card border-secondary"> <a href = "">
                    <img src="img/bg" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title text-info text-center"> '.$row['PROPERTY_NAME'].'</h5>
                        <h6 class="card-title text-center">'.$row['street'].", ". $row['area'].", ". $row['city'].'</h6>
                            <div class="room-info">
                                <div class="rf-left">
                                <h6 class="text-muted">'.$row['SIZE'].' Sqft.</h6> <br>
                                <h6 class="text-muted">'.$row['BEDROOM'].' Bedroom(s)</h6> <br>
                                </div>
                                <div class="rf-right">
                                <h6 class="text-muted">'.$row['BALCONY'].' Balcony(s)</h6> <br>
                                <h6 class="text-muted">'. $row['WASHROOM'].' Washroom(s)</h6> <br>
                                </div>
                            </div>
                    </div>
                    </a>
                    <div class="card-footer">
                        <a href="#" class="btn btn-success btn-block"> <h6 class="text-light">'. $row['PRICE'].' tk</h6> </a>
                    </div>
                </div>
            </div>
        </div>';
        }
         echo $output;
    }

}
?>
