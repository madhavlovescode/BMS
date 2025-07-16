<?php

require_once './model/ModelController.php';
require_once './config/db.php';

class RegisterController
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name     = $_POST['name'] ?? '';
            $email    = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $model = new UserModel($GLOBALS['conn']);

            if (empty($name) || empty($email) || empty($password)) {
            echo "Every field is required";
            }
            else if ($model->registerUser($name, $email, $password)) {
             echo "Registration successful. <a href='Index.php?page=login'>Login Now</a>";
            }
            else {
                echo "Registration failed. Try again.";
            }

        }
        
    }
}
