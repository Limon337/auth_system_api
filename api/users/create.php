<!-- <?php
require_once '../../classes/User.php';
header("Content-Type: application/json");

$user = new User();
$data = json_decode(file_get_contents("php://input"), true);

if ($user->register($data['name'], $data['email'], $data['password'])) {
    echo json_encode(["status" => "success", "message" => "User created successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "User creation failed"]);
}
?> -->




<?php
require_once '../../classes/User.php';
header("Content-Type: application/json");

$user = new User();
$data = json_decode(file_get_contents("php://input"), true);

// Validate and sanitize input data
if (!isset($data['name']) || !isset($data['email']) || !isset($data['password'])) {
    echo json_encode(["status" => "error", "message" => "Missing required fields"]);
    exit();
}

$name = htmlspecialchars(trim($data['name']));
$email = filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL);
$password = trim($data['password']);

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["status" => "error", "message" => "Invalid email format"]);
    exit();
}

// Hash the password before storing
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

if ($user->register($name, $email, $passwordHash)) {
    echo json_encode(["status" => "success", "message" => "User created successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "User creation failed"]);
}
?>
