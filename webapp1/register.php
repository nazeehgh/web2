<!-- REFERENCE2: https://www.phptutorial.net/php-tutorial/php-registration-form/ -->
<?php
    session_start();
    require 'db\conn.inc';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="res/style.css">
  <title>Registration Page</title>
</head>

<body>

<!-- Registration Form -->
  <form action="register.php" method="post">
    <div class="container">
      <h1>Register</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>

      <label for="uid"><b>User ID</b></label>
      <input type="text" placeholder="Enter User ID" name="uid" id="uid" required>

      <label for="uname"><b>Name</b></label>
      <input type="text" placeholder="Enter Your Name" name="uname" id="uname" required>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="uemail" id="uemail" required>

      <label for="upass"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="upass" id="upass" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
      <hr>

      <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
      <button type="submit" class="registerbtn">Register</button>
    </div>

    <div class="container signin">
      <p>Already have an account? <a href="login.php">Sign in</a>.</p>
    </div>
  </form>

<!-- Registration Code -->
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  echo "registration process...";
  $uid = trim($_POST['uid']);
  $upass = trim($_POST['upass']);
  $uname = trim($_POST['uname']);
  $uemail = trim($_POST['uemail']);
  register_user($uid,$upass,$uname,$uemail);
}

function register_user(string $uid, string $upass, string $uname, string $uemail, bool $is_admin = false): bool
{

// mysqli statement reference:  https://www.php.net/manual/en/mysqli-stmt.bind-param.php
$sql = 'INSERT INTO users(uid, upass, uname, uemail)
            VALUES(?, ?, ?, ?)';
global $conn;
$statement =  $conn->prepare($sql);
// $statement->bind_param("s string, i integer, d floating ppoint, b blob", $uid, $upass, $uname, $uemail);
$statement->bind_param("ssss", $uid, $upass, $uname, $uemail);


// USING PDO
//     $sql = 'INSERT INTO users(uid, upass, uname, uemail)
//     VALUES(:uid, :upass, :uname, :uemail)';
// $statement = $conn->prepare($sql);
//     // $statement->bindValue(':uid', $uid, PDO::PARAM_STR);
// $statement->bindValue(':upass', $upass, PDO::PARAM_STR);
// $statement->bindValue(':uname', $uname, PDO::PARAM_STR);
// $statement->bindValue(':uemail', $uemail, PDO::PARAM_STR);
// $statement->bindValue(':uname', password_hash($password, PASSWORD_BCRYPT), PDO::PARAM_STR);
// $statement->bindValue(':uemail', (int)$is_admin, PDO::PARAM_INT);
// $statement->execute();
return $statement->execute();
}
?>




</body>
</html>