<h1 class="m-4">Peminjaman Buku</h1>
<div class="card m-3">
    <div class="card-body p-5">
    <div class="row">
    <div class="col-md-12">
      <form method="post">
        <?php
             if(isset($_POST['submit'])) {
                $UserID = $_SESSION ['user']['UserID'];
                $BukuID = $_POST['BukuID'];
                $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
                $status_peminjaman = $_POST['status_peminjaman'];
                $query = mysqli_query($koneksi, "INSERT INTO `peminjaman` (`PeminjamanID`, `UserID`, `BukuID`, `TanggalPeminjaman`, `TanggalPengembalian`, `StatusPeminjaman`) VALUES (NULL, '$UserID', '$BukuID', '$tanggal_peminjaman', '$tanggal_pengembalian', '$status_peminjaman')");

                if($query) {
                    echo '<script>alert("Tambah data berhasil.");</script>';
                }else{
                    echo '<script>alert("Tambah data gagal.");</script>';
                }
             }        
        
        
        ?>
        <div class="row mb-3">
           <div class="col-md-2">Buku</div>
           <div class="col-md-8">
                 <select name="BukuID" class="form-control">
                    <?php
                        $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                        while($buku = mysqli_fetch_array($buk)){
                    ?>
                    <option value="<?php echo $buku['BukuID']; ?>"><?php echo $buku['Judul']; ?></option>
                    <?php
                 }
                ?>
                 </select>
           </div>
        </div>
        <div class="row mb-3">
           <div class="col-md-2">Tanggal Peminjaman</div>
           <div class="col-md-8">
                <input type="date" class="form-control" name="tanggal_peminjaman">
           </div>
        </div>
        <div class="row mb-3">
           <div class="col-md-2">Tanggal Pengembalian</div>
           <div class="col-md-8">
                <input type="date" class="form-control" name="tanggal_pengembalian">
           </div>
        </div>
        <div class="row mb-3">
           <div class="col-md-2">Status Pengembalian</div>
           <div class="col-md-8">
            <select name="status_peminjaman" class="form-control">
                <option value="dipinjam">Dipinjam</option>
                <option value="dikembalikan">Dikembalikan</option>
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