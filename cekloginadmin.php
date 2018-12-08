<?php
if (isset($_SESSION["role"])) {
  if ($_SESSION["role"] == "franchise") {
    header('Location: menu_franchise.php');
  }else if ($_SESSION["role"] != "admin") {
    header('Location: index.php');
  }
}else {
  header('Location: index.php');
}
?>
