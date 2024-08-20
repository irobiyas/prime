<h1 class="m-4">Laporan Peminjaman Buku</h1>
<div class="card m-3">
    <div class="card-body p-5">
         <div class="row">
             <div class="col-md-12">
                 <a href="cetak.php" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Cetak Data</a> 
                     <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0" >
                         <tr>
                             <th>No</th>
                             <th>User</th>
                             <th>Buku</th>
                             <th>Tanggal Peminjaman</th>
                             <th>Tanggal Pengembalian</th>
                             <th>Status Peminjaman</th>
                         </tr>
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
                                          <?php
                               if($_SESSION['user']['level'] !='peminjam'){
                            ?>
                                            
                                           <?php
                               }
                               ?>
                                           <?php
                               }
                               ?>
                                    </tr>
                            
                    </table>
                 </div>
            </div>
      </div>
</div>