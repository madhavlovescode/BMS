<?php
session_start();
echo "hello";
echo $_SESSION['id'];
include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>blogger dashboard</title>
</head>
<body>
<h1>BLOGGER DASHBOARD</h1>

<a href="blcreateblog.php">CREATE BLOG</a><br>
<a href="blviewblog.php">MY BLOG STATUS</a><br>
<a href="../controller/logout.php">LOG-OUT</a><br>
</body>
</html>
<?php
include "footer.php";
?>