<?php
// Create connection

use Dom\Document;

$conn = new mysqli("localhost", "root", "", "test");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<?php

$sql= "SELECT A FROM table1 Where D=1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    if(isset($_POST['b1'])){
        $uname = $_POST["uname"];
        echo $uname;
        $sql = "SELECT B FROM table1 WHERE A=$uname";
        $conn->query($sql);
        $result = 
        echo "1";
    }
    if(isset($_POST['b2'])){
        $uname = $_POST["uname"];
        $sql = "UPDATE table1 SET A=$uname WHERE D=19";
        $conn->query($sql);
        echo "2";
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB Operations and Tests</title>
</head>
<body>
    <form method="post">
        <input type="text" name="uname" value="<?php echo $row["A"];?>" >
        <input type="text" name="pass" placeholder="password">
        <input type="submit" name="b1" value="One">
        <input type="submit" name="b2" value="Two">
    </form>
</body>
</html>