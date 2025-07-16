<?php
require_once './model/ModelController.php';
require_once './config/db.php';

session_start();

class LoginController
{
    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username   = $_POST['username'] ?? '';
            $password   = $_POST['password'] ?? '';
            $adminId    = 'admin';
            $adminPass  = 'admin';

            if ($username === $adminId && $password === $adminPass) {
                header('Location: ./view/AdminDashboard.php');
                exit();
            }

            $model = new UserModel($GLOBALS['conn']);
            $userData = $model->checkLogin($username, $password);

            if ($userData) {
                $_SESSION['id'] = $userData['id'];
                header('Location: view/BloggerDashboard.php');
                exit();
            } else {
                echo 'Invalid Credentials';
            }
        }
    }
}
