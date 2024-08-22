<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
      <form method="post">
        <?php
        $id = $_GET['id'];
             if(isset($_POST['submit'])) {
                $UserID = $_SESSION ['user']['UserID'];
                $BukuID = $_POST['BukuID'];
                $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
                $status_peminjaman = $_POST['status_peminjaman'];
                $query = mysqli_query($koneksi, "UPDATE `peminjaman` SET `TanggalPengembalian` = '$tanggal_pengembalian', `StatusPeminjaman` = '$status_peminjaman' WHERE `peminjaman`.`PeminjamanID` =$id");

                if($query) {
                    echo '<script>alert("Tambah data berhasil.");</script>';
                }else{
                    echo '<script>alert("Tambah data gagal.");</script>';
                }
             }        
        
        $query = mysqli_query($koneksi, "SELECT*FROM peminjaman where PeminjamanID=$id");
        $data = mysqli_fetch_array($query);
        ?>
        <div class="row mb-3">
           <div class="col-md-2">Buku</div>
           <div class="col-md-8">
                 <select name="BukuID" class="form-control">
                    <?php
                        $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                        while($buku = mysqli_fetch_array($buk)){
                    ?>
                    <option <?php if($buku['BukuID'] == $data['BukuID']) echo 'selected'; ?>value="<?php echo $buku['BukuID']; ?>"><?php echo $buku['Judul']; ?></option>
                    <?php
                 }
                ?>  
                 </select>
           </div>
        </div>
        <div class="row mb-3">
           <div class="col-md-2">Tanggal Peminjaman</div>
           <div class="col-md-8">
                <input type="date" class="form-control" value="<?php echo $data['TanggalPeminjaman']; ?>" name="tanggal_peminjaman">
           </div>
        </div>
        <div class="row mb-3">
           <div class="col-md-2">Tanggal Pengembalian</div>
           <div class="col-md-8">
                <input type="date" class="form-control" value="<?php echo $data['TanggalPengembalian']; ?>" name="tanggal_pengembalian">
           </div>
        </div>
        <div class="row mb-3">
           <div class="col-md-2">Status Pengembalian</div>
           <div class="col-md-8">
            <select name="status_peminjaman" class="form-control">
                <option value="dipinjam" <?php if($data['StatusPeminjaman'] == 'dipinjam') echo 'selected'; ?>>Dipinjam</option>
                <option value="dikembalikan" <?php if($data['StatusPeminjaman'] == 'dikembalikan') echo 'selected'; ?>>Dikembalikan</option>
            </select>
           </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-8">
                   <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
              </div>
           </div>
          </form>  
        </div>
      </div>
    </div>
</div>