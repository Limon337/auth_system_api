<!-- <?php
require_once '../../classes/User.php';
header("Content-Type: application/json");

$user = new User();
$data = json_decode(file_get_contents("php://input"), true);

if ($user->updateUser($data['id'], $data['name'], $data['email'])) {
    echo json_encode(["status" => "success", "message" => "User updated successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Update failed"]);
}
?> -->




<?php
require_once '../../classes/User.php';
header("Content-Type: application/json");

$user = new User();
$data = json_decode(file_get_contents("php://input"), true);

// Validate the input
if (!isset($data['id']) || !isset($data['name']) || !isset($data['email'])) {
    echo json_encode(["status" => "error", "message" => "Missing required fields"]);
    exit();
}

$id = (int) $data['id'];  // Ensure ID is treated as an integer
$name = htmlspecialchars(trim($data['name']));  // Sanitize the name
$email = filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL);  // Sanitize the email

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["status" => "error", "message" => "Invalid email format"]);
    exit();
}

// Update the user
if ($user->updateUser($id, $name, $email)) {
    echo json_encode(["status" => "success", "message" => "User updated successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Update failed"]);
}
?>

