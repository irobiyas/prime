<?php
$directory = "C:/xampp/htdocs/kadal/prime";

// Array untuk menampung folder dan file yang akan dipindahkan
$folders = [
    'assets' => ['404.php', 'style.css', 'script.js'], // contoh file terkait assets
    'includes' => ['koneksi.php', 'header.php', 'footer.php'], // contoh file untuk include atau require
    'views' => ['index.php', 'home.php', 'detail_buku.php'], // file tampilan
    'models' => ['buku.php', 'user.php', 'kategori.php', 'ulasan.php', 'peminjaman.php'], // file model untuk mengelola data
    'controllers' => ['login.php', 'logout.php', 'register.php', 'kategori_hapus.php', 'kategori_tambah.php', 'kategori_ubah.php', 'user_hapus.php', 'user_tambah.php', 'user_ubah.php'], // file kontrol untuk logika bisnis
];

// Buat folder jika belum ada, lalu pindahkan file
foreach ($folders as $folder => $files) {
    if (!is_dir($directory . '/' . $folder)) {
        mkdir($directory . '/' . $folder);
    }

    foreach ($files as $file) {
        $oldPath = $directory . '/' . $file;
        $newPath = $directory . '/' . $folder . '/' . $file;

        if (file_exists($oldPath)) {
            rename($oldPath, $newPath);
        }
    }
}
?>
