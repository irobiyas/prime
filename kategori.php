<h1 class="m-4">Kategori Buku</h1>
<div class="card m-3">
    <div class="card-body p-5">
         <div class="row">
             <div class="col-md-12">
                 <a href="?page=kategori_tambah" class="btn btn-primary">Tambah Kategori</a>
                     <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0 " >
                         <tr>
                             <th>No</th>
                             <th>Nama Kategori</th>
                             <th>Aksi</th>
                         </tr>
                             <?php
                                 $i = 1;
                                  $query = mysqli_query($koneksi, "SELECT*FROM kategoribuku");
                                     while($data = mysqli_fetch_array($query)) {
                             ?>
                                      <tr>
                                         <td><?php echo $i++; ?></td>
                                          <td><?php echo $data['NamaKategori']; ?></td>
                                           <td>
                                              <a href="?page=kategori_ubah&&id=<?php echo $data['KategoriID']; ?>" class="btn btn-info">Ubah</a>
                                                <a onclick="return confirm('Apakah and yakin menghapus kategori ini?')"href="?page=kategori_hapus&&id=<?php echo $data['KategoriID']; ?>" class="btn btn-danger">Hapus</a>
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