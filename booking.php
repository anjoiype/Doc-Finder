<?php

//connect to the database.
$link =  pg_connect("host=ec2-54-235-74-57.compute-1.amazonaws.com port=5432 dbname=d1gueknm6h2psa user=pwbtzrsrgvgqrq password=AavMrCiPYOhYhVHj173a2tS2EZ sslmode=require options='--client_encoding=UTF8'");

if (!$link) {
    die("Error in connection: " . pg_last_error());
}



//Get the data
$Query = "";
$name = $_GET['pat_name'];
$sex  = $_GET['sex'];
$age = $_GET['age'];
$add = $_GET['add'];
$uid = $_GET['usr_id'];
$doc_id=$_GET['doc_id'];
$Query = "INSERT INTO booking(name,age,sex,add,uid,doc_id) VALUES('".$name."',".$age.",'".$sex."','".$add."','".$uid."','".$doc_id."')";
$Result = pg_query($link,$Query); //Execute the query
if(!$Result)
{
	die("Error in query: 1" . pg_last_error());
}

$Query = "SELECT avail FROM search WHERE doc_id ='".$doc_id."'";
$Result = pg_query($link,$Query); //Execute the query
if(!$Result)
{
	die("Error in query:2 " . pg_last_error());
}
while ($row = pg_fetch_row($Result))
{
	$avail=$row[0];
	$avail=$avail-1;
}
$Query = "UPDATE search SET avail=".$avail."WHERE doc_id = '".$doc_id."'";
$Result = pg_query($link,$Query); //Execute the query
if(!$Result)
{
	die("Error in query: 3" . pg_last_error());
}
$Query = "UPDATE doc_details SET avail=".$avail."WHERE doc_id = '".$doc_id."'";
$Result = pg_query($link,$Query); //Execute the query
if(!$Result)
{
	die("Error in query:4 " . pg_last_error());
}

header("location:http://lit-journey-1188.herokuapp.com/booked.html");

?>
