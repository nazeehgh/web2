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
    <title>Login Page</title>
</head>
<body>
    <form action="login.php" method="post">
    <div class="containerLogin">
    <h1>Login</h1>
      
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>     
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>   
        <button type="submit" class="loginbtn"><span>Login </span></button>
    </div>
    </form>

    <?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        // echo $username . $password;
        

        if (empty($username) || empty($password)) {
            echo "Username and Password are required.";
        } else {
            $sql = "SELECT * FROM users WHERE uid = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            // echo $username;
            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                // echo $password . $user['upass'];

                // if (password_verify($password, $user['upass'])) {
                if (password_check($password, $user['upass'])) {
                    $_SESSION['username'] = $user['uid'];
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Invalid username or password.";
                }
            } else {
                echo "Invalid username or password.";
            }
        }
    }


    // This function is used to check if the passwords match
    // It is recommended to encrypt the password text in the database
    // So you need to modify this, inorder to compare the encrypted text of both passwords.
    function password_check(string $password, string $dbpass): bool
    {
        if ($password == $dbpass) {
            return true;
        } else {
            return false;
        }
    }

    ?>
</body>

</html>