<?php
    session_start();
    require 'db\conn.inc';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search and Sort using Php and MySql</title>
</head>
<body>
        <nav>
        <ul>
            <li><a href="update_profile.php">Update Profile</a></li>
            <li><a href="search.php">Search and Sort</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <form action="">
    <input type="text" name="iname">
    <input type="submit" value="search">

    </form>

    <?php

    $searchterm = $_GET['iname'];

    $sql = "SELECT * FROM items WHERE iname like ?  ORDER BY iname desc";

    $like = "%$searchterm%";
    // echo "<script> alert( '"  . $like ."' ); </script>";


    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $like);

    $stmt->execute();

    $result = $stmt->get_result();

    echo "<table> <tr><td>Name</td><td>Description</td><td>Price</td></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['iname'] . "</td> <td>" . $row['idesc'] . "</td> <td> " . $row['iprice'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    $stmt->close();
    $conn->close();
    ?>
    
</body>
</html>