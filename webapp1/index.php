<?php
session_start();
require "db\conn.inc";
check_authentication();
// FUNCTIONS.... to be mved to a separate file
function check_authentication(){
    if(!isset($_SESSION['uid']))
    {
        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web App - Web Application Development 2 Course</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="update_profile.php">Update Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div>Welcome <?php echo $_SESSION['uname']; ?>.</div>
    
</body>
</html>