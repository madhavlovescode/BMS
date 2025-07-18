<?php

session_start();
include '../Header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogger Dashboard</title>
</head>
<body>

    <h1>Blogger Dashboard</h1>

    <a href="BlCreateBlog.php">Create Blog</a><br>
    <a href="BlViewBlog.php">My Blog Status</a><br>
    <a href="../Logout.php" class="btn btn-sm btn-danger">Log-out</a></td>

</body>
</html>

<?php

include '../Footer.php';

?>
