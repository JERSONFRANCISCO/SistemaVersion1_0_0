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

      $("#OrdenDeTrabajoAJAX").selectpicker();
      $("#OrdenDeTrabajoAJAX").html("");
      $('#OrdenDeTrabajoAJAX').selectpicker('refresh');
    //$(this).val("");

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

function cargarTareasWF(){
  $.ajax({
    type: 'POST',
    url: 'mantenimientoAJAX.php',
    data: { 
      key: 'cargarTareasWF', 
      NombreWFAJAX: document.getElementById('NombreWFAJAX').value
    }
  }).done(function( datos ) {
    $("#tablaTareas tbody").html(datos);
  }).fail(function (jqXHR, textStatus, errorThrow){
    alert("Error al ingresar");
  }); 
}

function cargarOpcionesMenu(cb,tarea){
  var estado="";
  if($(cb).is(':checked')){
   estado='A';
 }else{
   estado='I';
 }

 $.ajax({
  type: 'POST',
  url: 'mantenimientoAJAX.php',
  data: { 
    key: 'actualizaEstadoPermiso', 
    EstadoMenu: estado,
    CodigoTarea: tarea
  }
}).done(function( datos ) {
}).fail(function (jqXHR, textStatus, errorThrow){
  alert("Error al realizar accion");
}); 

}

function cargarOpcionesMenuGrupo(){
  //alert(document.getElementById('GrupoNombre').value);
  $.ajax({
    type: 'POST',
    url: 'mantenimientoAJAX.php',
    data: { 
      key: 'cargarOpcionesMenu', 
      GrupoNombre: document.getElementById('GrupoNombre').value
    }
  }).done(function( datos ) {
    $("#tablaTareas tbody").empty;
    $("#tablaTareas tbody").html(datos);
  }).fail(function (jqXHR, textStatus, errorThrow){
    alert("Error al ingresar");
  }); 

}