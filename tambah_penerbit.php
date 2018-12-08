<?php
  include 'conn.php';
  include 'navbar.php';
  include 'cekloginadmin.php';

  if (isset($_POST['btn_submit'])) {
    $id = $_POST["id"];
    $namapenerbit = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $kota = $_POST["kota"];
    $telepon = $_POST["telepon"];
    // echo $id;
    $sql = "INSERT INTO tb_penerbit VALUES ('$id','$namapenerbit','$alamat','$kota','$telepon')";
    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Tambah Buku Berhasil')</script>";
      header('Location: lihat_penerbit.php');
    } else {
      echo "<script>alert('Tambah Buku Gagal')</script>";
    }
    $conn->close();
  }

 ?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Tambah Penerbit</title>
  </head>
  <body style="padding: 150px;">
    <div class="container">
    <!-- Form Login -->
    <h1>Selamat Datang Di Halaman Tambah Penerbit</h1>
    <form action="<?=($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="id">ID</label>
        <input type="text" class="form-control" name="id" placeholder="ID Penerbit" >
      </div>
      <div class="form-group">
        <label for="nama">Nama Penerbit</label>
        <input type="text" class="form-control" name="nama" placeholder="Nama Penerbit">
      </div>
      <div class="form-group">
        <label >Alamat Penerbit</label>
        <input type="text" class="form-control" name="alamat" placeholder="Alamat Penerbit">
      </div>
      <div class="form-group">
        <label >Kota</label>
        <input type="text" class="form-control" name="kota" placeholder="Kota">
      </div>
      <div class="form-group">
        <label >telepon</label>
        <input type="number" class="form-control" name="telepon" placeholder="ex: 081226269837">
      </div>
      <button type="submit" class="btn btn-success" name="btn_submit">Submit</button>
    </form>
    </div>
  </body>
</html>
