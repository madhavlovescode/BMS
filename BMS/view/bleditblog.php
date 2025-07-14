<?php
session_start();
require_once "../controller/blogcontroller.php";
require_once "../config/db.php";

?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<h1>blogger edit blog</h1>
<form action="" method="POST">

	<table>
 blog_id:<input type="text" name="blog_id" value ="<?php echo $row['blog_id'];   ?>"readonly>
 blogger_id:<input type="text" name="blogger_id" value ="<?php echo $row['blog_id'];   ?>"readonly>
 title :<input type="text" name="title" value ="<?php echo $row['title'];   ?>" readonly>
 description:<input type="text" name="description" value ="<?php echo $row['description'];   ?>" readonly>
 created on :<input type="text" name="created_on" value ="<?php echo $row['created_on'];   ?>"readonly>
 status :<input type="text" name="status" value ="<?php echo $row['status'];   ?>"readonly>
 <input type="submit" name="submit">
    </table>
</form>
</body>
</html>
<?php
include "footer.php";
?>