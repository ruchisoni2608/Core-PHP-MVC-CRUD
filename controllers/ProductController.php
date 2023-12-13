<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'models/ProductModel.php';

class ProductController {
    private $model;

    public function __construct($conn) {
        $this->model = new ProductModel($conn);
    }

    public function index() {
        $products = $this->model->getProducts();
        include 'views/products/list.php';
    }
        
    public function add() {
     
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $result =  $this->model->addProduct($name, $price);
            if ($result) {
                header('Location: index.php');
            }
        }
        include 'views/products/create.php';
    }

    public function update($id) {
        $product = $this->model->getProductById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $result = $this->model->updateProduct($id, $name, $price);
            if ($result) {
                header('Location: index.php');
            }
        }

        include 'views/products/update.php';
    }

    public function delete($id) {
        $result = $this->model->deleteProduct($id);
        if ($result) {
            header('Location: index.php');
        }
    }
}
