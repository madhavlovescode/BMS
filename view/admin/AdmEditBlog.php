<?php

include "../Header.php";
session_start();
require_once '../../model/ModelController.php';
require_once '../../config/db.php';

$model=new usermodel($conn);
$blog=null;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
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

    $model->AdmUpdateBlog($blog_Id, $blogger_Id, $title, $description,$created_on, $category, $keyword, $status);
    header('Location: AdmViewBlog.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Edit Blog</title>
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1>ADMIN REVIEW BLOGS</h1>
    <form action="" method="POST" class="border p-4 bg-white rounded" >
        <table class="table">
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
                <td><input type="text" name="title" value="<?php echo $blog['title']; ?>"readonly></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><textarea rows="10" cols="100" name="description" readonly><?php echo $blog['description'];?></textarea>
                </td>
            </tr>
            <tr>
                <td>Created On:</td>
                <td><input type="date" name="created_on" value="<?php echo $blog['created_on']; ?>"readonly></td>
            </tr>
            <tr>
                <td>Category :</td>
                <td><input type="text" name="category" value="<?php echo $blog['category']; ?>"readonly></td>
            </tr>
            <tr><td>keyword :</td>
                <td><input type="text" name="keyword" value="<?php echo $blog['keyword']; ?>" readonly></td>
            </tr>
            <tr><td>image :</td>
                <td><img src="../../assets/image/<?= $blog['imagepath']; ?>" width="150" height="150" alt="image"></td>
            </tr>

                <td>Status:</td>

            <td>
                <input type="radio" name="status" value="pending" <?= ($blog['status'] === 'pending') ? 'checked' : '' ?>> pending<br>
                <input type="radio" name="status" value="approved" <?= ($blog['status'] === 'approved') ? 'checked' : '' ?>>approved<br></td>
        
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Update"></td>
            </tr>
        </table>
    </form>
    <a href="AdminDashboard.php">back to dashboard</a>

</div>
</body>
</html>

<?php

include '../Footer.php';

?>
