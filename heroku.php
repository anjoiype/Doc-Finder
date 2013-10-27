<html>
 <head>
  <title>Employees</title>
 </head>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
 <script>
		function mycall(){
		$.ajax({
					type: “POST”,  //type of request  GET or POST
					url: heroku.php, // url to which the request is send
					success: function(xmlData){// function to be called if the request succeeds
						funEmpData(xmlData); // return data
					},
					error: function(){  //function to be called if the request fail
						alert(“error”);
					}
 
				});
				function funEmpData(xmlData)
				{
					// all raw data is in returnXML
					// itertin through loop in jQuery
					var table_data = '<table border=1 ><tr><td>User Name</td><td>Address</td>';
					$(xmlData).find('emp_data').each(function(){
 
					var username    = $(this).find('doc_name').text();
					var address     = $(this).find('location').text();
					table_data += '<tr >';
					table_data += '<td>'+username+'</td>';
					table_data += '<td>'+address+'</td></tr>';
 
					});
 
					table_data += '</table>';
 
					$('#emp_search_data').html(table_data); // for display
 
				}	
			}
	</script>		
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
//return $XML;

pg_free_result($Result);
pg_close();
mycall();
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
