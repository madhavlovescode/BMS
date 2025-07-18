<?php

require_once './model/ModelController.php';
require_once './config/db.php';

class RegisterController
{   /**
     * Handles the registration process for a new user.
     *
     * - Retrieves `name`, `email`, and `password` from the registration form.
     * - Validates all the field
     * - if success, redirects to the login page.
     * - if failure, displays an error message.
     *
     * @return void Outputs validation or error messages.
     */   
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
                header('Location: Index.php?page=login');
                exit();
            }
            else {
                echo "Registration failed. Try again.";
            }

        }
        
    }
}
