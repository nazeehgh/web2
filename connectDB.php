<?php
require "conn.inc";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <form method="POST">
    <input type="text" id="myInput" name="myInput">
  </form>
    <?php
// Create connection
$conn = new mysqli("localhost", "root", "");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "SELECT * FROM test.table1;";  
$result = $conn->query($sql);
echo $result->num_rows;
echo "<br>";

echo "<br>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["A"]. " - Name: " . $row["B"]. " C=" . $row["C"]. "<br>";
      
    }
  } else {
    echo "0 results";
  }
  $conn->close();
  
?>
</body>
</html>