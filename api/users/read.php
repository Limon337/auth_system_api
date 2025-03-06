 <!-- <?php
require_once '../../classes/User.php';
header("Content-Type: application/json");

$user = new User();
echo json_encode($user->getUsers());
?>  -->




<?php
require_once '../../classes/User.php';
header("Content-Type: application/json");

$user = new User();

// Fetch all users
$users = $user->getUsers();

// Check if users were found
if ($users) {
    echo json_encode(["status" => "success", "data" => $users]);
} else {
    echo json_encode(["status" => "error", "message" => "No users found"]);
}
?>


