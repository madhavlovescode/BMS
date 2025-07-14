<?php
session_start();
require_once "../controller/blogcontroller.php";
require_once "../config/db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $model = new UserModel($conn);
    $model->deleteblog($id);
}

header('Location: adminviewblog.php');
exit();

?>