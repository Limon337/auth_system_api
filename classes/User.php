<?php
require_once __DIR__ . '/../config/Database.php';

class User {
    private $db;
    private $message;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    // Register a new user
    public function register($name, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['name' => $name, 'email' => $email, 'password' => $hashedPassword]);
    }

    // Login user
    public function login($email, $password) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            return true;
        }
        return false;
    }

    // Check if user is logged in
    public function isLoggedIn() {
        session_start();
        return isset($_SESSION['user_id']);
    }

    // Logout user
    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        return $message = 'Logout Successfully!';
        header("Location: logout.php");
        exit();
    }
}
?>
