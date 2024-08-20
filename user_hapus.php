<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM user WHERE UserID=$id");
?>
<script>
    alert('User berhasil di hapus');
    location.href = "index.php?page=user"
</script>