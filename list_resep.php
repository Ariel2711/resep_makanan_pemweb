<?php
include 'header.php';
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM list_resep";
$result = $conn->query($sql);
?>

<div class="recipe-container">
    <h2>Daftar Resep</h2>
    <div class="recipe-grid">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='recipe-card'>";
                echo "<a href='detail_resep.php?id_resep=" . $row["id_resep"] . "'>";
                echo "<img src='" . htmlspecialchars($row["gambar"]) . "' alt='" . htmlspecialchars($row["nama_resep"]) . "' class='recipe-image'>";
                echo "<h3>" . htmlspecialchars($row["nama_resep"]) . "</h3>";
                echo "</a>";
                echo "</div>";
            }
        } else {
            echo "<p>Tidak ada resep.</p>";
        }
        ?>
    </div>
</div>

<?php
$conn->close();
include 'footer.php';
?>
