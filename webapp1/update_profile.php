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

$uid = $_SESSION['uid'];
$sql = "SELECT * FROM users WHERE uid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $uid);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// test fetch statement (returned user data)
// echo $row['uid'] . " | " . $row['upass'] . " | " . $row['uname'] . " | " . $row['uemail'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="res/style.css">
    <title>Update Profile</title>
</head>
<body>

<nav>
        <ul>
            <li><a href="index.php">Main Page</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div>Welcome <?php echo $_SESSION['uname']; ?>.</div>

<!-- Update user profile form -->
  <form method="post">
    <div class="container">
      <h1>Update Profile Data</h1>
      <hr>

      <label for="uname"><b>Name</b></label>
      <input type="text" placeholder="Enter Your Name" name="uname" id="uname" value="<?php echo $row['uname']?>" required>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="uemail" id="uemail" value="<?php echo $row['uemail']?>" required>

      <hr>

      <button type="submit" class="registerbtn">Update</button>
    </div>
  </form>

<!-- Update Profile Data Code -->
<?php

if(isset($_REQUEST["status"])){
    echo $_REQUEST["status"];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  echo "Form Update Process...";
//$upass = trim($_POST['upass']);
  $uname = trim($_POST['uname']);
  $uemail = trim($_POST['uemail']);
// echo $uname . $uemail;
  if (update_user($uname,$uemail, $row['uid'])) {
        header("Location: update_profile.php?status=Profile updated successfully.");
    } else {
        header("Location: update_profile.php?status=Error:"  ."$stmt->error");
    }
  
}

function update_user(string $uname, string $uemail, string $uid): bool
{

// mysqli statement reference:  https://www.php.net/manual/en/mysqli-stmt.bind-param.php
$sql = "UPDATE users SET uname = ?, uemail = ? WHERE uid = ?";
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $uname, $uemail, $uid);

    return $stmt->execute();
}
?>
    
</body>
</html>