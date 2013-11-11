<?php 
$usr_id=$_GET['usr_id'];
$doc_id = $_GET['doc_id'];

$radio_text = $_GET['person'];
$search_string  = $_GET['search_text'];
$Query = "SELECT avail FROM search WHERE doc_id='".$doc_id."'";
$Result = pg_query($link,$Query); //Execute the query
if(!$Result)
{
	die("Error in query: " . pg_last_error());
}
$row = pg_fetch_row($Result);
$avail =$row[0];
if(($avail-1)!=0)
{
	header("location:http://lit-journey-1188.herokuapp.com/booking.html");
}
else
{
	header("location:http://lit-journey-1188.herokuapp.com/get_param.html?usr_id=".$usr_id."&doc_id=".$doc_id."&person=".$radio_text."&search_text=".$search_text."&avail=false");
}
<?


?>
