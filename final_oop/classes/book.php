<?php

require_once 'Database.php';
class Product {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAllBook() {
        $result = $this->conn->query("SELECT * FROM book");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getBookById($BookId) {
        $stmt = $this->conn->prepare("SELECT * FROM book WHERE id = ?");
        $stmt->bind_param("i", $BookId);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $result;
    }

    public function addBook($Name, $id, ) {
        $stmt = $this->conn->prepare("INSERT INTO Book (passennger_name, payment ) VALUES (?, ?, )");
        $stmt->bind_param("sdi", $Name, $payment );
        $stmt->execute();
        $stmt->close();
    }

    public function  updateProduct($Id, $Name, $payment ) {
        $stmt = $this->conn->prepare("UPDATE book SET passenger_name=?, payment=?,  WHERE id=?");
        $stmt->bind_param("sdii", $Name, $payment, $Id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteProduct($Id) {
        $stmt = $this->conn->prepare("DELETE FROM book WHERE id = ?");
        $stmt->bind_param("i", $d);
        $stmt->execute();
        $stmt->close();
    }
}
?>