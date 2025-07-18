<?php
include "../header.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogger Create Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="mb-4">Create and Submit Blog Post</h1>

    <form id="myForm" method="POST" class="border p-4 bg-white rounded" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td>Blogger ID:</td>
                <td><input type="text" name="blogger_id" value="<?= $_SESSION['id'] ?>" class="form-control" readonly></td>
            </tr>
            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" class="form-control" id="title">
                    <div id="titleError" class="error text-danger"></div>
                </td>
            </tr>
            <tr>
                <td>Description:</td>
                <td>
                    <textarea id="description" name="description" rows="4" cols="50" class="form-control"></textarea>
                    <div id="descriptionError" class="error text-danger"></div>
                </td>
            </tr>
            <tr>
                <td>Created On:</td>
                <td>
                    <input type="date" name="date" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>Category:</td>
                <td>
                    <input type="text" name="category" class="form-control" id="category">
                    <div id="categoryError" class="error text-danger"></div>
                </td>
            </tr>
            <tr>
                <td>Keywords:</td>
                <td>
                    <input type="text" name="keyword" class="form-control" id="keyword">
                    <div id="keywordError" class="error text-danger"></div>
                </td>
            </tr>
            <tr>
                <td>Image:</td>
                <td>
                    <input type="file" name="image" class="form-control" id="image">
                    <div id="imageError" class="error text-danger"></div>
                </td>
            </tr>
            <input type="hidden" name="status" value="pending">
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Submit Blog" class="btn btn-primary">
                    <a href="bloggerdashboard.php" class="btn btn-secondary">Back to Dashboard</a>
                </td>
            </tr>
        </table>
    </form>
    <div id="msg" class="mt-3"></div>
    <div id="msg" class="mt-3"></div>
</div>
</body>

<script>
function validateForm() {
    let valid = true;
    $("#titleError, #descriptionError, #categoryError, #keywordError, #imageError").html("");

    if ($("#title").val().trim() === "") {
        $("#titleError").html("Title is required");
        valid = false;
    }
    let desc = $("#description").val().trim();
    if (desc === "") {
        $("#descriptionError").html("Description is required");
        valid = false;
    } else if (desc.length < 15) {
        $("#descriptionError").html("Description should be more than 15 characters");
        valid = false;
    }

    if ($("#category").val().trim() === "") {
        $("#categoryError").html("Category is required");
        valid = false;
    }

    let keyword = $("#keyword").val().trim();
    if (keyword === "") {
        $("#keywordError").html("Keyword is required");
        valid = false;
    } else if (keyword.length < 15) {
        $("#keywordError").html("Keyword must be between 15 to 100 characters");
        valid = false;
    }

    if ($("#image").val() === "") {
        $("#imageError").html("Image is required");
        valid = false;
    }

    return valid;
}

$(document).ready(function () {
    $('#myForm').on('submit', function (e) {
        e.preventDefault();

        if (!validateForm()) return;

        let formData = new FormData(this);

        $.ajax({
            url: '../../controller/BlogController.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                try {
                    let res = JSON.parse(response);
                    if (res.status === 'success') {
                        $('#myForm').hide();
                        $('#msg').html("<span class='text-success'>Blog saved successfully. <a href='BloggerDashboard.php'>Back to Dashboard </a></span>");
                        
                    } else {
                        $('#msg').html("<span class='text-danger'>Failed to save blog.</span>");
                    }
                } catch {
                    $('#msg').html("<span class='text-danger'>Invalid response from server.</span>");
                }
            },
            error: function () {
                $('#msg').html("<span class='text-danger'>AJAX error occurred.</span>");
            }
        });
    });
});
</script>

</html>

<?php include '../footer.php'; ?>
