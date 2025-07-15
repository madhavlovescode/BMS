<?php

declare(strict_types=1);

session_start();

require_once '../controller/BlogController.php';
require_once '../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $model = new UserModel($conn);
    $model->deleteBlog($id);
}

header('Location: blviewblog.php');
exit();
