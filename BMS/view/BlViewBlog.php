<?php
include "Header.php";
session_start();
require_once '../config/db.php';
require_once '../model/ModelController.php';
$id = $_SESSION['id'];
$model = new UserModel($conn);
$result = $model->getAllBlogid($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>View Blog</title>
</head>
<body class="bg-light">

<div class="container mt-4">
    <h1 class="mb-4">Blogger View Blogs</h1><a href="BloggerDashboard.php">Back to Dashboard</a>
    <form>
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Blog ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created On</th>
                    <th>Category</th>
                    <th>Keyword</th>
                    <th>images</th>
                    <th>Status</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $row['blog_id'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['description'] ?></td>
                        <td><?= $row['created_on'] ?></td>
                        <td><?= $row['category'] ?></td>
                        <td><?= $row['keyword'] ?></td>
                        <td><img src="../image/<?= $row['imagepath']; ?>" width="150" height="150" alt="Profile Image"></td>
                        <td><?= $row['status'] ?></td>
                        <td><a href="bleditblog.php?id=<?= $row['blog_id'] ?>" class="btn btn-sm btn-warning">Edit</a></td>
                        <td><a href="bldeleteblog.php?id=<?= $row['blog_id'] ?>" class="btn btn-sm btn-danger">Delete</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    </form>
    
</div>

</body>
</html>

<?php
include 'Footer.php';
?>
