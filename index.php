<?php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'controllers/ProductController.php';

include_once 'config/database.php';
 include 'views/layouts/header.php'; 


$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controller = new ProductController($conn);

switch ($action) {
    case 'index':
        $controller->index();
        break;        
    case 'add':
        
        $controller->add();
        break;
    case 'update':
        $productId = isset($_GET['id']) ? $_GET['id'] : null;
        if ($productId !== null) {
            $controller->update($productId);
        }
        break;
    case 'delete':
        $productId = isset($_GET['id']) ? $_GET['id'] : null;
        if ($productId !== null) {
            $controller->delete($productId);
        }
        break;
    default:
    
        $controller->index();
}

$conn->close();
