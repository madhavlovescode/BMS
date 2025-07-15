<?php

declare(strict_types=1);

require_once './model/ModelController.php';
require_once './config/db.php';

class RegisterController
{
    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name     = $_POST['name'] ?? '';
            $email    = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $model = new UserModel($GLOBALS['conn']);

            if ($model->registerUser($name, $email, $password)) {
                echo "Registration successful. <a href='Index.php'>Login Now</a>";
            }
        }
    }
}
