<?php
require("../functions/security.php");

if (check_login()){
  $nombre = $_SESSION['usuario'];
  echo $nombre;
}


?>
