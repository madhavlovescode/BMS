<?php

require_once './model/ModelController.php';
require_once './config/db.php';

class LoginController
{   /**
     * Handle user login by verifying credentials.
     *
     * - Retrieve `username` and `password` from POST.
     * - If the credentials match  to admin, redirects to the admin dashboard.
     * - If a blogger then redirects to blogger dashboard.
     * - On failure, shows an Invalid Credentials
     *
     * @return void Outputs error message or redirects on success.
     */  
    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username   = $_POST['username'] ?? '';
            $password   = $_POST['password'] ?? '';
            $adminId    = 'admin';
            $adminPass  = 'admin';

            if ($username === $adminId && $password === $adminPass) {
                header('Location: ./view/admin/AdminDashboard.php');
                exit();
            }

            $model = new UserModel($GLOBALS['conn']);
            $userData = $model->checkLogin($username, $password);

            if ($userData) {
                $_SESSION['id'] = $userData['id'];
                header('Location: view/blogger/BloggerDashboard.php');
                exit();
            } 
            else {
                echo 'Invalid Credentials';
                exit();
            }
        }
    }
}
