<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>
    <form action="login.php" method="post">
        <h1>Login</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Login</button>
    </form>

    <?php
session_start();
require 'db\conn.inc'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$username = trim($_POST['username']);
$password = trim($_POST['password']);

if (empty($username) || empty($password)) {
echo "Username and Password are required.";
} else {
$sql = "SELECT * FROM webappdb.users WHERE uid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $uid);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
$user = $result->fetch_assoc();
if (password_verify($password, $user['uid'])) {
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
?>
</body>

</html>