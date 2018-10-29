<?php
    
require_once('../clases/Coneccion.class.php');
$coneccion = new Coneccion();
$link=$coneccion->conectar();
    

$consulta = "SELECT * FROM usuarios";

$resultado = $link->query($consulta);



                  while($filas_de_query=$resultado->fetch_array(MYSQLI_BOTH))
                  {
                        echo "<li><a href'#!' data-id='".$filas_de_query['id']."' data-nombre='".$filas_de_query['usuario']."' onclick='setear_autor(this)'>".$filas_de_query['usuario']."</a></li>";
                  }

$link->close();
?>
