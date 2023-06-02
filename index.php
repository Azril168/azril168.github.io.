<?php
$koneksi = mysqli_connect('localhost','root','','tutorialcr');

if(isset($_POST['simpandata'])){
    $namabuku = $_POST['nama'];
    $hargabuku = $_POST['harga'];
    
    $query = mysqli_query($koneksi,"insert into buku (namabuku,hargabuku) values ('$namabuku','$hargabuku')");

    if($query){
        echo 'berhasil';
    } else {
        echo 'gagal';
    }    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container" style="margin: top 50px;">
  <h2>data mahasiswa</h2>
  <form method="post" auto-complete='off'>
    <div class="form-group">
      <label for="nama">Nama:</label>
      <input type="text" class="form-control" id="nama" placeholder="masukkan nama" name="nama">
    </div>
    <div class="form-group">
      <label for="harga">Nim:</label>
      <input type="number" class="form-control" id="harga" placeholder="masukkan Nim" name="harga">
    </div>

    <button type="submit" name="simpandata" class="btn btn-primary">Simpan</button>
  </form>

  <hr>
  <br>

  <table class="table">
  <?php
  $ambildata = mysqli_query($koneksi,"select * from buku");

  while($loop = mysqli_fetch_array($ambildata)){
    $id       = $loop['idbuku'];
    $bookname = $loop['namabuku'];
    $bookprice = $loop['hargabuku'];
 
    echo'<tr>
           <td>'.$id.'</td>
           <td>'.$bookname.'</td>
           <td>'.$bookprice.'</td>
           <td>
           <a href="delete.php?deletid='.$id.'"class="text-light">Delete</a><button class="btn btn-danger"><a href="delete.php?deletid='.$id.'" class="text-light">Delete</a></button></button>
           </td>
           </tr>';
          
          }
          
      
?>
  </table>

  <?php
  if(isset($_GET['idbuku'])){

    mysqli_query($koneksi, "delete from barang where idbuku= '$_GET[idbuku]'");

    echo "Data telah terhapus";
    echo "<meta http-equiv=refresh content=2;URL='index.php'>";
  }

  ?>

</body>
</html>
