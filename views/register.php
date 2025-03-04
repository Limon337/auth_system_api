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


<h1>Registration Form</h1>
<form method="POST">
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <br>
    <button type="submit">Register</button>
</form>
