<?php

require_once __DIR__ . '/../model/ModelController.php';
require_once __DIR__ . '/../config/db.php';


class BlogController
{    /**
     * Handles the creation of a new blog post.
     *
     * - Retrieves form data: blogger_id, title, description, date, category, keyword, image, and status.
     * - Validates and uploads the blog image to the `assets/image/` folder.
     * - Calls the UserModel to save the blog to the database.
     * - Redirects to the BlViewBlog.php page if success.
     *
     * @return void Outputs success or failure messages and performs a redirect on success.
     */
    public function createBlog()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bloggerId   = $_POST['blogger_id'] ?? '';
            $title       = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';
            $date        = $_POST['date'] ?? '';
            $category    = $_POST['category'] ?? '';
            $keywords    = $_POST['keyword'] ?? '';
            $image       = $_FILES['image']['name'] ?? '';
            $status      = $_POST['status'] ?? '';

            $model = new UserModel($GLOBALS['conn']);

            // Image upload handling
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $imageName = basename($_FILES['image']['name']);

                // Use __DIR__ to get absolute directory for file moving
                $uploadDir = __DIR__ . '/../assets/image/';
                $targetFilePath = $uploadDir . $imageName;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                    // Save relative path (for DB or HTML)
                    $imagePath = $imageName;

                }else {
                echo 'Image upload failed.';
                return;
                }
            } else {
            $imagePath = '';
            }


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
