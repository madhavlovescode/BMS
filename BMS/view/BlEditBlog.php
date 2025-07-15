<?php
include "Header.php";
session_start();
require_once '../model/ModelController.php';
require_once '../config/db.php';

$model = new usermodel($conn);
$blog = null;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $blog = $model->getBlogById($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $blog_Id = $_POST['blog_id'];
    $blogger_Id = $_POST['blogger_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $created_on = $_POST['created_on'];
    $category = $_POST['category'];
    $keyword = $_POST['keyword'];
    $status = $_POST['status'];

    // check image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageName = basename($_FILES['image']['name']);
        $target = '../image/' . $imageName;
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    } else {
        $existing = $model->getBlogById($blog_Id);
        $imageName = $existing['imagepath'];
    }

    $model->BlgUpdateBlog($blog_Id, $blogger_Id, $title, $description, $created_on, $category, $keyword, $imageName, $status);
    header('Location: BlViewBlog.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Blog</title>
</head>
<body>
<h1>Blogger Edit Blog</h1>
<form action="" method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Blog ID:</td>
            <td><?php echo $blog['blog_id']; ?>
                <input type="hidden" name="blog_id" value="<?php echo $blog['blog_id']; ?>">
            </td>
        </tr>
        <tr>
            <td>Blogger ID:</td>
            <td><?php echo $blog['blogger_id']; ?>
                <input type="hidden" name="blogger_id" value="<?php echo $blog['blogger_id']; ?>">
            </td>
        </tr>
        <tr>
            <td>Title:</td>
            <td><input type="text" name="title" value="<?php echo $blog['title']; ?>"></td>
        </tr>
        <tr>
            <td>Description:</td>
            <td><textarea name="description" rows="5" cols="40"><?php echo $blog['description']; ?></textarea></td>
        </tr>
        <tr>
            <td>Created On:</td>
            <td><input type="date" name="created_on" value="<?php echo $blog['created_on']; ?>"></td>
        </tr>
        <tr>
            <td>Category:</td>
            <td><input type="text" name="category" value="<?php echo $blog['category']; ?>"></td>
        </tr>
        <tr>
            <td>Keyword:</td>
            <td><input type="text" name="keyword" value="<?php echo $blog['keyword']; ?>"></td>
        </tr>
        <tr>
            <td>Image:</td>
            <td><input type="file" name="image"></td>
        </tr>
        <?php if (!empty($blog['imagepath'])): ?>
        <tr>
            <td>Current Image:</td>
            <td><img src="../image/<?php echo $blog['imagepath']; ?>" width="150" height="150"></td>
        </tr>
        <?php endif; ?>
        <tr>
            <td>Status:</td>
            <td><?php echo $blog['status']; ?>
                <input type="hidden" name="status" value="<?php echo $blog['status']; ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="submit" value="Update"></td>
        </tr>
    </table>
</form>
<a href="BlViewBlog.php">Back to View</a>
</body>
</html>

<?php include 'Footer.php'; ?>
