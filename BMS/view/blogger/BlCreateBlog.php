<?php

include "../header.php";
session_start();

require_once '../../controller/BlogController.php';
require_once '../../model/ModelController.php';
require_once '../../config/db.php';

$controller = new BlogController();
$controller->createBlog();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogger Create Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Create and Submit Blog Post</h1>

    <form name="myForm" action="" method="POST"  class="border p-4 bg-white rounded" enctype="multipart/form-data" onsubmit="return validateForm()">
        <table class="table">
            <tr>
                <td>Blogger ID:</td>
                <td><input type="text" name="blogger_id" value="<?= $_SESSION['id'] ?>" class="form-control" readonly></td>
            </tr>
            <tr>
                <td>Title:</td>
                <td><input type="text" name="title" class="form-control" id="title">
                <div id="titleError" class="error"></div>
                </td>
                 
            </tr>
            <tr>
                <td>Description:</td>
                <td><input type="text" name="description" class="form-control" id="description">
                <div id="descriptionError" class="error"></div>
                </td>
                
    
            </tr>
            <tr>
                <td> Created  On :</td>
                <td>
                    <input type="date" name="date" class="form-control" id="date" value ="<?php $today = date('Y-m-d'); 
                    echo $today;
                     ?>"readonly>
                     <div id="dateError" class="error"></div>
                </td>
            </tr>
            <tr>
                <td>Category:</td>
                <td>
                    <input type="text" name="category" class="form-control" id="category">
                    <div id="categoryError" class="error"></div>
                </td>
            </tr>
            <tr>
                <td>Keywords:</td>
                <td>
                    <input type="text" name="keyword" class="form-control" id="keyword">
                    <div id="keywordError" class="error"></div>
                </td>
            </tr>
            <tr>
                <td>Image:</td>
                <td>
                    <input type="file" name="image" class="form-control" id="image">
                     <div id="imageError" class="error"></div>
                </td>
            </tr>
            <tr>
                <td>Status:</td>
                <td><input type="text" name="status" value="pending" class="form-control" readonly></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Submit Blog" class="btn btn-primary">
                    <a href="bloggerdashboard.php" class="btn btn-secondary">Back to Dashboard</a>
                </td>
            </tr>
        </table>
    </form>
</div>

</body>

<script>
  function validateForm() {
    let valid = true;

    document.getElementById("titleError").innerHTML = "";
    document.getElementById("descriptionError").innerHTML = "";
    document.getElementById("dateError").innerHTML = "";
    document.getElementById("categoryError").innerHTML = "";
    document.getElementById("keywordError").innerHTML = "";
    document.getElementById("imageError").innerHTML = "";


    if (document.getElementById("title").value.trim() === "") {
      document.getElementById("titleError").innerHTML = "title is required";
      valid = false;
    }

    if (document.getElementById("description").value.trim() === "") {
      document.getElementById("descriptionError").innerHTML = "description is required";
      valid = false;
    }
    if (document.getElementById("date").value.trim() === "") {
      document.getElementById("dateError").innerHTML = "date is required";
      valid = false;
    }

    if (document.getElementById("category").value.trim() === "") {
      document.getElementById("categoryError").innerHTML = "category is required";
      valid = false;
    }
    if (document.getElementById("keyword").value.trim() === "") {
      document.getElementById("keywordError").innerHTML = "keyword is required";
      valid = false;
    }
   const keyword=document.getElementById('keyword').value.trim();
    if (keyword.length < 15) {
      document.getElementById("keywordError").innerHTML = "keyword must between 15 to 100 characters";
      valid = false;
    }
    if (document.getElementById("image").value.trim() === "") {
      document.getElementById("imageError").innerHTML = "image is required";
      valid = false;
    }

    return valid;
  }
</script>
</html>

<?php

include '../footer.php';

?>
