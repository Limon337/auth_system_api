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

public function getUsers() {
    // Prepare the SQL query to fetch all users (id, name, email)
    $query = "SELECT id, name, email FROM users";

    try {
        // Prepare the statement
        $stmt = $this->db->prepare($query);
        
        // Execute the query
        $stmt->execute();

        // Check if there are any users
        if ($stmt->rowCount() > 0) {
            // Return all users as an associative array
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // Return an empty array if no users are found
        return [];
    } catch (PDOException $e) {
        // Handle any potential database errors
        echo "Error: " . $e->getMessage();
        return null;  // Return null in case of an error
    }
}




public function updateUser($id, $name, $email) {
    // Prepare the SQL query to update user details
    $query = "UPDATE users SET name = :name, email = :email WHERE id = :id";
    $stmt = $this->db->prepare($query);

    // Bind parameters
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);

    // Execute the query and return true if successful, false otherwise
    return $stmt->execute();
}



public function deleteUser($id) {
    // Prepare the SQL query to delete a user by ID
    $query = "DELETE FROM users WHERE id = :id";
    $stmt = $this->db->prepare($query);

    // Bind the ID parameter
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the query and return true if successful, false otherwise
    return $stmt->execute();
}


    
}

?>
