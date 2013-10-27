<html>
 <head>
  <title>Employees</title>
 </head>
 <body>
<table>
   <thead>
    <tr>
     <th>Employee ID</th>
     <th>Last Name</th>
     <th>First Name</th>
     <th>Title</th>
    </tr>
   </thead>
   <tbody>
  

<?php

//connect to the database.
$link = pg_connect("host=ec2-54-235-74-57.compute-1.amazonaws.com port=5432 dbname=d1gueknm6h2psa user=pwbtzrsrgvgqrq password=AavMrCiPYOhYhVHj173a2tS2EZ sslmode=require options='--client_encoding=UTF8'");
if (!$link) {


    die("Error in connection: " . pg_last_error());


}

//Get the data
$Query = "SELECT * from search";
$Result = pg_query($link,$Query); //Execute the query
$XML = "";
$NumFields = pg_num_fields($Result);
$XML .= "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n<entries>\n";
$row = true;
while ($row = pg_fetch_row($Result)){
	$XML .= "<entry>";
	for ($i=0; $i < $NumFields; $i++)
    {   
	    $XML .= "<" . pg_field_name($Result, $i) . ">" . $row[$i] . "</" . pg_field_name($Result, $i) . ">";
    }
	$XML .= "</entry>\n";
}
$XML .= "</entries>";
echo $XML;

pg_free_result($Result);
pg_close();
?>

<!--
// attempt a connection


$dbh =  pg_connect("host=ec2-54-235-74-57.compute-1.amazonaws.com port=5432 dbname=d1gueknm6h2psa user=pwbtzrsrgvgqrq password=AavMrCiPYOhYhVHj173a2tS2EZ sslmode=require options='--client_encoding=UTF8'");


if (!$dbh) {


    die("Error in connection: " . pg_last_error());


}


// execute query


$sql = "SELECT * FROM search";


$result = pg_query($dbh, $sql);


if (!$result) {


    die("Error in SQL query: " . pg_last_error());


}


// iterate over result set


// print each row


while ($row = pg_fetch_array($result)) {


    echo "Country code: " . $row[0] . "<br />";


    echo "Country name: " . $row[1] . "<p />";


}


// free memory


pg_free_result($result);


// close connection


pg_close($dbh);


?>
-->


   </tbody>
  </table>
 </body>
</html>
