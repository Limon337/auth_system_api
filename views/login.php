<?php
session_start();

require_once '../classes/User.php';

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php"); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new User();
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($user->login($email, $password)) {
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid credentials!";
    }
}
?>


<h1>Login Form</h1>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form>
