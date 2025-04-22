<?php
// Create connection
$conn = new mysqli("localhost", "root", "", "test");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Last ID</title>
</head>
<body>
    <?php
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Zaid', 'Qtaish', 'zaid@example.com')";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;
  echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
</body>
</html>