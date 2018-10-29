<?php
class Comentario{
    private $descripcion;
    private $postid;
    private $usuarioid;
    
    function __construct($descripcion=null,$postid=null,$usuarioid=null){
        $this->descripcion=$descripcion;
        $this->postid=$postid;
        $this->usuarioid=$usuarioid;
    }
    
    public function Lista_comentarios($postid){
        require_once('Coneccion.class.php');
        $coneccion = new Coneccion();
        $link=$coneccion->conectar();
        
        $consulta = "SELECT * FROM comentarios INNER JOIN usuarios ON comentarios.usuario_id=usuarios.id WHERE comentarios.post_id='$postid'";
        
        $resultado = $link->query($consulta);
        $rows= array();
        while ($row = $resultado->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return json_encode($rows); //DEVUELVE UN ARRAY CON LOS COMENTARIOS DEL POSTID Q LE PASE
        $link->close();
    }
    
    public function Cantidad_comentarios($postid){
         require_once('Coneccion.class.php');
        $coneccion = new Coneccion();
        $link=$coneccion->conectar();
        
        $consulta = "SELECT * FROM comentarios INNER JOIN usuarios ON comentarios.usuario_id=usuarios.id WHERE comentarios.post_id='$postid'";
        
        $resultado = $link->query($consulta);
        $cantidad_comentarios = $resultado->num_rows;
        $link->close();
        
        return $cantidad_comentarios; //DEVUELVE la cantidad de comentarios de un post
        
    }
    
    public function Nuevo_comentario(){

        $int_usuarioid=intval($this->usuarioid);

        require_once('Coneccion.class.php');
        $coneccion = new Coneccion();
        $link=$coneccion->conectar();

        $resultado = $link->query("INSERT INTO comentarios (post_id, comentario_desc, usuario_id) VALUES('".$this->postid."', '".$this->descripcion."','".$int_usuarioid."')");

        if ($resultado === TRUE)
        {
          echo "INSERT comentario exitoso";

        }
        else
        {
          echo "Error de INSERT comentario";

        }
        $link->close();
        
    }
    
    public function Borrar_comentario($comentarioid){
        require_once('Coneccion.class.php');
        $coneccion = new Coneccion();
        $link=$coneccion->conectar();

        $resultado = $link->query("DELETE FROM comentarios WHERE comentario_id='$comentarioid'");

        if ($resultado === TRUE)
        {
            echo "BORRADO comentario exitoso";
        } 
        else
        {
            echo "Error de BORRADO comentario";
        }
        
        $link->close(); 
    }
    
}//fin clase
?>