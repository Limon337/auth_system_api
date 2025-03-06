<!-- <?php
require_once '../../classes/User.php';
header("Content-Type: application/json");

$user = new User();
$data = json_decode(file_get_contents("php://input"), true);

if ($user->deleteUser($data['id'])) {
    echo json_encode(["status" => "success", "message" => "User deleted successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Delete failed"]);
}
?> -->






<?php
require_once '../../classes/User.php';
header("Content-Type: application/json");

$user = new User();
$data = json_decode(file_get_contents("php://input"), true);

// Validate the input
if (!isset($data['id'])) {
    echo json_encode(["status" => "error", "message" => "User ID is required"]);
    exit();
}

$id = (int) $data['id'];  // Ensure ID is treated as an integer

// Delete the user
if ($user->deleteUser($id)) {
    echo json_encode(["status" => "success", "message" => "User deleted successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Delete failed"]);
}
?>

