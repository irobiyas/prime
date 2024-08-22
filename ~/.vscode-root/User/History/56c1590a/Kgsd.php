if (isset($_POST['submit'])) {
    // Ambil data form
    $KategoriID = $_POST['KategoriID'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['Penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $deskripsi = $_POST['deskripsi'];

    // Proses upload gambar
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $upload_dir = __DIR__ . '/assets/img/';
    $gambar_path = $upload_dir . basename($gambar);

    // Pastikan folder assets/img ada
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0775, true);
    }

    // Pindahkan file gambar ke folder tujuan
    if (move_uploaded_file($gambar_tmp, $gambar_path)) {
        // Resize gambar
        resizeImage($gambar_path, $gambar_path, 250, 250); // Atur lebar dan tinggi sesuai kebutuhan
        
        echo '<p>Upload dan resize berhasil!</p>';
    } else {
        $error = error_get_last();
        echo '<p>Upload gagal! Error: ' . $error['message'] . '</p>';
    }

    // Masukkan data ke database
    $query = mysqli_query($koneksi, "INSERT INTO buku(KategoriID, Judul, Penulis, Penerbit, TahunTerbit, Deskripsi, gambar) VALUES('$KategoriID', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$deskripsi', '$gambar')");

    if ($query) {
        echo '<script>alert("Tambah data berhasil.");</script>';
    } else {
        echo '<script>alert("Tambah data gagal.");</script>';
    }
}
