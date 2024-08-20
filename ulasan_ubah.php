<h1 class="m-4">Ulasan Buku</h1>
<div class="card m-3">
    <div class="card-body p-5">
    <div class="row">
    <div class="col-md-12">
      <form method="post">
        <?php
             $id = $_GET['id'];
             if(isset($_POST['submit'])) {
                $BukuID = $_POST['BukuID'];
                $UserID = $_SESSION ['user']['UserID'];
                $ulasan = $_POST['ulasan'];
                $rating = $_POST['rating'];
                $query = mysqli_query($koneksi, "UPDATE `ulasanbuku` SET `Ulasan` = '$ulasan', `Rating` = '$rating' WHERE `ulasanbuku`.`UlasanID`=$id");

                if($query) {
                    echo '<script>alert("Ubah data berhasil.");</script>';
                }else{
                    echo '<script>alert("Ubah data gagal.");</script>';
                }
             }        
              $query = mysqli_query($koneksi, "SELECT*FROM ulasanbuku WHERE UlasanID=$id");
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
                    <option <?php if($data['BukuID'] == $buku['BukuID']) echo 'selected'; ?>value="<?php echo $buku['BukuID']; ?>"><?php echo $buku['Judul']; ?></option>
                    <?php
                 }
                ?>
                 </select>
           </div>
        </div>
        <div class="row mb-3">
           <div class="col-md-2">Rating</div>
           <div class="col-md-8">
                <select name="rating" class="form-control">
                    <?php
                        for($i = 1; $i<=10; $i++){
                            ?>
                            <option <?php if($data['Rating'] == $i) echo 'selected'; ?> ><?php echo $i; ?></option>
                            <?php
                        }
                    ?>
                </select>
           </div>
        </div>
        <div class="row mb-3">
           <div class="col-md-2">Ulasan</div>
           <div class="col-md-8">
                <textarea name="ulasan" rows="5" class="form-control"><?php echo $data['Ulasan']?></textarea>
           </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-8">
                   <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="?page=ulasan" class="btn btn-danger">Kembali</a>
              </div>
           </div>
          </form>  
        </div>
      </div>
    </div>
</div>