<?php
// Cek apakah user yang login adalah admin
if ($_SESSION['user']['level'] != 'admin') {
    echo "Akses ditolak! Hanya admin yang dapat mengubah data pengguna.";
    exit();
}

// Ambil ID user dari parameter URL
$user_id = $_GET['id'];

// Ambil data user dari database berdasarkan UserID
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE UserID = '$user_id'");
$data = mysqli_fetch_array($query);

// Jika form telah disubmit
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $no_telepon = $_POST['no_telepon'];
    $level = $_POST['level'];

    // Update data user
    $query_update = "UPDATE user SET 
                        Username = '$username',
                        Password = '$password',
                        Email = '$email',
                        NamaLengkap = '$nama_lengkap',
                        no_telepon = '$no_telepon',
                        level = '$level'
                    WHERE UserID = '$user_id'";

    if (mysqli_query($koneksi, $query_update)) {
        echo "<script>alert('Data pengguna berhasil diubah!'); location.href='index.php?page=user';</script>";
    } else {
        echo "<script>alert('Gagal mengubah data pengguna!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Ubah Data Pengguna</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $data['Username']; ?>" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $data['Password']; ?>" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $data['Email']; ?>" required>
            </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $data['NamaLengkap']; ?>" required>
            </div>
            <div class="form-group">
                <label>No. Telepon</label>
                <input type="text" name="no_telepon" class="form-control" value="<?php echo $data['no_telepon']; ?>" required>
            </div>
            <div class="form-group">
                <label for="disabledSelect">Level</label>
                <select name="level_disabled" class="form-control" disabled>
                    <option value="admin" <?php echo ($data['level'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="peminjam" <?php echo ($data['level'] == 'peminjam') ? 'selected' : ''; ?>>Peminjam</option>
                </select>
                <!-- Hidden input to send the actual level value -->
                <input type="hidden" name="level" value="<?php echo $data['level']; ?>">
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="index.php?page=user" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
