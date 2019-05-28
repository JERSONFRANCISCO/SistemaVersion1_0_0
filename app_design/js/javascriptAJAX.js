/*
  Funciones en jquery que refrescan la información de los combobox mediante el uso 
  de ajax esto para que los cambios se hagan sin refrescar la página
*/
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
// cargar ot del cliente
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
