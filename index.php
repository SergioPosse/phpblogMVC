<?php
session_start();
require 'libs/smarty-3.1.30/libs/Smarty.class.php';
//LA VARIABLE VIEW VA A SER COMO EL SWITCH PARA LOS CONTROLADORES
//Y LO QUE ME RETORNEN POR AJAX ESOS PHP CONTROLLERS
//si es la primera vez que se entra $view no va a estar
//definida entonces la definimos por defecto a que $view sea 'index'
$view = isset($_GET['view']) ? $_GET['view'] : 'index'; //if compacto
//ahora validamos si el controlador asociado a lo que cargue en $view existe..
//por eso debo llamar con una nomenclatura
//a los controladores igual que las $view que tenga
if(file_exists('controllers/'.$view.'Controller.php' )){
    include('controllers/'.$view.'Controller.php');
}
else{
    include('controllers/errorController.php');
}
?>