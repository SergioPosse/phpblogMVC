<?php
include('clases/publicacion.class.php');

if($_POST){
    
        $publicacion = new Publicacion();
    
        if(isset($_POST['postidcargar'])){ //si esta definido postidcargar metodo cargar_un_post
             $publicacion->Cargar_un_post($_POST['postidcargar']);
         }else{ 
                if(isset($_POST['postidborrar'])){ //si esta definido postidborrar metodo borrar
                    $publicacion->Borrar($_POST['postidborrar'],$_POST['fecha']);
             
                }else{ 
                    //seteo los datos a la clase YA QUE ES MEJOR PRACTICA TRATAR LOS PARAMETROS QUE VIENEN
                    //POR POST EN EL CONTROLADOR Y NO EN EL MODELO..
                    $publicacion->setDescripcion(ucfirst($_POST['prm_desc']));
                    $publicacion->setTitulo(ucfirst($_POST['prm_titulo']));
                    $publicacion->setFecha($_POST['prm_fecha']);
                    $publicacion->setUrl($_POST['prm_nom_img']);
                    $publicacion->setAutor($_POST['prm_autor']);
            
                    if(isset($_POST['postid'])){//si esta definido postid metodo editar
                        $publicacion->setPost_id($_POST['postid']);
                        $publicacion->Editar_publicacion();
                    }
                    else{//si no esta definido postid entonces es metodo insertar
                        
                        $publicacion->Nueva_publicacion();
                    }
                }
    
         } 
}else{
    Publicacion::Actualizar($_SESSION['id']); //le paso el valor de la session
}
//NO TIENE ASOCIADO UN TEMPLATE YA QUE CARGO DESDE UN FORM MODAL EN INDEX.TPL 
?>



