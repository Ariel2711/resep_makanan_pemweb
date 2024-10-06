<?php
include 'header.php';
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id_resep'])) {
    $id = $_GET['id_resep'];

    $sql = $conn->prepare("SELECT * FROM list_resep WHERE id_resep = ?");
    $sql->bind_param("i", $id);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "<p>Resep tidak ditemukan.</p>";
        exit();
    }
} else {
    echo "<p>ID resep tidak diberikan.</p>";
    exit();
}
?>

<div class="recipe-detail">
    <h2>Detail Resep: <?php echo htmlspecialchars($row["nama_resep"]); ?></h2>
    <img src="<?php echo htmlspecialchars($row["gambar"]); ?>" alt="<?php echo htmlspecialchars($row["nama_resep"]); ?>" class="recipe-image"/>
    
    <div class="recipe-description">
        <p><strong>Deskripsi:</strong> <?php echo htmlspecialchars($row["deskripsi"]); ?></p>
        <p><strong>Bahan-Bahan:</strong> <?php echo nl2br(htmlspecialchars($row["bahan_bahan"])); ?></p>
        <p><strong>Langkah-Langkah:</strong> <?php echo nl2br(htmlspecialchars($row["langkah_langkah"])); ?></p>
        <p><strong>Waktu Memasak:</strong> <?php echo htmlspecialchars($row["waktu_memasak"]); ?> menit</p>
        <p><strong>Tingkat Kesulitan:</strong> <?php echo htmlspecialchars($row["tingkat_kesulitan"]); ?></p>
        <p><strong>Kategori:</strong> <?php echo htmlspecialchars($row["kategori"]); ?></p>
        <p><strong>Porsi:</strong> <?php echo htmlspecialchars($row["porsi"]); ?></p>
        <p><strong>Kalori:</strong> <?php echo htmlspecialchars($row["kalori"]); ?> kalori</p>
        <p><strong>Rating:</strong> <?php echo htmlspecialchars($row["rating"]); ?>/5</p>
        <p><strong>Tanggal Dibuat:</strong> <?php echo htmlspecialchars($row["tanggal_dibuat"]); ?></p>
    </div>

    <a class="back-link" href="list_resep.php">Kembali ke Daftar Resep</a>
</div>

<?php
$sql->close();
$conn->close();
include 'footer.php';
?>
