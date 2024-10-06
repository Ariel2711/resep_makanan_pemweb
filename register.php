<?php
include 'header.php';
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $sql->bind_param("ss", $username, $password);

    if ($sql->execute()) {
        echo "<script>alert('Pendaftaran berhasil!');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('Error: " . $sql->error . "');</script>";
    }
    
    $sql->close();
    $conn->close();
}
?>

<div class="register-container">
    <h2>Register</h2>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Register">
    </form>
</div>

<?php include 'footer.php'; ?>
