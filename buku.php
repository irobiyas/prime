<h1 class="mt-4">Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
    <a href="?page=buku_tambah" class="btn btn-primary">+ tambah data</a>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0 " >
        <tr>
            <th>No</th>
            <th>Nama kategori</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
         <?php
         $i = 1;
           $query = mysqli_query($koneksi, "SELECT*FROM buku LEFT JOIN kategoribuku on buku.KategoriID = kategoribuku.KategoriID");
           while($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $data['NamaKategori']; ?></td>
                <td><?php echo $data['Judul']; ?></td>
                <td><?php echo $data['Penulis']; ?></td>
                <td><?php echo $data['Penerbit']; ?></td>
                <td><?php echo $data['TahunTerbit']; ?></td>
                <td><?php echo $data['Deskripsi']; ?></td>
                <td>
                    <a href="?page=buku_ubah&&id=<?php echo $data['BukuID']; ?>" class="btn btn-info">ubah</a>
                    <a onclick="return confirm('Apakah and yakin menghapus kategori ini?')"href="?page=buku_hapus&&id=<?php echo $data['BukuID']; ?>" class="btn btn-danger">hapus</a>
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