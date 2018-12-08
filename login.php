<?php
  include 'conn.php';
  if (isset($_SESSION["role"])) {
    if ($_SESSION["role"] == "franchise") {
      header('Location: menu_franchise.php');
    }elseif ($_SESSION["role"] == "admin") {
      header('Location: menu_admin.php');
    }
  }else {

  }

  if (isset($_POST['btn_masuk'])) {
      $email_input = $_POST['alamat_email'];
      $password_input = $_POST['input_password'];
      // echo $email;
      // echo $password;
      $read_tb_user = "SELECT * FROM tb_user WHERE email = '$email_input'";
      $result = mysqli_query($conn, $read_tb_user);
      $id_user = "";
      $password_tb = "";
      $role =  "";
      if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
              // $id_user = $row["id"];
              $password_tb = $row["password"];
              $role = $row["role"];
              $_SESSION['nama'] = $row["nama"];
              $_SESSION['role'] = $row["role"];
              // $_SESSION["user_id"] = $id_user;
          }
          if ($password_tb == $password_input) {
            // echo "<script>alert('Login Berhasil')</script>";
            // header('Location: menu_pengurus.php');
            if ($role == "franchise") {
              header('Location: menu_franchise.php');
            }else if($role == "admin") {
              header('Location: menu_admin.php');
            }
          }else {
            echo "<script> alert('Password Salah') </script>";
          }
      } else {
          echo "<script>alert('Email / Password Salah')</script>";
      }
  }
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login Page Franchise GroowBook</title>
    <style media="screen">
    body{
        /* The image used */
        background-image: url("https://images.pexels.com/photos/1092364/pexels-photo-1092364.jpeg?auto=compress&cs=tinysrgb&h=650&w=940");

        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        }
    </style>
  </head>
  <body style="padding-top:150px;padding-left:300px;padding-right:300px; margin-bottom:150px;">
    <div class="container">
    <!-- Form Login -->
    <h1>Login Page Franchise GrowBook</h1>
    <form method="post" action="">
      <div class="form-group">
        <label for="alamat_email">Alamat Email</label>
        <input type="email" class="form-control" id="alamat_email" name="alamat_email" placeholder="Masukkan alamat email" autofocus>
      </div>
      <div class="form-group">
        <label for="input_password">Password</label>
        <input type="password" class="form-control" id="input_password" name="input_password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary btn-block" name="btn_masuk">Masuk</button>
    </form>
    <center><h1>User Admin <span class="badge badge-secondary"></span></h1></center>
    <h5>Email : admin@franchise.com </h5>
    <h5>Password : admin </h5>
    <center><h1>User Franchise <span class="badge badge-secondary"></span></h1></center>
    <h5>Email : selly@franchise.com </h5>
    <h5>Password : selly </h5>
    <h5>Email : febri@franchies.com </h5>
    <h5>Password : febri </h5>
    </div>
  </body>
</html>
