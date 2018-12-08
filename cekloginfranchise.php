<?php
if (isset($_SESSION["role"])) {
  if ($_SESSION["role"] != "franchise") {
    header('Location: index.php');
  }
}else {
  header('Location: index.php');
}
?>
