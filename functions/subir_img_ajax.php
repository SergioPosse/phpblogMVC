<?php
try{
    if (isset($_FILES["file"])){    
            $file = $_FILES["file"]; 
            $nombre = $file["name"];
            $tipo = $file["type"];
            $ruta_provisional = $file["tmp_name"];
            $size = $file["size"];
            $dimensiones = getimagesize($ruta_provisional);
            $width = $dimensiones[0];
            $height = $dimensiones[1];
            $carpeta = "../img/";

            require_once('../clases/Coneccion.class.php');
            $coneccion = new Coneccion();
            $link=$coneccion->conectar();

            $busqueda = $link->query("SELECT url FROM posts");
            if($busqueda){
                    while($urls=$busqueda->fetch_array(MYSQLI_BOTH)){ 
                        if(("img/".$nombre)==$urls['url']){
                            $nombre="1".$nombre;
                        }    
                    }

                    $link->close();

                    $src = $carpeta.$nombre;
                    move_uploaded_file($ruta_provisional, $src);
                    echo ($nombre); 
            } else {
                throw new Exception("ERROR EN BUSQUEDA");
            }  
        }else{
            throw new Exception("ERROR NO HAY DATOS FILES"); 
        }
} catch(Exception $e) {
            echo $e->getMessage();
}

?>