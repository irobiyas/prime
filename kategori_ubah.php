<h1 class="mt-4">Ubah kategori buku</h1>
<div class="card">
    <div class="card-body">
       <div class="row">
           <div class="col-md-12">
               <form method="post">
                   <?php
                      $id = $_GET['id'];
                      if(isset($_POST['submit'])) {
                      $kategori = $_POST['kategori'];
                      $query = mysqli_query($koneksi, "UPDATE kategoribuku set NamaKategori='$kategori' WHERE KategoriID=$id");

                      if($query) {
                       echo '<script>alert("Ubah Kategori berhasil.");</script>';
                     }else{
                       echo '<script>alert("Ubah Kategori gagal.");</script>';
                   }
                 }        
                       $query = mysqli_query($koneksi, "SELECT*FROM kategoribuku where KategoriID=$id");
                       $data = mysqli_fetch_array($query);
       
        ?>
        <div class="row mb-3">
           <div class="col-md-2">Nama kategori</div>
            <div class="col-md-8"><input type="text" value="<?php echo $data['NamaKategori']; ?>"class="form-control" name="kategori"></div>
        </div>
        <div class="row">
              <div class="col-md-2"></div>
                  <div class="col-md-8">
                     <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                     <button type="reset" class="btn btn-secondary">Reset</button>
                   <a href="?page=kategori" class="btn btn-danger">Kembali</a>
                 </div>
              </div>
           </form>  
         </div>
       </div>
    </div>
</div>