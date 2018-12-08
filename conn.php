<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_growbook";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";


// $sql = "SELECT * FROM tb_penerbit";
// $result = $conn->query($sql);
//
// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//       echo "<option>".$row["nama"]."</option>";
//   }
// }
// $conn->close();


?>
