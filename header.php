<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Resep Makanan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="nav">
        <a href="index.php">Home</a>
        <a href="list_resep.php">List Resep</a>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<a href="logout.php">Logout</a>';
        } else {
            echo '<a href="login.php">Login</a>';
            echo '<a href="register.php">Register</a>';
        }
        ?>
    </div>
</body>
</html>
