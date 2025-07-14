<?php
session_start();
require_once '../controller/blogcontroller.php';
require_once '../model/modelcontroller.php';
require_once '../config/db.php';

$controller = new blogcontroller();
$controller->createblog();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CREATE BLOG</title>
</head>
<body>
<h1>CREATE AND SUBMIT BLOG-POST</h1>
<form action="" method="POST">
	<table>
	blogger_id<input type="text" name="blogger_id" value="<?php echo $_SESSION['id'];   ?>"><br>
	title :<input type="text" name="title"><br>
	description :<input type="text" name="description"><br>
	date :<input type="date" name="date"><br>
	category :<input type="text" name="category"><br>
	keyword :<input type="text" name="keywords"><br>
	status :<input type="text" name="status" value="pending"readonly><br>
	<input type="submit" name="submit">	<br>
	</table>

</form>
<a href="bloggerdashboard.php">back to dashboard</a>
</body>
</html>
<?php
include "footer.php";
?>