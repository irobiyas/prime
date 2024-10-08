<?php
// Aktifkan error reporting untuk melihat kesalahan
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "ujikom");

// Cek apakah koneksi berhasil
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Cek apakah ID buku diberikan melalui URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_buku = intval($_GET['id']);
    
    // Query untuk mendapatkan detail buku berdasarkan ID
    $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE BukuID = $id_buku");

    // Cek apakah query berhasil
    if (!$query) {
        die("Query gagal: " . mysqli_error($koneksi));
    }

    // Cek apakah buku ditemukan
    if (mysqli_num_rows($query) > 0) {
        $buku = mysqli_fetch_assoc($query);
        $gambar = $buku['gambar'];
        $judul = $buku['Judul'];
        $deskripsi = $buku['deskripsi'];
        $penulis = $buku['Penulis'];
        $tahun = $buku['TahunTerbit'];
        $gambar_path = 'assets/img/' . htmlspecialchars($gambar);
    } else {
        die("Buku tidak ditemukan.");
    }
} else {
    die("ID buku tidak valid atau tidak diberikan.");
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
        <h2 class="mt-4">Detail Buku</h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><?php echo htmlspecialchars($judul); ?></li>
        </ol>
        <div class="row">
            <div class="container">
                <div class="card mb-3">
                    <div class="row p-5">
                        <div class="col-md-4">
                            <img src="<?php echo $gambar_path; ?>" alt="<?php echo htmlspecialchars($judul); ?>" class="img-fluid rounded-start" style="max-width: 250px; width: 100%; height: auto;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p><strong>Penulis:</strong> <?php echo htmlspecialchars($penulis); ?></p>
                                <p><strong>Tahun Terbit:</strong> <?php echo htmlspecialchars($tahun); ?></p>
                                <p><?php echo htmlspecialchars($deskripsi); ?></p>
                            </div> 
                        </div>
                    </div>
                </div>
                <a href="index.php" class="btn btn-primary">Kembali ke Daftar Buku</a>
            </div>
        </div>
    </div>
</body>
</html>
