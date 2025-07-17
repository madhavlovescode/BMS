<nav>
    <a href="index.php?page=register">Register</a>
</nav>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color: #f2f2f2;">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action="index.php?page=login" method="POST">
                    <div class="form-group mb-3">
                        <label for="email">Email address</label>
                        <input type="text" class="form-control" name="username" id="email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<?php
require_once 'Footer.php';
?>
