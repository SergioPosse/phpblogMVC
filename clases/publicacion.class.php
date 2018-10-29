<?php
class Publicacion{
    
private $titulo;
private $post_id;
private $autor;
private $fecha;
private $descripcion;
private $url;
//HACER UNA FUNCION CONSTRUCTORA PASANDO POR PARAMETROS TODOS LOS SET SERIA MEJOR PARA NO REPETIR CODIGO
//PERO LO HICE ASI PARA PROBAR EL USO DE SETTERS Y GETTERS EN ESTA CLASE NOMAS, EN LAS DEMAS USE CONSTRUCTORES
//SETTERS
public function setTitulo($titulo){
    $this->titulo=$titulo;
}
public function setPost_id($post_id){
    $this->post_id=$post_id;
}
public function setAutor($autor){
    $this->autor=$autor;
}
public function setFecha($fecha){
    $this->fecha=$fecha;
}
public function setDescripcion($descripcion){
    $this->descripcion=$descripcion;
}
public function setUrl($url){
    $this->url=$url;
}
    
//GETTERS    
public function getTitulo(){
    $titulo = $this->titulo;
    return $titulo;
}
public function getPost_id(){
    $post_id = $this->post_id;
    return $post_id;
}
public function getAutor(){
    $autor = $this->autor;
    return $autor;
}
public function getFecha(){
    $fecha = $this->fecha;
    return $fecha;
}
public function getDescripcion(){
    $descripcion = $this->descripcion;
    return $descripcion;
}
public function getUrl(){
    $url = $this->url;
    return $url;
}

    
public function Nueva_publicacion(){
    
    
    if($this->getAutor()==""){
        $idusuario=$_SESSION['id'];
    }else{
        $idusuario=$this->getAutor();
    }
    
    $int_idusuario=intval($idusuario); //(int)$variable no me funciono
    $url=$this->getUrl();

    $fecha=$this->getFecha();
    $titulo=$this->getTitulo();
    $descripcion=$this->getDescripcion();

    require_once('Coneccion.class.php');
    $coneccion = new Coneccion();
    $link=$coneccion->conectar();
             
            
                    $resultado = $link->query("INSERT INTO posts (description, titulo, url, usuario_id, created_at) VALUES('".$descripcion."', '".$titulo."','".$url."','".$int_idusuario."','".$fecha."')");

        
                    if ($resultado === TRUE)
                    {

                      echo "INSERT post exitoso";

                    }
                    else
                    {
                      echo "Error de INSERT post";

                    }

$link->close();  
}
    
public function Editar_publicacion(){
    
            if($this->getAutor()==""){
                $idusuario=$_SESSION['id'];
            }else{
                $idusuario=$this->getAutor();
            }
    
            $int_idusuario=intval($idusuario); //(int)$variable no me funciono
            $url=$this->getUrl();

            $fecha=$this->getFecha();
            $titulo=$this->getTitulo();
            $descripcion=$this->getDescripcion();
            $postid=$this->getPost_id();
            
    
            require_once('Coneccion.class.php');
            $coneccion = new Coneccion();
            $link=$coneccion->conectar();
    
            $resultado = $link->query("UPDATE posts SET usuario_id='$int_idusuario', titulo='$titulo', description='$descripcion',
                 url='$url', modified_at='$fecha' WHERE post_id='$postid'");

        
                    if ($resultado === TRUE)
                    {

                      echo "UPDATE post exitoso";

                    }
                    else
                    {
                      echo "Error de UPDATE post";

                    }
}
    
public function Cargar_un_post($postid){
    require_once('Coneccion.class.php');
    $coneccion = new Coneccion();
    $link=$coneccion->conectar();
 
    $consulta = "SELECT * FROM posts WHERE post_id = '$postid'";

    $resultado = $link->query($consulta);
    $MyObj = new stdClass();
    $i=0;
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $myObj[$i] = new stdClass;
        $myObj[$i] ->titulo = $fila['titulo'];
        $myObj[$i] ->url = $fila['url'];
        $myObj[$i] ->desc = $fila['description'];
        $myObj[$i] ->id = $fila['post_id'];
    }

$myJSON = json_encode($myObj);

echo $myJSON;
}   
    
public static function Actualizar($id_usuario){
    
require_once('Coneccion.class.php');
$coneccion = new Coneccion();
$link=$coneccion->conectar();
    
$consulta = "SELECT * FROM posts INNER JOIN usuarios ON usuarios.id=posts.usuario_id ORDER BY post_id DESC";

$posts = $link->query($consulta);


@$fecha = date("Y-m-d H:i:s",time());
$date = new DateTime($fecha, new DateTimeZone('America/Argentina/Buenos_Aires'));
date_default_timezone_set('America/Argentina/Buenos_Aires');
$zonahoraria = date_default_timezone_get();
@$fecha=date("Y-m-d H:i:s",time());


while($filas_de_query=$posts->fetch_array(MYSQLI_BOTH))
{
    if($filas_de_query['deleted_at']===null) //con este if solo muestro los que no esten borrados logicamente en la bd
    {

                    @$fecha2 = $filas_de_query['created_at'];
                    $date2 = new DateTime($fecha2, new DateTimeZone('America/Argentina/Buenos_Aires'));

                    $diff = strtotime($fecha) - strtotime($fecha2);

                    if($diff>=86400)
                    {
                            $contador=intval($diff/86400);
                            $sufijo="dia(s)";

                    }else
                    {
                        if($diff>=3600)
                        {
                            $contador=intval($diff/3600);
                            $sufijo="hora(s)";

                        }else
                        {
                            if($diff>=60)
                            {
                                $contador=intval($diff/60);
                                $sufijo="minuto(s)";
                            }else
                            {
                                if($diff<60)
                                {
                                    $contador=$diff;
                                    $sufijo="segundo(s)";
                                }
                            }
                        }
                    }


                  echo "<div class='row'>";
                  echo "<div class='col s16 m6 l6 push-l3'>";
                  echo "<div class='card purple darken-2'>";
                  echo "<div class='card-content white-text'>";

                  if($filas_de_query['usuario_id']==$id_usuario){
                      echo "<a data-id='".$filas_de_query['post_id']."' class='btn_borrar' onclick='borrar(this)' href='#' >Eliminar Publicacion</a>";
                  }

                  echo "<span class='card-title'>".$filas_de_query['titulo']."</span>";
                  echo "<p>Publicado por <a>".$filas_de_query['usuario']."</a></p>";
                  echo "<br>";
                  echo "<p>hace: ".$contador." ".$sufijo."</p>";
                  echo "<br>";
                  echo "<img src='".$filas_de_query['url']."' alt='' class='myImg responsive-img'>";
                  echo "<p>".$filas_de_query['description']."</p>";
                  echo "</div>";
                  echo "<div class='card-action'>";
                  if($filas_de_query['usuario_id']==$id_usuario) //SI EL ID DEL USUARIO NO ES EL ID DEL USUARIO QUE POSTEO ENTONCES APARECE COMENTAR
                  {
                    echo "<a data-id='".$filas_de_query['post_id']."' class='btn_editar' onclick='editar(this)' href='#nuevo_posteo'>EDITAR PUBLICACION</a>";

                  }
                  else{
                    echo "<a data-id='".$filas_de_query['post_id']."' onclick='comentar(this)' class='btn_comentar' href='#nuevo_comentario'>COMENTAR</a>";
                  }
                    $id_del_post=$filas_de_query['post_id'];
        
                  require_once('comentario.class.php'); //ACA USO LA CLASE COMENTARIO SIN UN CONTROLADOR
                  $comentario = new Comentario();
                  $cantidad_comentarios=$comentario->Cantidad_comentarios($id_del_post);
                
                  
                  if($cantidad_comentarios>0){
                          $array = $comentario->Lista_comentarios($id_del_post); //ME DEVUELVE UN JSON DEL MYSQLI

                          $array_decode = json_decode($array,true);//LO CONVIERTO A ARRAY PARA USAR FOREACH


                          echo "<ul class='collapsible' data-collapsible='accordion'>";

                          echo "<li>";
                          echo "<div class='collapsible-header'><i class='material-icons'>comment</i>Ver comentarios (".$cantidad_comentarios.")</div>";
                          echo "<div class='collapsible-body'>";
                          echo "<ul class='collection'>";

                              foreach($array_decode as $array_comentarios)
                              {

                                   echo "<div class='row'>";

                                                echo "<div class='col l10'>";
                                                    echo "<p style='background-color:#ba68c8;'>".$array_comentarios['usuario']." dijo: </p>";
                                                    echo "<p>".$array_comentarios['comentario_desc']."</p>";
                                                echo "</div>";

                                                echo "<div class='col l2'>";
                                                    if($array_comentarios['usuario_id']==$id_usuario) //SI EL ID DEL USUARIO NO ES EL ID DEL USUARIO QUE POSTEO ENTONCES APARECE borrar
                                                    {
                                                      echo "<a href='#!' data-id='".$array_comentarios['comentario_id']."' onclick='borrar_comentario(this)' class='btn_borrar_comentario'><i class='material-icons right-align black'>close</i></a>";

                                                    }
                                                echo "</div>";
                                    echo "</div>";

                              }
                        echo "</ul>";
                       echo "</div>";
                     echo "</li>";
                    echo "</ul>"; 
                  }
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";

    } //fin del if deleted_at ===null
}
$link->close();
}

public function Borrar($postid,$fecha){
    require_once('Coneccion.class.php');
    $coneccion = new Coneccion();
    $link=$coneccion->conectar();
            
    $resultado = $link->query("UPDATE posts SET deleted_at='$fecha' WHERE post_id='$postid'");

        
    if ($resultado === TRUE)
    {
        echo "1";
    }
    else
    {
        echo "2";
    }
    $link->close();
}
   

}
?>