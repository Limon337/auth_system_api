<?php
require_once '../classes/User.php'; // Include the User class

header("Content-Type: application/json");

$user = new User(); // Create an instance of the User class

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Call the logout method of the User class
    $response = $user->logout();
    echo json_encode($response); // Return the logout response as JSON
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method. Use POST."]);
}
?>
