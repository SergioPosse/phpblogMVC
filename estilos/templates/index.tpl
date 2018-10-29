{include 'over/header.tpl'}
<body>
<div class="container">

    <div class="row">
                <div class="col s12 l12 m12">
                    <nav>
                        {if isset($smarty.session.usuario)}
                            <div class="col l10">
                                <h4>{$smarty.session.usuario}</h4>
                            </div>
                            <div class="col l2">
                                <a href='?view=login'>Cerrar Sesion</a>
                            </div>
                            
                        {else}
                            <a href='?view=login'>Iniciar Sesion</a>
                        {/if}
                  </nav>
                </div>
      </div>

    <div class="row">


              <div id="izquierdo" class="col l2" class="card-panel teal lighten-2">
                  {if isset($smarty.session.usuario)}
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
                        {else}
                            
                        {/if}
                  
              </div>


              <div id="cuerpo" class="col l10 push-l2" >
                <p id="postidoculto"></p>
                <p id="tostador" class="card-panel">Bienvenido
                        {if isset($smarty.session.usuario)}
                            <a style="color:red;">{$smarty.session.usuario}</a>
                            gracias por ingresar a nuestro sitio web, que te diviertas.!!!
                        {else}
                            No has iniciado sesion por lo que no podras disfrutar de nuestro contenido
                            <br>Por favor inicia sesion o registrate <a href='?view=login'>Iniciar Sesion</a>
                        {/if}
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
                                    
                                          <p id="autor_nombre">{$smarty.session.usuario}</p><p id="autor_id"></p>
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
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/moment.min.js"></script>
    <script type="text/javascript" src="js/botones.js"></script>
    <script>
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
        </script>
            <script type="text/javascript"> 
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
            </script>
<script type="text/javascript">
    
    
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
                $("#autor_nombre").html("{$smarty.session.usuario}");
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
</script>
{include 'over/footer.tpl'}