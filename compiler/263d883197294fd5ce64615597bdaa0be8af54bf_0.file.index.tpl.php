<?php
/* Smarty version 3.1.30, created on 2017-11-27 02:41:48
  from "C:\xampp\htdocs\phpface\estilos\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a1b6d5cc2ca52_39974558',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '263d883197294fd5ce64615597bdaa0be8af54bf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpface\\estilos\\templates\\index.tpl',
      1 => 1511746900,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:over/header.tpl' => 1,
    'file:over/footer.tpl' => 1,
  ),
),false)) {
function content_5a1b6d5cc2ca52_39974558 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:over/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body>
<div class="container">

    <div class="row">
                <div class="col s12 l12 m12">
                    <nav>
                        <?php if (isset($_SESSION['usuario'])) {?>
                            <p><?php echo $_SESSION['usuario'];?>
</p>
                        <?php } else { ?>
                            <a href='?view=login'>Iniciar Sesion</a>
                        <?php }?>
                  </nav>
                </div>
      </div>

    <div class="row">


              <div id="izquierdo" class="col l2" class="card-panel teal lighten-2">
                  <section>
                    <a id="btn_actualizar" class="waves-effect waves-light btn menu_izquierdo">ACTUALIZAR</a>

                    <a id="nuevo_post" class="waves-effect waves-light btn menu_izquierdo" href="#nuevo_posteo">POST</a>
                    </section>
              </div>


              <div id="cuerpo" class="col l10" >
                <p id="btn_guardar_publicar"></p>
                <p id="tostador" class="card-panel teal lighten-2">Bienvenido
                        <?php if (isset($_SESSION['usuario'])) {?>
                            <?php echo $_SESSION['usuario'];?>

                            gracias por ingresar a nuestro sitio web, que te diviertas.!!!
                        <?php } else { ?>
                            No has iniciado sesion por lo que no podras disfrutar de nuestro contenido
                            <br>Por favor inicia sesion o registrate <a href='?view=login'>Iniciar Sesion</a>
                        <?php }?>
                  </p>
                    <section class="card-panel teal lighten-2">
                          <span  id="resultado">

                          </span>
                    </section>
              </div>
     </div>
  </div>


  <!-- MODAL NUEVO POST -->
    <div  id="nuevo_posteo" class="modal" class="blue-grey darken-1">
                        <div class="modal-content" class="blue-grey darken-1">
                            <div class='card blue-grey darken-1'>
                            <h4 id="titulo_editando" class="blue-text center-align" style="margin-top:25px;">Nueva Publicacion</h4>
                            <br>
                                	<div class="row">
                              		      <input placeholder="Titulo.." id="titulo" type="text">
                                	    	<input placeholder="Descripcion" id="descripcion" type="text">
                                        <section>
                                        <div class="col m6 s5 l6">
                                          <a id="btn_drop_usr" class='dropdown-button btn' href='#' data-activates='lst_usr'>Post a nombre de..</a>
                                        </div>
                                        <div class="col m6 s5 l6" style="color: white;">
                                          <p>Autor: </p><p id="autor_nombre"></p><p id="autor_id"></p>
                                        </div>

                                              <ul id='lst_usr' class='dropdown-content'>

                                              </ul>

                                        </section>

                                	</div>
                                    <form style="color: white;" id="uploadimage" action="" method="post" enctype="multipart/form-data">
                                        <input type="file" name="file" id="fileajax" />
                                        <div id="img_ajax"></div>
                                        <p id="nombreimgoculto"></p>
                                    </form>
                                    



                                    <div class="col l5 center-align">
                                        <button onClick="this.form.reset()" type="submit" class="btn waves-effect waves-light blue" id="btn_post">Publicar</button>
                                    </div>
                                </div>
                            </div>
                        </div>



<!-- MODAL COMENTAR -->
                      <div id="nuevo_comentario" class="modal">
                                  <div class="modal-content">
                                      <h4 class="blue-text center-align" style="margin-top:25px;">COMENTAR</h4>
                                      <br>
                                                <div class="row">
                                                        <p id="postidoculto"> </p>
                                                        <textarea placeholder="Descripcion" id="descripcion_comentario"></textarea>
                                                    <div class="col l5 center-align">
                                                        <button type="submit" class="btn waves-effect waves-light blue" id="btn_comentar">Enviar</button>
                                                    </div>
                                                </div>
                                            </div>

                        </div>
<?php echo '<script'; ?>
 type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/materialize.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/moment.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="js/botones.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    //IMAGEN CUANDO SELECCIONO
            $("#fileajax").on('change',function() {
            var formData = new FormData($("#uploadimage")[0]);
                    var ruta = "functions/subir_img_ajax.php";
                    $.ajax({
                        url: ruta,
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(datos)
                        {
                            $("#img_ajax").html("<img class='responsive-img' src='img/"+datos+"'</img>");
                            $("#nombreimgoculto").html("img/"+datos);
                        }
                    });
            });
    //BOTON ACTUALIZAR
            document.getElementById("btn_actualizar").onclick = function(){
            connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            connect.onreadystatechange = function(){
                if(connect.readyState == 4 && connect.status == 200){
                    if(connect.responseText){
                        $("#tostador").html("Actualizado..!!");
                        $("#resultado").html(connect.responseText);
                    } else {
                        alert("ERROR GETPOST");
                    }

                } else if (connect.readyState != 4){

                }
            }   
            connect.open('POST','?view=publicacion',true);
            connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            connect.send();
            }
    //BOTON NUEVO POST
            document.getElementById("nuevo_post").onclick = function(){
                $('#nombreimgoculto').html("");
                $("#titulo_editando").html("NUEVO POST");
                $("#btn_post").html("PUBLICAR");
                $(".modal-content input").val("");
                $(".modal-content #img_ajax").html(""); 
            }
    //BOTON DENTRO DEL MODAL INSERTAR POST
            document.getElementById("btn_post").onclick = function(){
                var titulo1=document.getElementById("titulo").value;        
                var descripcion1=document.getElementById("descripcion").value;
                var nombreimgoculto=document.getElementById("nombreimgoculto").innerHTML;
                
                if(nombreimgoculto===""){
                    nombreimgoculto="img/vacio.jpg";
                }
                
                var myDate =  moment(new Date()).format("YYYY-MM-DD HH:mm:ss");
                
                var array_form=("prm_nom_img="+nombreimgoculto+"&prm_titulo="+titulo1+"&prm_desc="+descripcion1+"&prm_fecha="+myDate);
                alert(array_form);
                
                   
            } 
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:over/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
