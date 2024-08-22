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
        <title>Register</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register</h3></div>
                                    <div class="card-body">
                                        <?php
                                            if(isset($_POST['register'])) {
                                                $username = $_POST['username'];
                                                $password = md5($_POST['password']);
                                                $nama_lengkap = $_POST['namalengkap'];
                                                $alamat = $_POST['alamat'];
                                                $email = $_POST['email'];
                                                $no_telepon = $_POST['no_telepon'];
                                                $level = $_POST['level'];

                                                $insert = mysqli_query($koneksi, "INSERT INTO user(username,password,namalengkap,alamat,email,no_telepon,level) VALUES('$username','$password','$nama_lengkap','$alamat','$email','$no_telepon','$level')");

                                                if($insert) {
                                                echo '<script>alert("Selamat, register berhasil. silahkan login"); location.href="login.php";</script>';
                                                }else{

                                                    echo '<script>alert("Register gagal, silahkan ulangi kembali.");</script>';
                                              }
                                            }
                                        ?>
                                        <form method="post">
                                            <div class="form-floating mb-2">
                                                <input class="form-control" type="username" required name="username" placeholder="username" />
                                                <label for="inputUsername">Username</label>
                                            </div>
                                            <div class="form-floating mb-2">
                                                <input class="form-control" type="password" required name="password" placeholder="password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-floating mb-2">
                                                <input class="form-control" type="text" required name="namalengkap" placeholder="Nama Lengkap" />
                                                <label for="inputName">Nama Lengkap</label>
                                            </div>
                                            <div class="form-floating mb-2">
                                                <textarea class="form-control" placeholder="alamat" name="alamat" id="floatingTextarea" style="height: 100px"></textarea>
                                                <label for="floatingTextarea">Alamat</label>
                                            </div>
                                            <div class="form-floating mb-2">
                                                <input class="form-control" type="text" required name="email" placeholder="Masukan email" />
                                                <label for="inputEmail">Email</label>
                                            </div>
                                            <div class="form-floating mb-2">
                                                <input class="form-control" type="text" required name="no_telepon" placeholder="Masukan no telepon" />
                                                <label for="inputTelepon">No Telepon</label>
                                            </div>
                                            <div class="form-floating mb-2">
                                            <select class="form-select" id="floatingSelectGrid" name="level">
                                                <option selected>---</option>
                                                <option value="admin">Admin</option>
                                                <option value="peminjam">Peminjam</option>
                                            </select>
                                            <label for="floatingSelectGrid">Role</label>
                                            </div>
                                            <div class="d-grid gap-2 mx-auto">
                                                <button class="btn btn-primary" type="submit" name="register" value="register">Register</button>
                                                <a class="btn btn-secondary" href="login.php">Login</a>
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