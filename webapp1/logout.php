<?php 
// Session logout sequence
session_start();
$_SESSION = array(); //delete all session variables
session_destroy();  // ends server session

// If you use cookies, you set expiray to previous date
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
    Good Bye...
   Go back to <a href="login.php">login page</a>.
</body>
</html>