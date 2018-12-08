<?php
  include 'conn.php';
  $sql = "SELECT * FROM tb_buku";
  $result = $conn->query($sql);
 ?>

 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <title> Daftar Buku </title>
   </head>
   <body style="padding:150px;">
     <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
       <div class="container">
         <a class="navbar-brand" href="index.php">Franchise Grow Book</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
           <ul class="navbar-nav ml-auto">
             <li class="nav-item">
               <?php
                if (isset($_SESSION["role"])) {
                  echo "<a class='nav-link' href='logout.php'>Logout";
                }else {
                  echo "<a class='nav-link' href='login.php'>Login";
                }
                ?>

               </a>
             </li>
           </ul>
         </div>
       </div>
     </nav>
     <div class="container">
       <h1>Daftar Buku</h1>
       <br>
       <table class="table table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>ID</th>
        <th>Kategori</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Penerbit</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result->num_rows > 0) {
          // output data of each row
          $a = 0;
          while($row = $result->fetch_assoc()) {
            $a++;
            echo
              "
              <tr>
              <td name='id'>".$a."</td>
              <td name=''>".$row["id"]."</td>
              <td name=''>".$row["kategori"]."</td>
              <td name=''>".$row["nama"]."</td>
              <td name=''>".$row["harga"]."</td>
              <td name=''>".$row["stok"]."</td>
              <td name=''>".$row["penerbit"]."</td>
              </tr>
              </form>
              ";
                            // <button type='submit' class='btn btn-primary btn-block' name='edit_id_anggota' value='".$row["id"]."'>Edit Anggota</button><br>
          }
      } else {
          // echo "<center><h1>Data Belum Ada</h1></center>";
          echo "<h1>Data Belum Ada</h1><br>";
      }
      $conn->close();
       ?>
    </tbody>
  </table>



     </div>
   </body>
 </html>
