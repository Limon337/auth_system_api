<?php
require_once '../classes/User.php';
$user = new User();

if (!$user->isLoggedIn()) {
    header("Location: login.php");
    exit();
}


// echo "Welcome, " . $_SESSION['user_name'] . "!<br>";
// echo "<a href='logout.php'>Logout</a>";


?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card p-4 shadow-sm w-50">
    <h1 class="text-center">Dashboard</h1>
    <p class="text-center">Welcome Back <strong><?php echo $_SESSION['user_name']; ?></strong>!</p>
    <div class="text-center">
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</div>

</body>
</html>



 
