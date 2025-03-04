<?php
require_once '../classes/User.php';
$user = new User();

if (!$user->isLoggedIn()) {
    header("Location: login.php");
    exit();
}


echo "Welcome, " . $_SESSION['user_name'] . "!<br>";
echo "<a href='logout.php'>Logout</a>";
?>
