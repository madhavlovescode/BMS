<?php
include"header.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
</head>
<body style="background-color:#9ECAD6;">
<center>
<h1>LOGIN PAGE</h1>
<form action="" method="POST">
username <input type="text" name="username"><br>
password<input type="text" name="password"><br>
<input type="submit" name="submit">
</form>
<a href="register.php">login for new user </a>
</center>
</body>
</html>
<?php
include "footer.php";
?>