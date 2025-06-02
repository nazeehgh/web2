<?php
class User {
    public $name;
    public $email;
    public $phone;
    public $tasks;

    public function __construct($name, $email, $phone) {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->tasks = [];
    }

    public function toArray() {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'tasks' => $this->tasks
        ];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = 'users.json';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    foreach ($users as $user) {
        if ($user['email'] === $email) {
            echo "User with this email already exists.";
            exit;
        }
    }

    $newUser = new User($name, $email, $phone);
    $users[] = $newUser->toArray();

    file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));

    echo "User registered successfully.<br><a href='register_user.html'>Back</a>";
}
?>
