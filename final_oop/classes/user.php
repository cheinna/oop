<?php
require_once 'database.php';

class user {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function createUser($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO users (username, password) VALUES (?, ?, )");
        $stmt->bind_param("ssi", $username, $hashedPassword);
        $stmt->execute();
        $stmt->close();
    }

    public function getUserByUsername($username) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $result;
    }

    // public function getAccessLevel($access) {
    //     $stmt = $this->conn->prepare("SELECT * FROM users WHERE isadmin = 1");
    //     $stmt->bind_param("s", $access);
    //     $stmt->execute();
    //     $result = $stmt->get_result()->fetch_assoc();
    //     $stmt->close();
    //     return $result;
    // }
}
?>