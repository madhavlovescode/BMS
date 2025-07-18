<?php

include "../Header.php";
session_start();

require_once '../../config/db.php';
require_once '../../model/ModelController.php';

$model = new UserModel($conn);
$result = $model->getAllBlog();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin View Blogs</title>
</head>
<body class="bg-light">

<div class="container mt-4">
    <h1>VIEW AND APPROVE BLOGS</h1>    <a href="AdminDashboard.php">Back to Dashboard</a>

    <form >
        <table border="1" cellpadding="5" cellspacing="0" class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Blog ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created On</th>
                    <th>Category</th>
                    <th>keyword</th>
                    <th>image</th>
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
                        <td><img src="../../assets/image/<?= $row['imagepath']; ?>" width="150" height="150" alt="image"></td>
                        <td><?= $row['status'] ?></td>
                        <td><a href="AdmEditBlog.php?id=<?= $row['blog_id'] ?> " class="btn btn-sm btn-warning">Edit</a></td>
                        <td><a href="AdmDeleteBlog.php?id=<?= $row['blog_id'] ?>"class="btn btn-sm btn-danger">Delete</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </form>

    <br>
</div>
 
</body>
</html>

<?php

include '../Footer.php';

?>
