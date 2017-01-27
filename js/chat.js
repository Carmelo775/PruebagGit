$(function(){
  $('body').delegate('.enviar-mensaje', 'keydown', function(e){

    var campo = $(this);

    var mensaje = $(this).val();
    var para = $(this).attr('id');

    if(e.keyCode == 13){

      if(mensaje != ""){
        $.post('../Controlador/Ejecutar.php',{
          mensaje: mensaje,
          para: para,
          Insertar_msj: 1
        }, function(retorno){
            $('#ventana_'+para+' ul.listar').append(retorno);
            campo.val('');
        });

      }
    }
  });
});
