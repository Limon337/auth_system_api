<?php
require_once '../classes/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new User();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($user->register($name, $email, $password)) {
        echo "Registration successful! <a href='login.php'>Login here</a>";
    } else {
        echo "Registration failed!";
    }
}
?>


<!-- <h1>Registration Form</h1>
<form method="POST">
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    
    <br>
    <button type="submit">Register</button>
</form> -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card p-4 shadow-sm w-25">
    <h2 class="text-center">Registration Form</h2>
    <form action="register.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
        </div>
        <!-- Fixed Register Button -->
        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>
    <p class="mt-3 text-center">Already have an account? <a href="login.php">Login</a></p>
</div>

</body>
</html>
