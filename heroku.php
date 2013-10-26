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
    . "host=ec2-54-235-74-57.compute-1.amazonaws.com;"
    . "dbname=d1gueknm6h2psa;"
    . "user=pwbtzrsrgvgqrq;"
    . "port=5432;"
   
    . "password=AavMrCiPYOhYhVHj173a2tS2EZ";
 
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
