
  

<?php

//connect to the database.
$link = pg_connect("host=ec2-54-235-74-57.compute-1.amazonaws.com port=5432 dbname=d1gueknm6h2psa user=pwbtzrsrgvgqrq password=AavMrCiPYOhYhVHj173a2tS2EZ sslmode=require options='--client_encoding=UTF8'");
if (!$link) {


    die("Error in connection: " . pg_last_error());


}

//Get the data
$Query = "SELECT * from search";
$Result = pg_query($link,$Query); //Execute the query

$json = array();

$row = true;
while ($row = pg_fetch_array($Result)){
	
	$json[] = $row;
}

echo $json_data = json_encode($json);

pg_free_result($Result);
pg_close();

?>
