<?php
require("../functions/security.php");

if (check_login()){
  $idoculto = $_SESSION['id'];
  echo $idoculto;
}


?>
