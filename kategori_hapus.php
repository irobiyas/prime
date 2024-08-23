<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM kategoribuku WHERE KategoriID=$id");
?>
<script>
    alert('Hapus Kategori berhasil');
    location.href = "index.php?page=kategori"
</script>