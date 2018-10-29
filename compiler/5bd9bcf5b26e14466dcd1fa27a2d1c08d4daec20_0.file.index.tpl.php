<?php
/* Smarty version 3.1.30, created on 2017-12-20 22:04:16
  from "E:\Server\phpblog\estilos\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a3ad050def894_22875309',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5bd9bcf5b26e14466dcd1fa27a2d1c08d4daec20' => 
    array (
      0 => 'E:\\Server\\phpblog\\estilos\\templates\\index.tpl',
      1 => 1513739594,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:over/header.tpl' => 1,
    'file:over/footer.tpl' => 1,
  ),
),false)) {
function content_5a3ad050def894_22875309 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:over/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body>
<div class="container">

    <div class="row">
                <div class="col s12 l12 m12">
                    <nav>
                        <?php if (isset($_SESSION['usuario'])) {?>
                            <div class="col l10">
                                <h4><?php echo $_SESSION['usuario'];?>
</h4>
                            </div>
                            <div class="col l2">
                                <a href='?view=login'>Cerrar Sesion</a>
                            </div>
                            
                        <?php } else { ?>
                            <a href='?view=login'>Iniciar Sesion</a>
                        <?php }?>
                  </nav>
                </div>
      </div>

    <div class="row">


              <div id="izquierdo" class="col l2" class="card-panel teal lighten-2">
                  <?php if (isset($_SESSION['usuario'])) {?>
                   <section>
                      
                    
                     
                    <div id="profile-picture">
                        
                        <form style="color: white;" id="uploadavatar" action="" method="post" enctype="multipart/form-data">
                            
                                <label for="file-input" onmouseover="show_btn_load()" id="btn_load_avatar"><i class="material-icons">add_a_photo</i></label>

                                 <input id="file-input" type="file" name="avatar"/>
                                
                                <div id="img_avatar">
                                    <img id="avatar" onmouseout="hide_btn_load()" onmouseover="show_btn_load()" class="responsive-img" src="img/vacio.jpg">
                                </div>
                                <p id="nombreavataroculto"></p>
                            
                        </form>
                        
             
                    </div>
                        <button id="btn_save_avatar">Guardar</button>
                      
                      
                      
                    
                    <a id="btn_actualizar" class="waves-effect waves-light btn menu_izquierdo">ACTUALIZAR</a>

                    <a id="nuevo_post" class="waves-effect waves-light btn menu_izquierdo" href="#nuevo_posteo">POST</a>
                    </section>         
                        <?php } else { ?>
                            
                        <?php }?>
                  
              </div>


              <div id="cuerpo" class="col l10 push-l2" >
                <p id="postidoculto"></p>
                <p id="tostador" class="card-panel">Bienvenido
                        <?php if (isset($_SESSION['usuario'])) {?>
                            <a style="color:red;"><?php echo $_SESSION['usuario'];?>
</a>
                            gracias por ingresar a nuestro sitio web, que te diviertas.!!!
                        <?php } else { ?>
                            No has iniciado sesion por lo que no podras disfrutar de nuestro contenido
                            <br>Por favor inicia sesion o registrate <a href='?view=login'>Iniciar Sesion</a>
                        <?php }?>
                  </p>
                  
                      <div id="derecho">
                              <span id="resultado">

                              </span>
                        </div>
                
                    
              </div>
     </div>
  </div>


  <!-- MODAL NUEVO POST -->
    <div  id="nuevo_posteo" class="modal" class="card teal lighten-2">
                        <div class="modal-content" class="card teal lighten-2">
      
                                
                            <h5 id="titulo_editando" class="pink-text center-align" style="margin-top:25px;">Nueva Publicacion</h5>
                                	<div class="row">
                                        
                                        
                                        <div class="col l4">
                                               <input placeholder="Titulo.." id="titulo" type="text">
                                        </div>
                                        <div class="col l8">
                                            <input placeholder="Descripcion" id="descripcion" type="text">
                                        </div>
                                    </div>
                            
                                    <div class="row">
                                        
                                        
                                        <div class="col l6">
                                               <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                                                   <label for="fileajax"><i class="material-icons">add_a_photo</i></label>
                                            <input type="file" name="file" id="fileajax" />
                                            <div id="img_ajax"></div>
                                            <p id="nombreimgoculto"></p>
                                        </form>
                                        </div>
                                        <div class="col l6">
                                            
                                            <a id="btn_drop_usr" class='dropdown-button' href='#' data-activates='lst_usr'>Publicar como.. <i class="material-icons">arrow_drop_down</i></a>
                                          <ul id='lst_usr' class='dropdown-content'></ul>
                                    
                                          <p id="autor_nombre"><?php echo $_SESSION['usuario'];?>
</p><p id="autor_id"></p>
                                            <button onClick="this.form.reset()" type="submit" class="btn waves-effect" id="btn_post">Publicar</button>
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
    

<div id="Fullscreen">
    <img src="" alt="" />
</div>
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
 type="text/javascript" src="js/moment.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/botones.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
            $(document).ready(function(){
                 //your code for stuff should go here
                 //$('#Fullscreen').css('height', $(document).outerWidth() + 'px');
                 //for when you click on an image
                 $('.myImg').click(function(){
                     alert("click");
                     //var src = $(this).attr('src'); //get the source attribute of the clicked image
                     //$('#Fullscreen img').attr('src', src); //assign it to the tag for your fullscreen div
                     //$('#Fullscreen').fadeIn();
                 });
                 //$('#Fullscreen').click(function(){
                    // $(this).fadeOut(); //this will hide the fullscreen div if you click away from the image. 
                 //});
            });
        <?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 type="text/javascript"> 
                $(document).ready(function(){
                            $.ajax({
                                    data: { traer_url: true },
                                    url:   '?view=login', //archivo que recibe la peticion
                                    type:  'post', //método de envio
                                    success:  function (response) {
                     
                                        $("#img_avatar").html("<img id='avatar' onmouseout='hide_btn_load()' onmouseover='show_btn_load()' class='responsive-img' src='"+response+"'</img>");
                                    }
                    
                            });
                    });
            <?php echo '</script'; ?>
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
          
            function actualizar(){
                    $('#tostador').hide();
                    connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    connect.onreadystatechange = function(){
                    if(connect.readyState == 4 && connect.status == 200){
                        if(connect.responseText){
                            $("#resultado").html(connect.responseText);
                            $('.collapsible').collapsible();
                            
                            //SCRIPT PARA AMPLIAR IMAGENES TOMADO DE STACKOVERFLOW
                            //your code for stuff should go here
                            //$('#Fullscreen').css('height', $(document).outerWidth() + 'px');
                            //for when you click on an image
                            $('.myImg').click(function(){
                                var src = $(this).attr('src'); //get the source attribute of the clicked image
                                $('#Fullscreen img').attr('src', src); //assign it to the tag for your fullscreen div
                                $('#Fullscreen').fadeIn();
                            });
                            $('#Fullscreen').click(function(){
                                $(this).fadeOut(); //this will hide the fullscreen div if you click away from the image. 
                            });
       
                            Materialize.toast("Muro Actualizado", 4000,'pink rounded');
                            } else {
                                Materialize.toast("Actualizar ERROR", 4000,'pink rounded');
                            }

                        } else if (connect.readyState != 4){

                        }
                    }   
                connect.open('POST','?view=publicacion',true);
                connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                connect.send();
             
            }
      document.getElementById("btn_actualizar").addEventListener("click", actualizar);
            
    //BOTON NUEVO POST
            document.getElementById("nuevo_post").onclick = function(){
                $('#nombreimgoculto').html("");
                $('#postidoculto').html("");
                $("#autor_id").html("");
                $("#autor_nombre").html("<?php echo $_SESSION['usuario'];?>
");
                $("#titulo_editando").html("Nueva Publicacion");
                $("#btn_post").html("Publicar");
                $(".modal-content input").val("");
                $(".modal-content #img_ajax").html("");
                $("#img_ajax").html("<img class='responsive-img' src='img/vacio.jpg'</img>");
            }
    //BOTON DENTRO DEL MODAL INSERTAR POST
            document.getElementById("btn_post").onclick = function(){
                var titulo1=document.getElementById("titulo").value;        
                var descripcion1=document.getElementById("descripcion").value;
                var nombreimgoculto=document.getElementById("nombreimgoculto").innerHTML;
                var postid = document.getElementById("postidoculto").innerHTML;
                var autor = document.getElementById("autor_id").innerHTML;
                //alert(postid); //CON ESTO SE SI ES UN INSERT O UPDATE YA QUE EL INSERT NO NECESITA POSTID
                if(nombreimgoculto===""){
                    nombreimgoculto="img/vacio.jpg";
                }
                
                var myDate =  moment(new Date()).format("YYYY-MM-DD HH:mm:ss");
                if(postid==""){
                  var array_form=("prm_autor="+autor+"&prm_nom_img="+nombreimgoculto+"&prm_titulo="+titulo1+"&prm_desc="+descripcion1+"&prm_fecha="+myDate);  
                }else{
                    var array_form=("prm_autor="+autor+"&prm_nom_img="+nombreimgoculto+"&prm_titulo="+titulo1+"&prm_desc="+descripcion1+"&prm_fecha="+myDate+"&postid="+postid);
                }
                
                connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    connect.onreadystatechange = function(){
                    if(connect.readyState == 4 && connect.status == 200){
                        if(connect.responseText){
                            Materialize.toast(connect.responseText, 4000,'pink rounded');
                            actualizar();
                            } else {
                                Materialize.toast("Publicar ERROR", 4000,'pink rounded');
                            }

                        } else if (connect.readyState != 4){

                        }
                    }   
                connect.open('POST','?view=publicacion',true);
                connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                connect.send(array_form);
                
                   
            } 
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:over/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
