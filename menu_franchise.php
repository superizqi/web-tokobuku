<?php
  include 'conn.php';
  include 'cekloginfranchise.php';
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title> Menu Admin </title>
  </head>
  <body>
    <div class="container" style="padding:150px;">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container" style="margin-left:240px;">
          <center><a class="navbar-brand" href="menu_franchise.php">Menu Franchise</a></center>
        </div>
      </nav>
      <h1>Selamat Datang Di Halaman Franchise GrowBook</h1>
      <br>
      <br>
      <a href="pengadaan_franchise.php"> <button type="button" class="btn btn-primary btn-md btn-block">Pengadaan</button> </a>
      <br>
      <a href="history_pengadaan.php"> <button type="button" class="btn btn-primary btn-md btn-block">History Pengadaan</button> </a>
      <br>
      <a href="logout.php"> <button type="button" class="btn btn-danger btn-md btn-block">Logout</button> </a>

    </div>
  </body>
</html>
