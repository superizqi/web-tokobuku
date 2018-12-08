<?php
  include 'conn.php';
  include 'navbar.php';
  include 'cekloginadmin.php';
  $sql = "SELECT * FROM tb_buku";
  $result = $conn->query($sql);
 ?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Lihat Buku</title>
  </head>
  <body style="padding: 150px;">
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
             <th>Aksi</th>
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
                   <form action='edit_buku.php' method='post'>
                   <tr>
                   <td name='id'>".$a."</td>
                   <td name=''>".$row["id"]."</td>
                   <td name=''>".$row["kategori"]."</td>
                   <td name=''>".$row["nama"]."</td>
                   <td name=''>".$row["harga"]."</td>
                   <td name=''>".$row["stok"]."</td>
                   <td name=''>".$row["penerbit"]."</td>
                   <td>
                   <button type='submit' class='btn btn-primary btn-block' name='edit_buku' value='".$row["id"]."'>Edit Buku</button>
                   <button type='submit' class='btn btn-danger btn-block' name='hapus_buku' value='".$row["id"]."'>Hapus Buku</button>
                   </td>
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




    </div>
  </body>
</html>
