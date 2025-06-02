<?php
class Task {
    public $title;
    public $description;
    public $dueDate;
    public $status;
    public $priority;

    public function __construct($title, $description, $dueDate, $status, $priority) {
        $this->title = $title;
        $this->description = $description;
        $this->dueDate = $dueDate;
        $this->status = $status;
        $this->priority = $priority;
    }

    public function toArray() {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'dueDate' => $this->dueDate,
            'status' => $this->status,
            'priority' => $this->priority
        ];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = 'users.json';

    $email = $_POST['email'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $dueDate = $_POST['dueDate'];
    $status = $_POST['status'];
    $priority = $_POST['priority'];

    $users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    $userFound = false;

    foreach ($users as &$user) {
        if ($user['email'] === $email) {
            $userFound = true;

            $task = new Task($title, $description, $dueDate, $status, $priority);
            $user['tasks'][] = $task->toArray();
            break;
        }
    }

    if (!$userFound) {
        echo "User not found.";
        exit;
    }

    file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
    echo "Task added successfully.<br><a href='add_task.html'>Back</a>";
}
?>
