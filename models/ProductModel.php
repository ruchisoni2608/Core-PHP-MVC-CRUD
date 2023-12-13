<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ProductModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getProducts() {
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);
        
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return $products;
    }

    public function addProduct($name, $price) {
        $sql = "INSERT INTO products (name, price) VALUES ('$name', $price)";
        return $this->conn->query($sql);
    }

    public function updateProduct($id, $name, $price) {
        $sql = "UPDATE products SET name='$name', price=$price WHERE id=$id";
        return $this->conn->query($sql);
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE id=$id";
        return $this->conn->query($sql);
    }
    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }
}
