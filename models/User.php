<?php
require_once 'config/database.php';

class User {
    private $conn;
    private $table = 'users';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function register($username, $email, $password, $google_id = null) {
        $query = "INSERT INTO " . $this->table . " (username, email, password_hash, google_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        
        $password_hash = $password ? password_hash($password, PASSWORD_DEFAULT) : null;
        
        return $stmt->execute([$username, $email, $password_hash, $google_id]);
    }

    public function login($email, $password) {
        $query = "SELECT * FROM " . $this->table . " WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password_hash'])) {
            return $user;
        }
        
        return false;
    }

    public function findByEmail($email) {
        $query = "SELECT * FROM " . $this->table . " WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByGoogleId($google_id) {
        $query = "SELECT * FROM " . $this->table . " WHERE google_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$google_id]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateGoogleId($user_id, $google_id) {
        $query = "UPDATE " . $this->table . " SET google_id = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        
        return $stmt->execute([$google_id, $user_id]);
    }

    public function emailExists($email) {
        return $this->findByEmail($email) !== false;
    }

    public function usernameExists($username) {
        $query = "SELECT * FROM " . $this->table . " WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }
}
?>