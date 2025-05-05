<?php
session_start();
require "db\conn.inc";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web App - Web Application Development 2 Course</title>
</head>
<body>
    index page
    <?php
    echo $_SESSION['username'];
    ?>
</body>
</html>