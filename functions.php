<?php 

//*****functions******


//Show all products
function all_prod () {
	echo
	"<div id='preloder'>
		<div class= 'loader'></div>
	</div>" ;
	global $conn;
	$sql = "SELECT * from property";
	$result = mysqli_query($conn, $sql);		
	$resultCount = mysqli_num_rows($result);
	if ($resultCount > 0) {
		while ($output = mysqli_fetch_assoc($result)) {
			echo							
			"<div class='pr-5 pl-3'> 
			<div class='card'>			
			<div class='card-header bg-info text-white'>

			<h5 class='card-title text-center'> " . $output['PROPERTY_NAME'] . "</h5> 
			<p class='text-center'>" . $output['city'] . "</p> </div>

			<div class='card-body'>

			<img src='img/gallery/2.jpg' alt='image' width='200' height='200' align='left' class='pb-3 pt-3'>
			<div class='pt-4'> </div> 
			<strong>
			<div class
			<p class='card-text text-right'>". $output['SIZE'] , " Sqft.". "</p> 
			<p class='card-text text-right'>" . $output['BEDROOM'] , " Bedrooms" . "</p>
			<p class='card-text text-right'>". $output['WASHROOM'] , " Washrooms" . "</p>
			<p class='card-text text-right'>". $output['BALCONY'] , " Balconies" . "</p> </strong>
			<button type='button' class='btn btn-success btn-block'>" ."Price " , $output['PRICE'] . "</button>

			</div>
			</div>
			</div>
			<br>" ;
		 } 
	}
}


//Search result  
function srch_rslt ($kwd) { 
	set_search($kwd); 
	get_search();

	global $conn;
	$filterKwd = mysqli_real_escape_string($conn, $kwd);
	$find = "SELECT * FROM property WHERE PROPERTY_NAME LIKE '%$filterKwd%' OR city LIKE '%$filterKwd%' OR area LIKE '%$filterKwd%' OR street LIKE '%$filterKwd%'";
	$find_Result = mysqli_query($conn, $find); 
	$q_result_count = mysqli_num_rows($find_Result);

	if ($q_result_count > 0) { 
		echo "<Strong class ='container text-left'> Showing search results for '" , $kwd , "'</strong>";

		while ($output = mysqli_fetch_assoc($find_Result)) {
			echo							
			"<div class='pr-5 pl-3'>
			 <a href = 'single-list.php?id=". $output['PROPERTY_ID'] ."'>
			<div class='card'>
			
			<div class='card-header bg-info text-white'>
			<h5 class='card-title text-center'> " . $output['PROPERTY_NAME'] . "</h5> 
			<p class='text-center'>" .$output['street'].", ".$output['area'].", " . $output['city'] . "</p> </div>

			<div class='card-body'>
			<img src='img/gallery/2.jpg' alt='image' width='200' height='200' align='left' class='pb-3 pt-3'>
			<div class='pt-4'> </div>
			 <div class='pl-5'>
			<strong ><p class='card-text text-center'>". $output['SIZE'] ,  " Sqft."," , " .$output['BEDROOM'],  " Bedrooms", " , " .  $output['WASHROOM'] , " Washrooms", " , ".  $output['BALCONY'] , " Balconies" . "</p> 
			<p class='card-text text-center'>". $output['Description'] . "</p>  </strong> </div>  </a>
			<a target='_blank' href = 'buyconfirm.php?id=". $output['PROPERTY_ID'] ."'> <button type='button' class='btn btn-success btn-block'>" ."Price " , $output['PRICE'] . "</button> </a>

		</div>
		</div>
		</div>

		<br>" ;
	}
	} else {
			echo "Your Keyword '" , $kwd ,  "' did not match with anything!  ";

		}
}


//set search keyword
function set_search ($kwd) {
	$_SESSION ["srch_kwd"] = $kwd;
} 

//get search keyword 
function get_search () {
	$ax = $_SESSION["srch_kwd"];
	return $ax;
}

