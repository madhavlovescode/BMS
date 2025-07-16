<?php

declare(strict_types=1);

require_once '../model/ModelController.php';
require_once '../config/db.php';

class BlogController
{
    public function createBlog()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bloggerId   = $_POST['blogger_id'] ?? '';
            $title       = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';
            $date        = $_POST['date'] ?? '';
            $category    = $_POST['category'] ?? '';
            $keywords    = $_POST['keyword'] ?? '';
            $image        = $name = $_FILES['image']['name'] ?? '';
            $status      = $_POST['status'] ?? '';
            $model = new UserModel($GLOBALS['conn']);            
           if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $targetDir = '../image/';
    $imageName = basename($_FILES['image']['name']);
    echo $_FILES['image'];
    $targetFilePath = $targetDir . $imageName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
        $imagePath = $imageName;
    } else {
        echo "Image upload failed.";
        return;
    }
} else {
    $imagePath = '';
}

    //image upload code ends here
            if ($model->createBlog($bloggerId, $title, $description, $date, $category, $keywords, $image, $status)) {
                
            
                echo 'Blog created successfully. Now wait for the admin to approve.';
                header('Location: BlViewBlog.php');
                exit;
            } else {
                echo 'Error during task creation.';
            }
        }
    }
}
