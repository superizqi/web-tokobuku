<?php
  include 'conn.php';
  include 'navbar.php';
  include 'cekloginadmin.php';
  $sql = "SELECT * FROM tb_penerbit";
  $result = $conn->query($sql);
 ?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Lihat Penerbit</title>
  </head>
  <body style="padding: 150px;">
    <div class="container">
      <h1>Daftar Penerbit</h1>
      <br>
      <table class="table table-hover">
         <thead>
           <tr>
             <th>No</th>
             <th>ID</th>
             <th>Nama</th>
             <th>Alamat</th>
             <th>Kota</th>
             <th>Nomor Telepon</th>
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
                   <form action='edit_penerbit.php' method='post'>
                   <tr>
                   <td name='no'>".$a."</td>
                   <td name='id'>".$row["id"]."</td>
                   <td name='nama'>".$row["nama"]."</td>
                   <td name='alamat'>".$row["alamat"]."</td>
                   <td name='kota'>".$row["kota"]."</td>
                   <td name=''>".$row["telepon"]."</td>
                   <td>
                   <button type='submit' class='btn btn-primary btn-block' name='edit_penerbit' value='".$row["id"]."'>Edit Penerbit</button>
                   <button type='submit' class='btn btn-danger btn-block' name='hapus_penerbit' value='".$row["id"]."'>Hapus Penerbit</button>
                   </td>
                   </tr>
                   </form>
                   ";
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
