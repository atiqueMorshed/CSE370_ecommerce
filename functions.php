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
			"
			<div class='pr-5 pl-3'> 
			<div class='card'>
			
			<div class='card-header bg-info text-white'>
			<h5 class='card-title text-center'> " . $output['PROPERTY_NAME'] . "</h5> 
			<p class='text-center'>" . $output['LOCATION'] . "</p> </div>

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

			<br>" ;
		 } 
		}
}

//Search result  
function srch_rslt () { 
	echo
	"<div id='preloder'>
		<div class= 'loader'></div>
	</div>" ;

	global $conn;
	$kwd = $_GET["q"]; 
	$filterKwd = mysqli_real_escape_string($conn, $kwd);
	$find = "SELECT * FROM property WHERE PROPERTY_NAME LIKE '%$filterKwd%' OR LOCATION LIKE '%$filterKwd%' ";
	$find_Result = mysqli_query($conn, $find); 
	$q_result_count = mysqli_num_rows($find_Result);

	if ($q_result_count > 0) { 
		echo "<Strong class ='container text-left'> Showing search results for '" , $kwd , "'</strong>";

		while ($output = mysqli_fetch_assoc($find_Result)) {
			echo							
			"<div class='pr-5 pl-3'> 
			<div class='card'>
			
			<div class='card-header bg-info text-white'>
			<h5 class='card-title text-center'> " . $output['PROPERTY_NAME'] . "</h5> 
			<p class='text-center'>" . $output['LOCATION'] . "</p> </div>

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

		<br>" ;
	}
	} else {
			echo "Your Keyword '" , $kwd ,  "' did not match with anything!  ";

		}

}

?>