<?php

require_once '../config/db.php';
require_once '../model/ModelController.php';

$model = new UserModel($conn);
$result = $model->ViewPageBlog();
?>

<html lang="en">
<head>
    <title>viewer page</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FAF1E6;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
        }
        .container {
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        footer {
          text-align: center;
          background-color: #333;
          color: white;
          position: relative;
          width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>BLOGSPOT</h1>
        <a href="../index.php">creator login here</a>
    </header>
    <form>
        <table border="1" cellpadding="5" cellspacing="0">
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <div class="container">
        <!-- Blog content goes here -->
        <h2><?= $row['title'] ?></h2> created on : <?= $row
        ['created_on'] ?> <p><?= $row['description'] ?></p> keywords : <?=
        $row['category'] ?> <p>
            <img src="../assets/image/<?= $row['imagepath']; ?>" width="150" height="150" alt="image">
         </p> </div> </tr>
        <?php endwhile; ?> </tbody> </table> </form>

 <footer>
      <p>&copy; All rights reserved.  | developed by MADHAV VYAS</p>
    </footer>
</body>
</html>
