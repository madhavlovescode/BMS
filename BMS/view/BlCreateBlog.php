<?php

include "header.php";
session_start();

require_once '../controller/BlogController.php';
require_once '../model/ModelController.php';
require_once '../config/db.php';

$controller = new BlogController();
$controller->createBlog();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Create and Submit Blog Post</h1>

    <form action="" method="POST" class="border p-4 bg-white rounded" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td>Blogger ID:</td>
                <td><input type="text" name="blogger_id" value="<?= $_SESSION['id'] ?>" class="form-control" readonly></td>
            </tr>
            <tr>
                <td>Title:</td>
                <td><input type="text" name="title" class="form-control" required></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><input type="text" name="description" class="form-control" required></td>
            </tr>
            <tr>
                <td>Date:</td>
                <td><input type="date" name="date" class="form-control" required></td>
            </tr>
            <tr>
                <td>Category:</td>
                <td><input type="text" name="category" class="form-control" required></td>
            </tr>
            <tr>
                <td>Keywords:</td>
                <td><input type="text" name="keyword" class="form-control" required></td>
            </tr>
            <tr>
                <td>Image:</td>
                <td><input type="file" name="image" class="form-control"></td>
            </tr>
            <tr>
                <td>Status:</td>
                <td><input type="text" name="status" value="pending" class="form-control" readonly></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Submit Blog" class="btn btn-primary">
                    <a href="bloggerdashboard.php" class="btn btn-secondary">Back to Dashboard</a>
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>

<?php
include 'footer.php';
?>
