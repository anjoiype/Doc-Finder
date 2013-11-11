<?php

//connect to the database.
$link =  pg_connect("host=ec2-54-235-74-57.compute-1.amazonaws.com port=5432 dbname=d1gueknm6h2psa user=pwbtzrsrgvgqrq password=AavMrCiPYOhYhVHj173a2tS2EZ sslmode=require options='--client_encoding=UTF8'");

if (!$link) 
{
	    die("Error in connection: " . pg_last_error());
}

//Get the data
$Query = "";
$uname = $_GET['uname'];
$pwd  = $_GET['pwd'];

$Query = "SELECT d_or_p,uid_did FROM login WHERE uname='".$uname."' AND pwd = '".$pwd."'";

$Result = pg_query($link,$Query); //Execute the query

$row_no= pg_affected_rows($Result);
if($row_no == 0)
{
		header("location: http://lit-journey-1188.herokuapp.com/index.html?redirect=true&tok=false");
}
else
{
	while ($row = pg_fetch_row($Result))
	{  
	
		if($row[0] == "p")
		{
			header("location: http://lit-journey-1188.herokuapp.com/user_home.html?uid=".$row[1]);
		}
		else
		{
			header("location:http://lit-journey-1188.herokuapp.com/new_doc.html");
		}
	}	
}
pg_free_result($Result);
pg_close();
?>
