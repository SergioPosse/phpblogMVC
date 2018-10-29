<?php
if($_POST){ //SI NO HAY NINGUNA SESSION DEFINIDA ENTONCES LOGEO, ADEMAS SI HAY UN POST APUNTANDO
    //A ESTE ARCHIVO ENTONCES NO ES UN LOGOUT (NO MANDA NADA EL AJAX DEL LOGOUT)

    include('clases/login.class.php');
    
    $login = new Login();
    if(isset($_POST['traer_url'])){
        $login->getUrl($_SESSION['id']);      
    }else{
       
        $login->Iniciar();
     
    }
    
    
    
} else {  //SI HAY UNA SESION DEFINIDA ENTONCES DESTROY LA MISMA
    if($_SESSION){
        include('clases/login.class.php');
        $login = new Login();
        echo "Sesion cerrada";
        $login->Cerrar();
        
    } //SI NO HAY SESSION DEFINIDA NADA QUE DESTROY Y TAMPOCO SE MANDARON DATOS POR POST ENTONCES 
    //LA VISTA SOLICITA ESTE CONTRLADOR POR PRIMERA VEZ ENTONCES CARGO CON SMARTY EL TEMPLATE DE LOGIN
    $template = new Smarty();
    $template->display('login.tpl');
} 
?>