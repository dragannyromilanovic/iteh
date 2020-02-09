<?php
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eNyro";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 =>'id',
	1 => 'naziv',
	2=> 'geoSirina',
	3=> 'geoDuzina',

);

// getting total number records without any search
$sql = "SELECT ".implode(",",array_values($columns));
$sql.=" FROM drzava c";
$query=mysqli_query($conn, $sql) or die($sql);
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT ".implode(",",array_values($columns));
	$sql.=" FROM drzava c WHERE 1=2";
	$sql.=" OR id LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR naziv LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR geoSirina LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" OR geoDuzina LIKE '%".$requestData['search']['value']."%' ";
	$sql.=" ORDER BY id DESC";

	$query=mysqli_query($conn, $sql) or die($sql);
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die($sql); // again run query with limit
	
} else {

	$sql = "SELECT ".implode(",",array_values($columns));
	$sql.=" FROM drzava ";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die($sql);
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array();
	$nestedData[] = $row["id"];
	$nestedData[] = $row["naziv"];
	$nestedData[] = $row["geoSirina"];
	$nestedData[] = $row["geoDuzina"];

	$data[] = $nestedData;
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
