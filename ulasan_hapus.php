<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM ulasanbuku WHERE UlasanID=$id");
?>
<script>
    alert('Hapus ulasan berhasil');
    location.href = "index.php?page=ulasan"
</script>