<?php
include 'conn.php';
include 'navbar.php';
include 'cekloginadmin.php';
if (isset($_POST['hapus_penerbit'])) {
  // echo "Mau Hapus";
  $id_penerbit = $_POST['hapus_penerbit'];
  // sql to delete a record
  $sql = "DELETE FROM tb_penerbit WHERE id='$id_penerbit'";
  if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Berhasil Hapus')</script>";
      // echo "Berhasil Hapus";
      header('Location: lihat_penerbit.php');
      exit;
  } else {
    // echo "<script> alert('Berhasil Hapus'); </script>";
    echo "<script> alert('Error deleting record: ".$conn->error."'); </script>";
     // echo "Error deleting record: " . $conn->error;
  }
  $conn->close();
}

// Ambil Data Buku Existing
if (isset($_POST['edit_penerbit'])) {
  $id_penerbit = $_POST['edit_penerbit'];
  $sql = "SELECT * FROM tb_penerbit WHERE id='$id_penerbit'";
  $result = $conn->query($sql);
  $row = mysqli_fetch_assoc($result);
  $id = $row["id"];
  $nama = $row["nama"];
  $alamat = $row["alamat"];
  $kota = $row["kota"];
  $telepon = $row["telepon"];
  mysqli_close($conn);
}

// Update Buku
if (isset($_POST['btn_submit'])) {
  $id = $_POST["btn_submit"];
  $namapenerbit = $_POST["nama"];
  $alamat = $_POST["alamat"];
  $kota = $_POST["kota"];
  $telepon = $_POST["telepon"];
  // echo $id;
  // $sql = "INSERT INTO tb_penerbit VALUES ('$id','$namapenerbit','$alamat','$kota','$telepon')";
  $sql = "UPDATE tb_penerbit SET nama='$namapenerbit', alamat='$alamat',kota='$kota',telepon='$telepon' WHERE id='$id'";
  // echo $sql;
  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Update Penerbit Berhasil')</script>";
    header('Location: lihat_penerbit.php');
  } else {
    echo "<script>alert('Tambah Penerbit Gagal')</script>";
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
   <h1>Selamat Datang Di Halaman Tambah Penerbit</h1>
   <form action="<?=($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data">
     <div class="form-group">
       <label for="id">ID</label>
       <input type="text" class="form-control" name="id" placeholder="ID Penerbit"  value="<?php echo $id; ?>" disabled>
     </div>
     <div class="form-group">
       <label for="nama">Nama Penerbit</label>
       <input type="text" class="form-control" name="nama" placeholder="Nama Penerbit" value="<?php echo $nama; ?>">
     </div>
     <div class="form-group">
       <label >Alamat Penerbit</label>
       <input type="text" class="form-control" name="alamat" placeholder="Alamat Penerbit" value="<?php echo $alamat; ?>">
     </div>
     <div class="form-group">
       <label >Kota</label>
       <input type="text" class="form-control" name="kota" placeholder="Kota" value="<?php echo $kota; ?>">
     </div>
     <div class="form-group">
       <label >Telepon</label>
       <input type="number" class="form-control" name="telepon" placeholder="ex: 081226269837" value="<?php echo $telepon; ?>">
     </div>
     <button type="submit" class="btn btn-success" name="btn_submit" value="<?php echo $id; ?>">Submit</button>
   </form>
   </div>

   <!-- <div class="w3-panel w3-card w3-yellow" style="width:300px; margin-top:50px"><a style="text-decoration:none" href="https://s.id/Modul5EA" target="_blank"><p>Modul 5 Application Architecture</p></a></div> -->
   <!-- <div class="w3-panel w3-card w3-red" style="width:300px; margin-top:20px"><a style="text-decoration:none" href="https://drive.google.com/file/d/1OOIqDKxp4HLB9H9NwA-VAbjm4pULY_74/view" target="_blank"><p>Tes Awal Modul 5</p></a></div> -->
   <!-- <div class="w3-panel w3-card w3-blue" style="width:300px; margin-top:20px"><a style="text-decoration:none" href="https://drive.google.com/file/d/1oP5_EYWX6u5cuVZ9HuvkexgShMi8xJdz/view" target="_blank"><p>Login</p></a></div>
   <div class="w3-panel w3-card w3-green" style="width:300px; margin-top:20px"><a style="text-decoration:none" href="https://drive.google.com/file/d/1giw0osra0iKes6O2asM5Z4ZiKnl-KwQc/view" target="_blank"><p>Daftar</p></a></div> -->

   </div>
 </body>
</html>
