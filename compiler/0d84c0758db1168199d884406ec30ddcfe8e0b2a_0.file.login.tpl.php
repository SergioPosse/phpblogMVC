<?php
/* Smarty version 3.1.30, created on 2017-12-20 22:04:18
  from "E:\Server\phpblog\estilos\templates\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a3ad0528407d0_00443006',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d84c0758db1168199d884406ec30ddcfe8e0b2a' => 
    array (
      0 => 'E:\\Server\\phpblog\\estilos\\templates\\login.tpl',
      1 => 1513739490,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3ad0528407d0_00443006 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
<head>

      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"/>
      <link type="text/css" rel="stylesheet" href="css/style.css"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta charset="UTF-8">


	    <title>PHP PP1</title>
</head>
<body>


<div class="container">
              <div class="row>">
                      <div class="col l12 s12 m12 center centered"> <img class="responsive-img" src="img/login.png">
                      </div>
                      <div class="col l6 m6 s6 center-align push-l2">
                          <a style="width:300px;" class="waves-effect waves-light btn" href="#modal1">Iniciar Sesion</a>
                      </div>
                      <div class="col l6 m6 s6 center-align pull-l2">
                          <a style="width:300px;" class="waves-effect waves-light btn" href="#modal2">No tiene cuenta? </a>
                      </div>
              </div>

          <div id="modal1" class="modal">
              <div class="container">
                        <div class="modal-content">
                            <h4 class="blue-text center-align" style="margin-top:25px;">Iniciar sesion.</h4>
                              <!-- SI METIA LOS INPUT Y SUBMIT EN UN FORM ME MOSTRABA LOS DATOS QUE MANDABA POR POST POR ESO LO SAQUE ASI NO SE VE EL PASSWORD EN LA URL -->
                                	<div class="row" id="form_login">
                                  		<div class="input-field">
                                         <i class="material-icons prefix red-text">account_circle</i>
                                  		   <input placeholder="Ingresa tu usuario" id="usuario" class="id" name="usuario" type="text">
                                  		</div>
                                  		<div class="input-field">
                                         <i class="material-icons prefix  red-text">lock</i>
                                  	    	<input placeholder="Ingresa tu password" id="password" name="password" class="password " type="password">
                                  		</div>
                                	</div>
                        
                        <div class="spinner" id="snipper_login">
                                <div class="rect1"></div>
                                <div class="rect2"></div>
                                <div class="rect3"></div>
                                <div class="rect4"></div>
                                <div class="rect5"></div>
                                <div class="rect6"></div>
                                <div class="rect7"></div>
                        </div>
                        <div class="col l5 center-align">
                           <button class="btn waves-effect waves-light blue" type="submit" name="submit" id="btn_login">Iniciar Sesion</button>

                        </div>
                 </div>
              </div>
        </div> <!-- fin del modal 1 -->

        <div id="modal2" class="modal">
            <div class="container">
                      <div class="modal-content">

                          <h4 class="blue-text center-align" style="margin-top:25px;">Registrar Nuevo Usuario</h4>
                              
                                  <div class="row" id="form_registro">
                                          <div class="input-field">
                                             <i class="material-icons prefix red-text">account_circle</i>
                                             <input placeholder="Ingresa tu usuario" id="new_usuario" class="id" name="usuario" type="text">
                                          </div>
                                          <div class="input-field">
                                             <i class="material-icons prefix  red-text">lock</i>
                                              <input placeholder="Ingresa tu password" id="new_password" name="password" class="password" type="password">
                                          </div>
                                          <div class="input-field">
                                             <i class="material-icons prefix  red-text">email</i>
                                      	    	<input placeholder="Ingresa tu email" id="new_email" name="email" class="email" type="text">
                                      		</div>
                                    </div>
                      
                      <div class="spinner" id="snipper_registro">
                              <div class="rect1"></div>
                              <div class="rect2"></div>
                              <div class="rect3"></div>
                              <div class="rect4"></div>
                              <div class="rect5"></div>
                              <div class="rect6"></div>
                              <div class="rect7"></div>
                      </div>
                      <div class="col l5 center-align">
                         <button class="btn waves-effect waves-light blue" type="submit" name="registrar" id="btn_registrar">Registrar</button>

                      </div>
                
                </div>
            </div>
      </div><!-- fin del modal 2 -->
</div><!-- fin del container principal-->
<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-2.1.1.min.js"><?php echo '</script'; ?>
>
<!-- <?php echo '<script'; ?>
 type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"><?php echo '</script'; ?>
> -->
<?php echo '<script'; ?>
 type="text/javascript" src="js/materialize.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/botones.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    window.onload = function(){
        //LOGIN CONTROLLER
        document.getElementById("btn_login").onclick = function(){
            
        var connect,user,pass,form,result;
            
        pass=document.getElementById("password").value;
        user=document.getElementById("usuario").value;
            
        if(user != '' && pass != ''){
            form = 'usuario='+user+'&password='+pass;
            
            connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            connect.onreadystatechange = function(){
                if(connect.readyState == 4 && connect.status == 200){
                    if(parseInt(connect.responseText) == 1){
                        location.href =  '?view=index';
                    } else {
                        alert("Credenciales Incorrectos");
                        $('#snipper_login').hide();
                        $('#form_login').show();
                        $('#btn_login').show();
                    }

                } else if (connect.readyState != 4){

                }
            }   
            connect.open('POST','?view=login',true);
            connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            connect.send(form);
        } else {
            alert("datos vacios no permitidos");  
        }
            
        
        }
        //USUARIO CONTROLLER
        document.getElementById("btn_registrar").onclick = function(){
            
        var connect,user,pass,email,form,result;
            
        pass=document.getElementById("new_password").value;
        user=document.getElementById("new_usuario").value;
        email=document.getElementById("new_email").value;
        if(user != '' && pass != ''){
            form = 'new_usuario='+user+'&new_password='+pass+'&new_email='+email;
            
            connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            connect.onreadystatechange = function(){
                if(connect.readyState == 4 && connect.status == 200){
                        alert("coneccion buena");
                    if(parseInt(connect.responseText) == 1){
                            alert("Usuario registrado con exito");
                            location.href =  '?view=login';
                        }
                        if(parseInt(connect.responseText) == 2){
                                alert("El nombre o email ya existe");
                                $('#snipper_registro').hide();
                                $('#form_registro').show();
                                $('#btn_registrar').show();
                        }
                        if(parseInt(connect.responseText) == 3){
                                alert("no se agrego");
                                $('#snipper_registro').hide();
                                $('#form_registro').show();
                                $('#btn_registrar').show();
                        }
                        if((parseInt(connect.responseText) != 3)&&(parseInt(connect.responseText) != 2)&&(parseInt(connect.responseText) != 1)){
                            alert("error de mierda");
                            $('#snipper_registro').hide();
                            $('#form_registro').show();
                            $('#btn_registrar').show();
                        }
                        
                    } else if (connect.readyState != 4){
                       
                }
            }   
            connect.open('POST','?view=usuario',true);
            connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            connect.send(form);
        } else {
            alert("datos vacios no permitidos"); 
            $('#snipper_registro').hide();
            $('#form_registro').show();
            $('#btn_registrar').show();
        }
            
        
        }
    }  
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
