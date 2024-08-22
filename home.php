<?php
// untuk dashboard admin
if ($_SESSION['user']['level'] != 'peminjam') { ?>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard Admin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard Admin</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                                    <?php    
                                      echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM kategoribuku"));
                                    ?>
                                    Total kategori</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="index.php?page=kategori">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">
                                    <?php    
                                      echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM buku"));
                                    ?>
                                    Total buku</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="index.php?page=buku">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">
                                        <?php    
                                      echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM ulasanbuku"));
                                    ?>
                                    Total ulasan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="index.php?page=ulasan">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">
                                    <?php    
                                      echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM user"));
                                    ?>
                                    Total user</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="index.php?page=user">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                        
                        <?php
                            // konten untuk dashboard peminjam
                            if ($_SESSION['user']['level'] != 'admin') { 
                                ?>

                            <div class="container-fluid px-4">
                                <h1 class="mt-4">Perpustakaan Digital</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active">Perpustakaan Digital</li>
                                </ol>
                                <div class="row">
                                    <?php
                                    // Query untuk mendapatkan semua data buku
                                    $query = mysqli_query($koneksi, "SELECT * FROM buku");

                                    // Pastikan query berhasil
                                    if ($query) {
                                        while ($buku = mysqli_fetch_assoc($query)) {
                                            // Ambil data buku
                                            $gambar = $buku['gambar'];
                                            $judul = $buku['Judul'];
                                            $deskripsi = $buku['deskripsi'];
                                            // Path gambar
                                            $gambar_path = 'assets/img/' . htmlspecialchars($gambar);
                                    ?>
                                    <div class="col-md-4 mb-4">
                                        <div class="card">
                                            <a href=""><img src="<?php echo $gambar_path; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($judul); ?>"> </a>
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo htmlspecialchars($judul); ?></h5>
                                                <p class="card-text"><?php echo htmlspecialchars($deskripsi); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    } else {
                                        echo '<p>Data buku tidak tersedia.</p>';
                                    }
                                    ?>
                                </div>
                            </div>

                            <?php } ?>