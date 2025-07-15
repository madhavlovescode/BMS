<?php
include "Header.php";
session_start();
require_once '../model/ModelController.php';
require_once '../config/db.php';

$model=new usermodel($conn);
$blog=null;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    echo $id;
    $blog = $model->getBlogById($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $blog_Id= $_POST['blog_id'];
    $blogger_Id = $_POST['blogger_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $created_on = $_POST['created_on'];
    $category = $_POST['category'];
    $keyword = $_POST['keyword'];
    $status = $_POST['status'];

    $model->UpdateBlog($blog_Id, $blogger_Id, $title, $description,$created_on, $category, $keyword, $status);
    header('Location: BlViewBlog.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
</head>
<body>

    <h1>Blogger Edit Blog</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Blog ID:</td>
                <td><?php echo $blog['blog_id']; ?><input type="hidden" name="blog_id" value="<?php echo $blog['blog_id']; ?>"></td>
            </tr>
            <tr>
                <td>Blogger ID:</td>
                <td><?php echo $blog['blogger_id']; ?><input type="hidden" name="blogger_id" value="<?php echo $blog['blogger_id']; ?>" ></td>
            </tr>
            <tr>
                <td>Title:</td>
                <td><input type="text" name="title" value="<?php echo $blog['title']; ?>"></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><textarea rows="5" cols="40" name="description">
                    <?php echo $blog['description'];

                    ?>
                </textarea></td>
            </tr>
            <tr>
                <td>Created On:</td>
                <td><input type="date" name="created_on" value="<?php echo $blog['created_on']; ?>"></td>
            </tr>
            <tr>
                <td>Category :</td>
                <td><input type="text" name="category" value="<?php echo $blog['category']; ?>"></td>
            </tr>
            <tr><td>keyword :</td>
                <td><input type="text" name="keyword" value="<?php echo $blog['keyword']; ?>" ></td>
            </tr>
                <td>Status:</td>
                <td><?php echo $blog['status']; ?><input type="hidden" name="status" value="<?php echo $blog['status']; ?>" readonly></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Update"></td>
            </tr>
        </table>
    </form>
<a href="BlViewBlog.php">back to view</a>
</body>
</html>

<?php
include 'Footer.php';
?>
