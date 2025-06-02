<?php
$file = 'users.json';

$users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>User To-Do Lists</title>
</head>
<body>
    <nav class="navbar">         
        <a href="index.php">Home</a>
        <a href="register_user.html">Register User</a>
        <a href="add_task.html">Add Task</a>
        <a href="user_list.php" style="background-color:lightgreen">User List</a>
        <a href="users.json">Users JSON</a>
    </nav>
    <h1>All Users and Their Tasks</h1>

    <?php if (empty($users)): ?>
        <p>No users found.</p>
    <?php else: ?>
        <?php foreach ($users as $user): ?>
            <hr>
            <h2>User: <?= htmlspecialchars($user['name']) ?></h2>
            <p>Email: <?= htmlspecialchars($user['email']) ?></p>
            <p>Phone: <?= htmlspecialchars($user['phone']) ?></p>
            <h3>Tasks:</h3>

            <?php if (empty($user['tasks'])): ?>
                <p>No tasks found.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($user['tasks'] as $task): ?>
                        <li>
                            <strong><?= htmlspecialchars($task['title']) ?></strong><br>
                            Description: <?= htmlspecialchars($task['description']) ?><br>
                            Due Date: <?= htmlspecialchars($task['dueDate']) ?><br>
                            Status: <?= htmlspecialchars($task['status']) ?><br>
                            Priority: <?= htmlspecialchars($task['priority']) ?>
                        </li>
                        <br>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
