<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE PeminjamanID=$id");
?>
<script>
    alert('Hapus ulasan berhasil');
    location.href = "index.php?page=peminjaman"
</script>