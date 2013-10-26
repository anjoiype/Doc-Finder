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

$dsn = "pgsql:"
    . "host=ec2-54-204-20-28.compute-1.amazonaws.com;"
    . "dbname=d48lm9c21sqkda;"
    . "user=augpxcuohqgwzs;"
    . "port=5432;"
   
    . "password=RcLr0CX0JB3VL6sSPQMbGj4k-w";
 
$db = new PDO($dsn);
$query = "SELECT doc_name, loc, feedback"
    . "FROM search";
$result = $db->query($query);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row["employee_id"] . "</td>";
    echo "<td>" . htmlspecialchars($row["doc_name"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["loc"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["feedback"]) . "</td>";
    echo "</tr>";
}
$result->closeCursor();
?>
   </tbody>
  </table>
 </body>
</html>
