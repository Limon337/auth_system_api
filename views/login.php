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


<!-- <h1>Login Form</h1>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
</form> -->





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card p-4 shadow-sm w-25">
    <h2 class="text-center">Login Form</h2>
    <form  method="post">
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>

</body>
</html>