<?php
  include 'conn.php';
  include 'cekloginfranchise.php';
  include 'navbarfranchise.php';
  $nama_user = $_SESSION['nama'];
  // echo $nama_user;
  // session_start();
  // $panti_id = $_SESSION['panti_id'];
  // $user_id  = $_SESSION['user_id'];
  // echo $panti_id;
  // echo $user_id;

  if (isset($_POST['btn_submit'])) {
    $nama_pemesan = $_POST["nama_pemesan"];
    $namabuku = $_POST["nama_buku"];
    $jumlah = $_POST["jumlah_buku"];
    $harga = "";
    // Cari Buku
    $sqlcaribuku = "SELECT * FROM tb_buku WHERE nama='$namabuku'";
    $resultcaribuku = $conn->query($sqlcaribuku);
    if ($resultcaribuku->num_rows > 0) {
      // output data of each row
      while($row = $resultcaribuku->fetch_assoc()) {
          $harga = $row["harga"];
      }
    }
    $total = $harga*$jumlah;

    // $conn->close();
    // End Cari Buku
    $sql = "INSERT INTO tb_transaksi VALUES ('','$nama_pemesan','$namabuku','$jumlah','$total')";
    // echo $sql;
    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Pesanan Berhasil Ditambah')</script>";
      header('Location: menu_franchise.php');
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
    <title>Pengadaan Franchise</title>
  </head>
  <body style="padding: 150px;">
    <div class="container">
    <!-- Form Login -->
    <h1>Selamat Datang Di Halaman Pengadaan</h1>
    <form action="<?=($_SERVER['PHP_SELF'])?>" method="post">
      <input type="hidden" class="form-control" name="nama_pemesan" value="<?php echo $nama_user; ?>">
      <div class="form-group">
        <label>Nama Buku</label>
        <select class="form-control" name="nama_buku">
          <?php
          $sql = "SELECT * FROM tb_buku";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<option>".$row["nama"]."</option>";
            }
          }
          $conn->close();
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="nama">Jumlah</label>
        <input type="number" class="form-control" name="jumlah_buku" placeholder="Jumlah Buku">
      </div>
      <button type="submit" class="btn btn-success" name="btn_submit">Submit</button>
    </form>

    <!-- <div class="w3-panel w3-card w3-yellow" style="width:300px; margin-top:50px"><a style="text-decoration:none" href="https://s.id/Modul5EA" target="_blank"><p>Modul 5 Application Architecture</p></a></div> -->
    <!-- <div class="w3-panel w3-card w3-red" style="width:300px; margin-top:20px"><a style="text-decoration:none" href="https://drive.google.com/file/d/1OOIqDKxp4HLB9H9NwA-VAbjm4pULY_74/view" target="_blank"><p>Tes Awal Modul 5</p></a></div> -->
    <!-- <div class="w3-panel w3-card w3-blue" style="width:300px; margin-top:20px"><a style="text-decoration:none" href="https://drive.google.com/file/d/1oP5_EYWX6u5cuVZ9HuvkexgShMi8xJdz/view" target="_blank"><p>Login</p></a></div>
    <div class="w3-panel w3-card w3-green" style="width:300px; margin-top:20px"><a style="text-decoration:none" href="https://drive.google.com/file/d/1giw0osra0iKes6O2asM5Z4ZiKnl-KwQc/view" target="_blank"><p>Daftar</p></a></div> -->

    </div>
  </body>
</html>
