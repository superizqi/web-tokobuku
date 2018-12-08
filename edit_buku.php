<?php
include 'conn.php';
include 'navbar.php';
include 'cekloginadmin.php';
if (isset($_POST['hapus_buku'])) {
  // echo "Mau Hapus";
  $id_buku = $_POST['hapus_buku'];
  // sql to delete a record
  $sql = "DELETE FROM tb_buku WHERE id='$id_buku'";
  if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Berhasil Hapus')</script>";
      // echo "Berhasil Hapus";
      header('Location: lihat_buku.php');
      exit;
  } else {
    // echo "<script> alert('Berhasil Hapus'); </script>";
    echo "<script> alert('Error deleting record: ".$conn->error."'); </script>";
     // echo "Error deleting record: " . $conn->error;
  }
  $conn->close();
}

// Ambil Data Buku Existing
if (isset($_POST['edit_buku'])) {
  $id_buku =$_POST['edit_buku'];
  $sql = "SELECT * FROM tb_buku WHERE id='$id_buku'";
  $result = $conn->query($sql);
  $row = mysqli_fetch_assoc($result);
  $id = $row["id"];
  $kategori = $row["kategori"];
  $nama = $row["nama"];
  $harga = $row["harga"];
  $stok = $row["stok"];
  $penerbit = $row["penerbit"];
  // echo $judul;
  // echo $gambar;
  mysqli_close($conn);
}

// Update Buku
if (isset($_POST['btn_submit'])) {
  $id = $_POST["btn_submit"];
  $kategori = $_POST["kategori"];
  $namabuku = $_POST["nama"];
  $harga = $_POST["harga"];
  $stok = $_POST["stok"];
  $penerbit = $_POST["penerbit"];

  $sql = "UPDATE tb_buku SET kategori='$kategori',nama='$namabuku',harga='$harga',stok='$stok',penerbit='$penerbit' WHERE id='$id'";
  // $sql = "UPDATE tb_buku SET nama='$namabuku' WHERE id='$id'";
  // echo $sql;
  if ($conn->query($sql) === TRUE) {
      echo "<script> alert('Update Berhasil') </script>";
      header('Location: lihat_buku.php');
  } else {
      echo "Error updating record: " . $conn->error;
  }

  $conn->close();
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <title>Edit Buku</title>
 </head>
 <body style="padding: 150px;">
   <div class="container">
   <!-- Form Login -->
   <h1>Selamat Datang Di Halaman Edit Buku</h1>
   <form action="<?=($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data">
     <div class="form-group">
       <label for="id_buku">ID</label>
       <input type="text" class="form-control" name="id_buku" placeholder="ID Buku" value=" <?php echo $id; ?>" disabled >
     </div>
     <div class="form-group">
       <label for="kategori">Kategori</label>
       <select class="form-control" name="kategori">
         <option>Bisnis</option>
         <option selected>Keilmuan</option>
         <option>Novel</option>
       </select>
     </div>
     <div class="form-group">
       <label for="nama">Nama Buku</label>
       <input type="text" class="form-control" name="nama" placeholder="Nama Buku" value="<?php echo $nama; ?>">
     </div>
     <div class="form-group">
       <label>Harga</label>
       <input type="number" class="form-control" name="harga" placeholder="Harga Buku" value="<?php echo $harga; ?>">
     </div>
     <div class="form-group">
       <label>Stok</label>
       <input type="number" class="form-control" name="stok" placeholder="Stok" value="<?php echo $stok; ?>">
     </div>
     <div class="form-group">
       <label>Penerbit</label>
       <select class="form-control" name="penerbit">
         <!-- <?php
         $sql = "SELECT * FROM tb_penerbit";
         $result = $conn->query($sql);
         if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<option>".$row["nama"]."</option>";
            }
        }
         $conn->close();
          ?> -->
          <option>Andi Offset</option><option>Danendra</option><option>Penerbit Informatika</option>
       </select>
     </div>


     <button type="submit" class="btn btn-success" name="btn_submit" value="<?php echo $id; ?>">Submit</button>
   </form>

   <!-- <div class="w3-panel w3-card w3-yellow" style="width:300px; margin-top:50px"><a style="text-decoration:none" href="https://s.id/Modul5EA" target="_blank"><p>Modul 5 Application Architecture</p></a></div> -->
   <!-- <div class="w3-panel w3-card w3-red" style="width:300px; margin-top:20px"><a style="text-decoration:none" href="https://drive.google.com/file/d/1OOIqDKxp4HLB9H9NwA-VAbjm4pULY_74/view" target="_blank"><p>Tes Awal Modul 5</p></a></div> -->
   <!-- <div class="w3-panel w3-card w3-blue" style="width:300px; margin-top:20px"><a style="text-decoration:none" href="https://drive.google.com/file/d/1oP5_EYWX6u5cuVZ9HuvkexgShMi8xJdz/view" target="_blank"><p>Login</p></a></div>
   <div class="w3-panel w3-card w3-green" style="width:300px; margin-top:20px"><a style="text-decoration:none" href="https://drive.google.com/file/d/1giw0osra0iKes6O2asM5Z4ZiKnl-KwQc/view" target="_blank"><p>Daftar</p></a></div> -->

   </div>
 </body>
</html>
