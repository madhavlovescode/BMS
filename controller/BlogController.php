<?php
require_once __DIR__ . '/../model/ModelController.php';
require_once __DIR__ . '/../config/db.php';

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
            $status      = $_POST['status'] ?? '';
            $imagePath   = '';

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../assets/image/';
                $imageName = basename($_FILES['image']['name']);
                $targetFile = $uploadDir . $imageName;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                    $imagePath = $imageName;
                } else {
                    echo json_encode(['status' => 'fail', 'message' => 'Image upload failed.']);
                    return;
                }
            }

            $model = new UserModel($GLOBALS['conn']);
            if ($model->createBlog($bloggerId, $title, $description, $date, $category, $keywords, $imagePath, $status)) {
                echo json_encode(['status' => 'success']);
            } else {
                echo json_encode(['status' => 'fail']);
            }
        }
    }
}

$controller = new BlogController();
$controller->createBlog();
?>