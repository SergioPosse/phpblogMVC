<?php
include('clases/usuario.class.php');
if($_POST){
    $usuario = new Usuario();
    
    if(isset($_POST['new_usuario'])){
        
        $repetido = $usuario->usuario_repetido($_POST['new_usuario']);
    
        if($repetido === TRUE){
            echo "2";
        }
        else{
            $usuario->guardar_usuario();
        }
        
    }
    
    
    if(isset($_POST['url_avatar'])){ //SI LA PETICION ES UN GUARDAR AVATAR
        $usuario->guardar_avatar($_POST['url_avatar'],$_SESSION['id']);
    }
}
else{ 
    echo "4";
} 
  //NO TIENE ASOCIADO UN TEMPLATE YA QUE CARGO DESDE UN FORM MODAL EN LOGIN.TPL  
?>