
<?php
  include 'conn.php';
  include 'navbar.php';
  include 'cekloginadmin.php';
  $sql = "SELECT * FROM tb_franchise";
  $result = $conn->query($sql);
 ?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Lihat Franchise</title>
  </head>
  <body style="padding: 150px;">
    <div class="container">
      <h1>Daftar Franchise</h1>
      <br>
      <table class="table table-hover">
         <thead>
           <tr>
             <th>No.</th>
             <th>ID</th>
             <th>Nama Pemilik</th>
             <th>Alamat</th>
             <th>Kota</th>
             <th>Telepon</th>
             <th>Masa Berlaku</th>
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
                   <tr>
                   <td name='id'>".$a."</td>
                   <td name=''>".$row["id"]."</td>
                   <td name=''>".$row["nama_pemilik"]."</td>
                   <td name=''>".$row["kota"]."</td>
                   <td name=''>".$row["alamat"]."</td>
                   <td name=''>".$row["telepon"]."</td>
                   <td name=''>".$row["masa_berlaku"]."</td>
                   <td>
                   <button type='submit' class='btn btn-danger btn-block' name='hapus' value='".$row["id"]."'>Hapus</button>
                   </td>
                   </tr>

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
