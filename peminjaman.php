<h1 class="m-4">Peminjaman</h1>
<div class="card m-3">
    <div class="card-body p-5">
         <div class="row">
             <div class="col-md-12">
                 <a href="?page=peminjaman_tambah" class="btn btn-primary">Pinjaman</a> 
                     <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0" >
                         <tr>
                         <th>No</th>
                             <th>User</th>
                             <th>Buku</th>
                             <th>Tanggal Peminjaman</th>
                             <th>Tanggal Pengembalian</th>
                             <th>Status Peminjaman</th>
                             <th>Aksi</th>
                            
                             <?php
                                 $i = 1;
                                 $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.UserID = peminjaman.UserID LEFT JOIN buku on buku.BukuID = peminjaman.BukuID");
                                     while($data = mysqli_fetch_array($query)) {
                             ?>
                                      <tr>
                                      <td><?php echo $i++; ?></td>
                                          <td><?php echo $data['Username']; ?></td>
                                          <td><?php echo $data['Judul']; ?></td>
                                          <td><?php echo $data['TanggalPeminjaman']; ?></td>
                                          <td><?php echo $data['TanggalPengembalian']; ?></td>
                                          <td><?php echo $data['StatusPeminjaman']; ?></td>
                                           <td>
                                            <?php
                                        if($data['StatusPeminjaman'] != 'dikembalikan') {
                                            ?>
                                              <a href="?page=peminjaman_ubah&&id=<?php echo $data['PeminjamanID']; ?>" class="btn btn-info">ubah</a>
                                                <a onclick="return confirm('Apakah and yakin menghapus Ulasan ini?')"href="?page=peminjaman_hapus&&id=<?php echo $data['PeminjamanID']; ?>" class="btn btn-danger">hapus</a>
                                           <?php
                                        }
                                           ?>
                                            </td>
                                    </tr>
                             <?php
                                     }
                             ?>
                    </table>
                 </div>
            </div>
      </div>
</div>