//Order and Sort
function sort_order () {
	global $conn;
	$srch_key = get_search('');
	 $selc_value = $_GET["sortBy"];
	 if ($selc_value != "Default") {
 		echo "<Strong class ='container text-left'> Showing Results of Query ' " ,  $srch_key  , " ' Sorted by '" , $selc_value , "'</strong>";
   		$sql = "SELECT * FROM property WHERE PROPERTY_NAME LIKE '%$srch_key%' OR city LIKE '%$srch_key%' ORDER BY $selc_value";
   		$result = mysqli_query($conn, $sql);		
		$resultCount = mysqli_num_rows($result);
		  
  	 	if ($resultCount > 0) {
	  	 while ($output = mysqli_fetch_assoc($result)) {
			echo										
			"<div class='pr-5 pl-3'>
			<a href = 'single-list.php?id=". $output['PROPERTY_ID'] ."'>
			<div class='card'>
			
			<div class='card-header bg-info text-white'>
			<h5 class='card-title text-center'> " . $output['PROPERTY_NAME'] . "</h5> 
			<p class='text-center'>" .$output['street'].", ".$output['area'].", " . $output['city'] . "</p> </div>

			<div class='card-body'>
			<img src='img/gallery/2.jpg' alt='image' width='200' height='200' align='left' class='pb-3 pt-3'>
			<div class='pt-4'> </div>
			 <div class='pl-5'>
			<strong ><p class='card-text text-center'>". $output['SIZE'] ,  " Sqft."," , " .$output['BEDROOM'],  " Bedrooms", " , " .  $output['WASHROOM'] , " Washrooms", " , ".  $output['BALCONY'] , " Balconies" . "</p> 
			<p class='card-text text-center'>". $output['Description'] . "</p>  </strong> </div>  </a>
			<a target='_blank' href = 'buyconfirm.php?id=". $output['PROPERTY_ID'] ."'> <button type='button' class='btn btn-success btn-block'>" ."Price " , $output['PRICE'] . "</button> </a>

		</div>
		</div>
		</div>

		<br>";
	   		}
		} 	   
	}

	if ($selc_value == "Default") {
		echo "<Strong class ='container text-left'> Showing Results of Query ' " ,  $srch_key  , " ' Sorted by '" , $selc_value , "'</strong>";
		$sql = "SELECT * FROM property WHERE PROPERTY_NAME LIKE '%$srch_key%' OR city LIKE '%$srch_key%'";
		$result = mysqli_query($conn, $sql);		
	 $resultCount = mysqli_num_rows($result);
	   
		if ($resultCount > 0) {
		while ($output = mysqli_fetch_assoc($result)) {
		 echo										
			 "<div class='pr-5 pl-3'> 
			 <div class='card'>
			 
			 <div class='card-header bg-info text-white'>
			 <h5 class='card-title text-center'> " . $output['PROPERTY_NAME'] . "</h5> 
			 <p class='text-center'>" . $output['street'].", " .$output['area']. ", " . $output['city'] . "</p> </div>

			 <div class='card-body'>
			 <img src='img/gallery/2.jpg' alt='image' width='200' height='200' align='left' class='pb-3 pt-3'>
			 <div class='pt-4'> </div> 
			 <strong>
			 <p class='card-text text-right'>". $output['SIZE'] , " Sqft.". "</p> 
			 <p class='card-text text-right'>" . $output['BEDROOM'] , " Bedrooms" . "</p>
			 <p class='card-text text-right'>". $output['WASHROOM'] , " Washrooms" . "</p>
			 <p class='card-text text-right'>". $output['BALCONY'] , " Balconies" . "</p> </strong>
			 <button type='button' class='btn btn-success btn-block'>" ."Price " , $output['PRICE'] . "</button>

			 </div>
			 </div>
			 </div>
			 <br>";
			}
	 } 	  
	}

} 

function sort_order1 () {
	global $conn;
	$sql='';
	 $selc_value = $_GET["sortBy"];
	 if ($selc_value == "Default") {
		$sql = "SELECT * FROM property";
	 }
	 else {
		$sql = "SELECT * FROM property ORDER BY $selc_value";
	 }
 		echo "<Strong class ='container text-center pb-3'> Sorted by " , $selc_value , "'</strong>";
   		
   		$result = mysqli_query($conn, $sql);		
		$resultCount = mysqli_num_rows($result);
		  
  	 	if ($resultCount > 0) {
	  	 while ($row = mysqli_fetch_assoc($result)) {
			$output = '<div class="col-md-3 mb-2">
            <div class="card-deck"> 
				<div class="card border-secondary"> 
				<a href = "single-list.php?id='. $row["PROPERTY_ID"] .'">
                    <img src="img/bg" class="card-img-top" alt="">  
                    <div class="card-body">
                        <h5 class="card-title text-info text-center"> '.$row['PROPERTY_NAME'].'</h5>
                        <h6 class="card-title text-center">'.$row['street']. ", ". $row['area'] . ", " . $row['city'] .'</h6>
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
                        <a target ="_blank" href="buyconfirm.php?id='. $row["PROPERTY_ID"] .'" class="btn btn-success btn-block"> <h6 class="text-light">'. $row['PRICE'].' tk</h6> </a>
                    </div>
                </div>
            </div>
		</div>';
		echo $output;
		} 	   
	}
}
?>
