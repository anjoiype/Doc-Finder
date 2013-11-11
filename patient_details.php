<?php

//connect to the database.
$link =  pg_connect("host=ec2-54-235-74-57.compute-1.amazonaws.com port=5432 dbname=d1gueknm6h2psa user=pwbtzrsrgvgqrq password=AavMrCiPYOhYhVHj173a2tS2EZ sslmode=require options='--client_encoding=UTF8'");

if (!$link) {
    die("Error in connection: " . pg_last_error());
}



//Get the data
$Query = "";
$usr_name = $_POST['usr_name'];
$age  = $_POST['age'];
$sex  = $_POST['sex'];
$phno = $_POST['phno'];
$add = $_POST['add'];
$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$uname_uid = substr($usr_name,0,3);
$Query="SELECT id FROM user_id WHERE status = 'p'";
$Result = pg_query($link,$Query); //Execute the query
if(!$Result)
{
	die("Error in query: " . pg_last_error());
}
$row_no= pg_affected_rows($Result);
if($row_no != 0)
{
	
	$row = pg_fetch_row($Result);
	$id = $row[0];
	
	
	$inner_query = "UPDATE user_id SET status = 'o' WHERE id ='".$id."'";
	$inner_result = pg_query($link,$inner_query); //Execute the query
	if(!$inner_result)
	{
		die("Error in query: " . pg_last_error());
	}
	$id=$id+1;
	$user_id = $uname_uid.$id;
	$inner_query = "INSERT INTO user_id(usr_name,usr_id,status) VALUES('".$usr_name."','".$user_id."','p')";
	$inner_result = pg_query($link,$inner_query); //Execute the query
	if(!$inner_result)
	{
		die("Error in query: " . pg_last_error());
	}
	
	
}
else
{
	echo "error in user_id table";
}
$Query = "INSERT INTO patient_details(name,address,age,sex,cno,usr_id) VALUES('".$usr_name."','".$add."',".$age.",'".$sex."','".$phno."','".$user_id."')";
$Result = pg_query($link,$Query); //Execute the query
if(!$Result)
{
	die("Error in query: " . pg_last_error());
}
$Query = "INSERT INTO login(uname,pwd,d_or_p,uid_did) VALUES('".$uname."','".$pwd."','p','".$user_id."')";
$Result = pg_query($link,$Query); //Execute the query
if(!$Result)
{
	die("Error in query: " . pg_last_error());
}
header("location:http://lit-journey-1188.herokuapp.com/user_home.html?uid=".$user_id."&");
pg_free_result($Result);
pg_close();
?>

