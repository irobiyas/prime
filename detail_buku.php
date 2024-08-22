<?php
// Query untuk mendapatkan detail buku
$query = mysqli_query($koneksi, "SELECT * FROM buku ");

// Pastikan query berhasil
if ($query && mysqli_num_rows($query) > 0) {
    $buku = mysqli_fetch_assoc($query);
    $gambar = $buku['gambar'];
    $judul = $buku['Judul'];
    $deskripsi = $buku['deskripsi'];
    $penulis = $buku['Penulis'];
    $tahun = $buku['TahunTerbit'];
    $gambar_path = 'assets/img/' . htmlspecialchars($gambar);
} else {
    echo '<p>Buku tidak ditemukan.</p>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($judul); ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo $gambar_path; ?>" alt="<?php echo htmlspecialchars($judul); ?>" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h1><?php echo htmlspecialchars($judul); ?></h1>
                <p><strong>Penulis:</strong> <?php echo htmlspecialchars($penulis); ?></p>
                <p><strong>Tahun Terbit:</strong> <?php echo htmlspecialchars($tahun); ?></p>
                <p><?php echo htmlspecialchars($deskripsi); ?></p>
            </div>
        </div>
        <a href="index.php?" class="btn btn-primary">Kembali ke Daftar Buku</a>
    </div>
</body>
</html>
