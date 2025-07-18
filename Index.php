<?php

include 'view/Header.php';
session_start();

$page = $_GET['page'] ?? 'home';  // Default to 'home' if not set

switch ($page) {
    case 'register': {
        require_once './controller/RegisterController.php';
        $controller = new RegisterController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->register();
        }
        include './view/Register.php';
        break;
    }

    case 'login': {
        require_once './controller/LoginController.php';
        $controller = new LoginController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->login();  // Handle login form submit
        }
        include './view/Login.php';
        break;
    }
    
    default: {
        if (isset($_SESSION['id'])) {
            include './view/Login.php';  
        } else {
            // Redirect to login page with correct controller handling
            header("Location: index.php?page=login");
            exit;
        }
        break;
    }
}
?>
