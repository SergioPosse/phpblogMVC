<?php
/* Smarty version 3.1.30, created on 2017-11-26 15:15:38
  from "C:\xampp\htdocs\phpface\estilos\templates\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a1acc8a8750c2_41217217',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '690e4bfe89a3408783f7c17f691bda165f6ca43d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpface\\estilos\\templates\\login.tpl',
      1 => 1511705733,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a1acc8a8750c2_41217217 (Smarty_Internal_Template $_smarty_tpl) {
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
          <div class="col s10 offset-s1 center-align">
              <div class="row>">
                      <div class="col l12 s12 m12"> <img class="responsive-img" src="img/login.png">
                      </div>
                      <div class="col l6 m6 s6 center-align push-l2">
                          <a class=" waves-effect waves-light  btn  red" href="#modal1">Iniciar </a>
                      </div>
                      <div class="col l6 m6 s6 center-align pull-l2">
                          <a class=" waves-effect waves-light  btn  red" href="#modal2">No tiene cuenta?. </a>
                      </div>
              </div>

          <div id="modal1" class="modal">
              <div class="container">
                        <div class="modal-content">
                            <h4 class="blue-text center-align" style="margin-top:25px;">Iniciar sesion.</h4>
                            </br>
                                <form class="col l12" id="form1">
                                	<div class="row">
                                  		<div class="input-field">
                                         <i class="material-icons prefix red-text">account_circle</i>
                                  		   <input placeholder="Ingresa tu usuario" id="usuario" class="id" name="usuario" type="text">
                                  		</div>
                                  		<div class="input-field">
                                         <i class="material-icons prefix  red-text">lock</i>
                                  	    	<input placeholder="Ingresa tu password" id="password" name="password" class="password " type="password">
                                  		</div>
                                	</div>
                        </div>
                        <div class="spinner" id="snipper">
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
                     </form>
              </div>
        </div> <!-- fin del modal 1 -->

        <div id="modal2" class="modal">
            <div class="container">
                      <div class="modal-content">

                          <h4 class="blue-text center-align" style="margin-top:25px;">Registrar Nuevo Usuario</h4>
                          </br>
                              <form class="col l12" id="form2">
                                  <div class="row">
                                          <div class="input-field">
                                             <i class="material-icons prefix red-text">account_circle</i>
                                             <input placeholder="Ingresa tu usuario" id="usuario" class="id" name="usuario" type="text">
                                          </div>
                                          <div class="input-field">
                                             <i class="material-icons prefix  red-text">lock</i>
                                              <input placeholder="Ingresa tu password" id="password" name="password" class="password" type="password">
                                          </div>
                                          <div class="input-field">
                                             <i class="material-icons prefix  red-text">email</i>
                                      	    	<input placeholder="Ingresa tu email" id="email" name="email" class="email" type="text">
                                      		</div>
                                    </div>
                      </div>
                      <div class="spinner" id="snipper2">
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
                   </form>
            </div>
      </div><!-- fin del modal 2 -->
</div><!-- fin del container principal-->
<?php echo '<script'; ?>
 type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/materialize.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/botones.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    window.onload = function(){
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
    }  
<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
