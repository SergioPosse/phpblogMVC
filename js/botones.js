$(document).ready(function(){
    $('.modal').modal();
    $("#autor_id").hide();
    
    $('.collapsible').collapsible();

    //efectos prediseñados de loading
    $('#snipper_login').hide();
    $('#snipper_registro').hide();

    $('#btn_login').click(function(){
        $('#snipper_login').show();
        $('#form_login').hide();
        $('#btn_login').hide();

      });
    $('#btn_registrar').click(function(){
        $('#snipper_registro').show();
        $('#form_registro').hide();
        $('#btn_registrar').hide();
      });


    //para cerrar los modal de materialize con el click "submit"
    $('#btn_post').click(function(){
        $('#nuevo_posteo').modal('close');
    });

    $('#btn_comentar').click(function(){
        $('#nuevo_comentario').modal('close');
    });
    //profilepicture
    $('#btn_save_avatar').hide();
    $('#btn_load_avatar').hide();
    $('#nombreavataroculto').hide();

    
});


function editar(elemento){//ME CARGA EL FORM ON LOS DATOS RECUPERADOS DE UN POST PERO NO HACE EL UPDATE
    var postid= elemento.dataset.id;//PARA EL UPDATE ES OTRO AJAX
    $("#postidoculto").html(postid);
    $("#postidoculto").hide();
    $("#autor_id").html("");
    var connect = new XMLHttpRequest();
    connect.onreadystatechange = function()
    {

            if (this.readyState == 4 && this.status == 200)
            {
                    var myObj = jQuery.parseJSON(connect.responseText);
                    //alert(myObj);
                    //alert(myObj[0]['titulo']);
                    $(".modal-content #titulo").val(myObj[0]['titulo']); //DE NUEVO PONGO LA RUTA COMPLETA DEL MODAL EN EL SELECT DE //JQUERY PARA QUE ME RECONOZCA, ADEMAS TENGO QUE USAR ESPECIFICAMENTE EL METODO VAL PARA SETEAR DE NUEVO EL //CONTENIDO DEL ELEMENTO
                    $(".modal-content #descripcion").val(myObj[0]['desc']);
                    $("#postidoculto").html(myObj[0]['id']);
                    $("#img_ajax").html("<img class='responsive-img' src='"+myObj[0]['url']+"'</img>");
                    $("#nombreimgoculto").html(myObj[0]['url']);
                    //alert("nombreimgoculto ahora vale: "+ myObj[0]['url']);
                    $("#titulo_editando").html("EDITAR POST");
                    $("#btn_post").html("GUARDAR");
            }
    };

    connect.open('POST', '?view=publicacion', true);
    connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    connect.send("postidcargar=" + postid);
}


function borrar(elemento){
    
               // alert(variable);

            var opcion = confirm("Seguro que desea borrar la publicacion?");
            if (opcion == true)
            { 
                var myDate =  moment(new Date()).format("YYYY-MM-DD HH:mm:ss");
                var variable= elemento.dataset.id;

            form = 'postidborrar='+variable+'&fecha='+myDate;
            
            connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            connect.onreadystatechange = function(){
                if(connect.readyState == 4 && connect.status == 200){
                    if(parseInt(connect.responseText) == 1){
                        Materialize.toast("Borrado exitoso", 4000,'pink rounded');
                        actualizar();
                        
                    } else {
                        Materialize.toast("Borrado ERROR", 4000,'pink rounded');
                    
                    }

                } else if (connect.readyState != 4){

                }
            }   
            connect.open('POST','?view=publicacion',true);
            connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            connect.send(form);  
                
            }
            else
            {

            }
    }
function cargar_usuarios(){
         $.ajax({
                        data: {},
                        url:   'functions/get_usuarios.php', //archivo que recibe la peticion
                        type:  'post', //método de envio
                        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                $("#lst_usr").html(response);
                        }
                });
      }

function borrar_comentario(elemento){
        var opcion = confirm("Seguro que desea borrar la el comentario?");
        if (opcion == true)
        {
            var id_comentario = elemento.dataset.id;

            $.ajax({
                           data:{comentarioid: id_comentario},
                           url: '?view=comentario',
                           type:  'post',
                           success:  function (response) {
                                Materialize.toast("Comentario Eliminado", 4000,'pink rounded');
                               actualizar();
        
                           }
                   });
         }
         else {

         }
      }

function setear_autor(elemento){
    var id_autor = elemento.dataset.id;
    var nombre_usuario = elemento.dataset.nombre;
    $("#autor_id").html(id_autor);
    $(".modal-content #autor_nombre").html(nombre_usuario);
}

function comentar(elemento){
    var variable= elemento.dataset.id;
    $("#postidoculto").html(variable);
    $("#postidoculto").hide();
    setTimeout(function() {
    $('#descripcion_comentario').focus();
    }, 0);
}

function enviar_comentario(){
    var valoridpost= document.getElementById("postidoculto").innerHTML;
    var desc= document.getElementById("descripcion_comentario").value;
                $.ajax({
                        data: {postid: valoridpost, descripcion: desc},
                        url:   '?view=comentario', //archivo que recibe la peticion
                        type:  'post', //método de envio
                        success:    function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                            Materialize.toast("Comentario exitoso", 4000,'pink rounded');
                            actualizar();

                                    }
                 });
    $(".modal-content textarea").val("");

}

//IMAGEN AVATAR
    document.getElementById("btn_save_avatar").onclick = function(){
        
       $('#btn_save_avatar').hide();
        var url_avatar= document.getElementById("nombreavataroculto").innerHTML;
        $.ajax({
                        data:{url_avatar: url_avatar},
                        url:   '?view=usuario', //archivo que recibe la peticion
                        type:  'post', //método de envio
                        success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                                 Materialize.toast(response, 4000,'pink rounded')
                        }
                });
    }
    function show_btn_load(){
            $('#btn_load_avatar').show();

    }
    function hide_btn_load(){
            $('#btn_load_avatar').hide();
    }
     $("#file-input").on('change',function() {
            var formData = new FormData($("#uploadavatar")[0]);
                    var ruta = "functions/subir_avatar.php";
                    $.ajax({
                        url: ruta,
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(datos)
                        {
                            $("#img_avatar").html("<img id='avatar' onmouseout='hide_btn_load()' onmouseover='show_btn_load()' class='responsive-img' src='img/"+datos+"'</img>");
                            
                            $("#nombreavataroculto").html("img/"+datos);
                            
                            $('#btn_save_avatar').show();
                        }
                    });
            });


document.getElementById("btn_comentar").addEventListener("click", enviar_comentario);
document.getElementById("btn_drop_usr").addEventListener("click", cargar_usuarios);