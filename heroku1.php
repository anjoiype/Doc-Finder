
  

<?php

//connect to the database.
$link =  pg_connect("host=ec2-54-235-74-57.compute-1.amazonaws.com port=5432 dbname=d1gueknm6h2psa user=pwbtzrsrgvgqrq password=AavMrCiPYOhYhVHj173a2tS2EZ sslmode=require options='--client_encoding=UTF8'");

if (!$link) {


    die("Error in connection: " . pg_last_error());


}



//Get the data
$Query = "";
$radio_option = $_GET['person'];
$search_text  = $_GET['search_text'];
if($radio_option == 'name')
{
	$Query = "SELECT * FROM search WHERE doc_name = '".$search_text."'";
} 
if($radio_option == 'speciality')
{
	$Query = "SELECT * FROM search WHERE speciality = '".$search_text."'";
} 
if($radio_option == 'date')
{
	$Query = "SELECT * FROM search WHERE date = '".$search_text."'";
} 
//$Query = "SELECT * FROM search WHERE doc_name = 'susan'";

$Result = pg_query($link,$Query); //Execute the query


$json = array();

$row = true;
while ($row = pg_fetch_array($Result)){
	
	$json['name'] = $row['doc_name'];
	$json['speciality'] = $row['speciality'];
	$json['location'] = $row['loc'];
	$json['avail'] = $row['avail'];
	$json['time'] = $row['time'];
	echo $json_data = json_encode($json);
}



pg_free_result($Result);
pg_close();

?>
