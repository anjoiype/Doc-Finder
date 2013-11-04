<?php

//connect to the database.
$link =  pg_connect("host=ec2-54-235-74-57.compute-1.amazonaws.com port=5432 dbname=d1gueknm6h2psa user=pwbtzrsrgvgqrq password=AavMrCiPYOhYhVHj173a2tS2EZ sslmode=require options='--client_encoding=UTF8'");

if (!$link) {
    die("Error in connection: " . pg_last_error());
}



//Get the data
$Query = "";
$doc_name = $_GET['doc_name'];
$spec  = $_GET['spec'];
$loc  = $_GET['loc'];
$Query = "INSERT INTO search(doc_name,speciality,loc) VALUES('".$doc_name."','".$spec."','".$loc."')";
$Result = pg_query($link,$Query); //Execute the query
if(!$Result)
{
	die("Error in query: " . pg_last_error());
}
echo "sucessfull";
pg_free_result($Result);
pg_close();
?>
