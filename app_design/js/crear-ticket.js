
function agregarFila_Tareas() {
  var tareaTitulo=document.getElementById("tareaTitulo").value;
  var tareaDescripcion=document.getElementById("tareaDescripcion").value;
  var tareaDepartamento=document.getElementById("tareaDepartamento").value;
  var tareaUsuario=document.getElementById("tareaUsuario").value;
  var tareaMinutos=document.getElementById("tareaMinutos").value;
  var tareaHoras=document.getElementById("tareaHoras").value;

  if(tareaTitulo.length>0){
    if(tareaDescripcion.length>0){
      if(tareaDepartamento.length>0){
        if(tareaUsuario.length>0){
          if(tareaMinutos.length>0){
            if(tareaHoras.length>0){
              var totalIngresos=document.getElementsByName("totalDeTareas")[0].innerHTML;
              var siguienteColumna = (parseInt(totalIngresos)+1)
              document.getElementsByName("totalDeTareas")[0].innerHTML= (parseInt(totalIngresos)+1);
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
 var htmlTags = 
 '<tr id=fila'+id+'>'+
 '<td>' + id + '</td>'+
 '<td>' + tareaTitulo + '</td>'+
 '<td>' + tareaDescripcion + '</td>'+
 '<td>' + TareaDepartamento + '</td>'+
 '<td>' + tareaUsuario + '</td>'+
 '<td>' + tareaHoras + '</td>'+
 '<td>' + tareaMinutos + '</td>'+
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