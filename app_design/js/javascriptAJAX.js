//alert("olis");
function cargarProyectoCliente(){
  $.ajax({
    type: 'POST',
    url: 'mantenimientoAJAX.php',
    data: { 
      key: 'cargarProyectoClientes', 
      cliente: document.getElementById('NombreClienteAJAX').value 
    }
  }).done(function( datos ) {
    $("#ProyectoClienteAjax").selectpicker();
    $("#ProyectoClienteAjax").html(datos);
    $('#ProyectoClienteAjax').selectpicker('refresh');
  }).fail(function (jqXHR, textStatus, errorThrow){
    alert("Error al ingresar");
  });    
}
function cargarOTCliente(){
  $.ajax({
    type: 'POST',
    url: 'mantenimientoAJAX.php',
    data: { 
      key: 'cargarOTCliente', 
      cliente: document.getElementById('NombreClienteAJAX').value ,
      proyecto: document.getElementById('ProyectoClienteAjax').value 
    }

  }).done(function( datos ) {
    $("#OrdenDeTrabajoAJAX").selectpicker();
    $("#OrdenDeTrabajoAJAX").html(datos);
    $('#OrdenDeTrabajoAJAX').selectpicker('refresh');
  }).fail(function (jqXHR, textStatus, errorThrow){
    alert("Error al ingresar");
  });    
}
