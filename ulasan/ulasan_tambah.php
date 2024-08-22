<h1 class="m-4">Ulasan Buku</h1>
<div class="card m-3">
    <div class="card-body p-5">
    <div class="row">
    <div class="col-md-12">
      <form method="post">
        <?php
             if(isset($_POST['submit'])) {
                $UserID = $_SESSION ['user']['UserID'];
                $BukuID = $_POST['BukuID'];
                $ulasan = $_POST['ulasan'];
                $rating = $_POST['rating'];
                $query = mysqli_query($koneksi, "INSERT INTO `ulasanbuku` (`UserID`, `BukuID`, `Ulasan`, `Rating`) VALUES ('$UserID', '$BukuID', '$ulasan', '$rating')");

                if($query) {
                    echo '<script>alert("Tambah data berhasil."); location.href="index.php?page=ulasan"</script>';
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
           <div class="col-md-2">Rating</div>
           <div class="col-md-8">
                <select name="rating" class="form-control">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                </select>
           </div>
        </div>
        <div class="row mb-3">
           <div class="col-md-2">Ulasan</div>
           <div class="col-md-8">
                <textarea name="ulasan" rows="5" class="form-control"></textarea>
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