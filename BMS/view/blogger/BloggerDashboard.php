<?php

session_start();

echo 'Hello, ';
echo $_SESSION['id'] ?? 'Guest';

include '../Header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogger Dashboard</title>
</head>
<body>

    <h1>Blogger Dashboard</h1>

    <a href="BlCreateBlog.php">Create Blog</a><br>
    <a href="BlViewBlog.php">My Blog Status</a><br>
    <a href="../Logout.php">Log Out</a><br>

</body>
</html>

<?php

include '../Footer.php';

?>
