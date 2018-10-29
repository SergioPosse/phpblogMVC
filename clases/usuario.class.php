<?php
class Usuario{
    
private $nombre;
private $pass; 
private $email;
private $url;

        public function guardar_avatar($url,$id){
            require_once('Coneccion.class.php');
            $coneccion = new Coneccion();
            $link=$coneccion->conectar();
    
            $resultado = $link->query("UPDATE usuarios SET usuarios.url_avatar='$url' WHERE usuarios.id='$id'");

        
                    if ($resultado === TRUE)
                    {

                      echo "Avatar guardado";

                    }
                    else
                    {
                      echo "Error guardar avatar";

                    }
        }
        public function guardar_usuario(){
              $this->nombre = $_POST['new_usuario'];  
              $this->pass = $_POST['new_password']; 
              $this->email = $_POST['new_email'];
              $this->url="img/vacio.jpg";
              require_once('Coneccion.class.php');
              $coneccion = new Coneccion();
              $link=$coneccion->conectar();


              $resultado = $link->query("INSERT INTO usuarios (usuario, password, email, url_avatar) VALUES ('".$this->nombre."', '".$this->pass."', '".$this->email."','".$this->url."' )");

              if ($resultado === TRUE)
              {
                  echo "1";
              }
              else
              {
                  echo "3";
              }

              $link->close();
        }
    
        public static function usuario_repetido($usuario){
        require_once('Coneccion.class.php');
        $coneccion = new Coneccion();
        $link=$coneccion->conectar();

        $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $resultado = $link->query($consulta);
        if (mysqli_num_rows($resultado)>0){
            return true;
        }
        else{
            return false;
        }  
        $link->close();
    }
    
}
?>