//$(document).ready(function () {
 // $('#botonAgregarTarea').click(function(){
    //alert($("#numeroDeTareas").val());
 // });
//});

function agregarFila_Tareas() {
  var tareaTitulo=document.getElementById("tareaTitulo").value;
  var tareaDescripcion=document.getElementById("tareaDescripcion").value;
  var tareaDepartamento=document.getElementById("tareaDepartamento").value;
  var tareaUsuario=document.getElementById("tareaUsuario").value;
  var tareaMinutos=document.getElementById("tareaMinutos").value;
  var tareaHoras=document.getElementById("tareaHoras").value;
/*
  var totalIngresos=document.getElementsByName("totalDeTareas")[0].innerHTML;
  var siguienteColumna = (parseInt(totalIngresos)+1)
  document.getElementsByName("totalDeTareas")[0].innerHTML= (parseInt(totalIngresos)+1);
  agregarFila(siguienteColumna,tareaTitulo,tareaDescripcion,tareaDepartamento,tareaUsuario,tareaHoras,tareaMinutos);
  */

  if(tareaTitulo.length>0){
    if(tareaDescripcion.length>0){
      if(tareaDepartamento.length>0){
        if(tareaUsuario.length>0){
          if(tareaMinutos.length>0){
            if(tareaHoras.length>0){
              var totalIngresos=document.getElementsByName("totalDeTareas")[0].innerHTML;
             var siguienteColumna = (parseInt(totalIngresos)+1)
             $("#numeroDeTareas").val(siguienteColumna);
             document.getElementsByName("totalDeTareas")[0].innerHTML= siguienteColumna;
             agregarFila(siguienteColumna,tareaTitulo,tareaDescripcion,tareaDepartamento,tareaUsuario,tareaHoras,tareaMinutos);
             limpiarCampostexto();
           }else{
            alert("Agregar horas");
          }
        }else{
          alert("Agregar minutos");
        }
      }else{
        alert("Agregar usuario");
      }
    }else{
      alert("Agregar departamento");
    }
  }else{
    alert("Agregar descripción");
  }
}else{
  alert("Agregar título");
}
}


function agregarFila(id,tareaTitulo,tareaDescripcion,TareaDepartamento,tareaUsuario,tareaHoras,tareaMinutos) {
 var style='';
 if(id%2==0){
  style='background-color: #f7f7f7;'
}
var htmlTags = 
'<tr id=fila'+id+'  style = "'+style+'"">'+
'<td> <input id="tareaid' + id + '" name="tareaid' + id + '" type="text" value="'+id+'" style="display: none;">' + id + '</td>'+
'<td> <input id="tareatareaTitulo' + id + '" name="tareatareaTitulo' + id + '" type="text" value="'+tareaTitulo+'" style="display: none;">' + tareaTitulo + '</td>'+
'<td> <input id="tareatareaDescripcion' + id + '" name="tareatareaDescripcion' + id + '" type="text" value="'+tareaDescripcion+'" style="display: none;">' + tareaDescripcion + '</td>'+
'<td> <input id="tareaTareaDepartamento' + id + '" name="tareaTareaDepartamento' + id + '" type="text" value="'+TareaDepartamento+'" style="display: none;">' + TareaDepartamento + '</td>'+
'<td> <input id="tareatareaUsuario' + id + '" name="tareatareaUsuario' + id + '" type="text" value="'+tareaUsuario+'" style="display: none;">' + tareaUsuario + '</td>'+
'<td> <input id="tareatareaHoras' + id + '" name="tareatareaHoras' + id + '" type="text" value="'+tareaHoras+'" style="display: none;">' + tareaHoras + '</td>'+
'<td> <input id="tareatareaMinutos' + id + '" name="tareatareaMinutos' + id + '" type="text" value="'+tareaMinutos+'" style="display: none;">' + tareaMinutos + '</td>'+
'<td>' + '<a class="btn btn-danger" onclick="borrarFila('+id+')" ><i class="icon_close_alt2"></i></a>' + '</td>'+
'</tr>';

$('#tablaTareas tbody').append(htmlTags);
} 
function borrarFila(id){
 $("#fila"+id).remove();
}
function limpiarCampostexto(){
  document.getElementById("tareaTitulo").value="";
  document.getElementById("tareaDescripcion").value="";
  document.getElementById("tareaMinutos").value="";
  document.getElementById("tareaHoras").value="";
}