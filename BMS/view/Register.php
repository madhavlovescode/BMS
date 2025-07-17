<?php

?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Register</title>
  </head>

  <body>
    <form action="" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">name</label>
        <input type="text" class="form-control" name="name" aria-describedby="emailHelp">

      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">username</label>
        <input type="email" class="form-control" name="email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password">
      </div>

      <input type="submit" class="btn btn-primary" name="submit" value="Register">

      <a href='Index.php?page=login'>back to login</a>
    </form>
  </body>
</html>

<?php

include 'Footer.php';

?>
