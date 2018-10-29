<?php
include('clases/comentario.class.php');

if(isset($_POST['comentarioid'])){
    $comentario= new Comentario();
    $comentario->Borrar_comentario($_POST['comentarioid']);
}else{
    $comentario= new Comentario(ucfirst($_POST['descripcion']),$_POST['postid'],$_SESSION['id']);
    $comentario->Nuevo_comentario();
}
?>