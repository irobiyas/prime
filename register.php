<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register ke perpustakaan</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register Perpustakaan Digital</h3></div>
                                    <div class="card-body">
                                        <?php
                                            if(isset($_POST['register'])) {
                                                $username = $_POST['username'];
                                                $password = md5($_POST['password']);
                                                $nama_lengkap = $_POST['namalengkap'];
                                                $alamat = $_POST['alamat'];
                                                $email = $_POST['email'];
                                                $level = $_POST['level'];

                                                $insert = mysqli_query($koneksi, "INSERT INTO user(username,password,namalengkap,alamat,email,level) VALUES('$username','$password','$nama_lengkap','$alamat','$email','$level')");

                                                if($insert) {
                                                echo '<script>alert("Selamat, register berhasil. silahkan login"); location.href="login.php";</script>';
                                                }else{

                                                    echo '<script>alert("Register gagal, silahkan ulangi kembali.");</script>';
                                              }
                                            }
                                        ?>
                                        <form method="post">
                                            <div class="form-group">
                                            <label>Username</label>
                                                <input class="form-control" type="username" required name="username" placeholder="Masukan username" />
                                            </div>
                                            <div class="form-group">
                                            <label>Password</label>
                                                <input class="form-control"  required type="password" name="password" placeholder="Masukan password" />
                                            </div>
                                            <div class="form-group">
                                            <label>Nama lengkap</label>
                                                <input class="form-control" type="text" required name="nama" placeholder="Masukan nama lengkap" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1">Alamat</label>
                                                <textarea name="alamat" rows="5" required class="form-control py-4"></textarea>
                                            </div>
                                            <div class="form-group">
                                            <label>Email</label>
                                                <input class="form-control" type="text" required name="email" placeholder="Masukan email" />
                                            </div>
                                            <div class="form-group">
                                            <label>No Telepon</label>
                                                <input class="form-control" type="text" required name="no_telepon" placeholder="Masukan no telepon" />
                                            </div>
                                            <div class="form-group">
                                            <label class="small mb-1">Level</label>
                                                <select name="level" required class="form-select py-2">
                                                    <option value="admin">admin</option>
                                                    <option value="peminjam">peminjam</option>
                                                </select>
                                            </div>
                                            <div class="form-grup d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit" name="register" valeu="register">Register</button>
                                                <a class="btn btn-danger" href="login.php">Login</a>
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>w
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>