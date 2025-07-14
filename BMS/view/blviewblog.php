<?php
session_start();
require_once '../config/db.php';
require_once '../model/modelcontroller.php';
$model = new UserModel($conn);
$result = $model->getallblog();	
?>
<html>
<head>
	<title>view blog</title>
</head>
<body>
<h1>blogger view blogs</h1>
<form>
            <table >
                <thead>
                    <tr>
                    	<th>Blog id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>created on</th>
                        <th>category</th>
                        <th>status</th>
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
                            <td><?= $row['status'] ?></td>
                            <td><a href="bleditblog.php?id=<?= $row['blog_id'] ?>">Edit</a></td>
                           <td><a href="bldeleteblog.php?id=<?= $row['blog_id'] ?>">Delete</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </form>
        <a href="bloggerdashboard.php">Back to Dashboard</a>
</body>
</html>
<?php
include "footer.php";
?>