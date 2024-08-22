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
<div class="container-fluid px-4">
                                <h1 class="mt-4">Perpustakaan Digital</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">Perpustakaan Digital</li>
                                </ol>
                                <div class="row">
                                    <?php
                                    // Query untuk mendapatkan semua data buku
                                    $query = mysqli_query($koneksi, "SELECT * FROM buku");

                                    // Pastikan query berhasil
                                    if ($query) {
                                        while ($buku = mysqli_fetch_assoc($query)) {
                                            // Ambil data buku
                                            $gambar = $buku['gambar'];
                                            $judul = $buku['Judul'];
                                            $deskripsi = $buku['deskripsi'];
                                            // Path gambar
                                            $gambar_path = 'assets/img/' . htmlspecialchars($gambar);
                                    ?>
                                    <div class="col-md-3 mb-3">
                                        <div class="card">
                                            <a href="?page=detail_buku"><img src="<?php echo $gambar_path; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($judul); ?>"> </a>
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo htmlspecialchars($judul); ?></h5>
                                                <p class="card-text"><?php echo htmlspecialchars($deskripsi); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    } else {
                                        echo '<p>Data buku tidak tersedia.</p>';
                                    }
                                    ?>
                                </div>
                            </div>
</body>
</html>
