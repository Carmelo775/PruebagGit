$(document).ready(function(){

//Agregar Ventanas de chat
  function addVentanas(id,user){

    var ventana_html = '<div class="ventana" id="ventana_'+id+'"><div class="nombre_usuario" id="'+id+'"><span>'+user+'</span><a href="javascript:void(0);" class="cerrar" id="cerrar">X</a></div><div id="cuerpo-chat"><div class="mensaje"><ul class="listar id="listar"></ul></div><input type="text" placehoder="Escribe tu mensaje" class="enviar-mensaje" id="'+id+'" /></div></div>';
    $('#ventanas').append(ventana_html);
    chatAbajo();

        //Cerrar ventana de chat
   
        $('.cerrar').on('click', function(){

         var id = $(this).parent().attr('id');
         var parent = $(this).parent().parent().hide();

          $('#contactos a#'+id+'').addClass('contactos');
        });

  }

//Al hacer click en contactos se activa la funcion que agrega las ventanas
  $('.contactos').on('click', function(){

    var id = $(this).attr('id');
    var user = $(this).attr('name');
    addVentanas(id,user);
    setInterval(function(){chat(id)}, 1000); 
    $(this).removeClass('contactos');
    return false;

  });

//Funcion para minimizar o aparcer la ventana del chat
  $('body').delegate(".nombre_usuario", 'click', function(){
    var padre = $(this).parent();
    var hijo = $(this);

      if(padre.children('#cuerpo-chat').is(':hidden')){

        hijo.removeClass('fixar');
        padre.children('#cuerpo-chat').toggle(100);
      }else{
        hijo.addClass('fixar');
        padre.children('#cuerpo-chat').toggle(100);
      }

  });

//Conversaciones en tiempo real
  function chat(id){

    $.ajax({

      type: 'POST',
      url: '../Controlador/Ejecutar.php',
      data: {
      id: id,
      MostrarMensajes: 1

    },

    success:function(r){

      $('#ventana_'+id+' ul.listar').html(r);
    }
    });
  }

function chatAbajo(){

  //$(".listar").animate({ scrollTop: $(".listar").height() }, 100);
  $('ul.listar').scrollTop($('ul.listar')[0].scrollHeight);
}
})

