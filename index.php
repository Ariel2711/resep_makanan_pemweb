<?php
include 'header.php';
include 'db.php';

if (isset($_SESSION['username'])) {
    echo "<div class='welcome'>";
    echo "<h2>Selamat datang, " . htmlspecialchars($_SESSION['username']) . "!</h2>";
    echo '<a class="recipe-link" href="list_resep.php">Lihat Daftar Resep</a>';
    echo "</div>";
} else {
    header("Location: login.php");
    exit;
}
?>

<?php include 'footer.php'; ?>
