<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: white;
            padding: 1rem 0;
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        footer {
          text-align: center;
          padding: 10px;
          background-color: #333;
          color: white;
          position: relative;
          bottom: 0;
          width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>My Awesome Blog</h1>
    </header>

    <div class="container">
        <!-- Blog content goes here -->
        <h2><?php
echo $row['title'];
        ?></h2>
        <p>This is a sample blog post.  You can add your content here.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>

    <footer>
      <p>&copy; 2024 My Blog. All rights reserved.</p>
    </footer>
</body>
</html>