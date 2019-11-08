//$(document).ready(function () {
 // $('#botonAgregarTarea').click(function(){
    //alert($("#numeroDeTareas").val());
 // });
//});
/*
  Esta funcion lo que hace es agregar en la tabla de tareas una fila la cual indica que es una tarea la cual se va a guardar en la 
  base de datos
  */
  function agregarFila_Tareas() {
    var tareaTitulo=document.getElementById("tareaTitulo").value;
    var tareaDescripcion=document.getElementById("tareaDescripcion").value;
    var tareaDepartamento=document.getElementById("tareaDepartamento").value;
    var tareaUsuario=document.getElementById("tareaUsuario").value;
    var tareaMinutos=document.getElementById("tareaMinutos").value;
    var tareaHoras=document.getElementById("tareaHoras").value;
    if(tareaTitulo.length>0){
      if(tareaDescripcion.length>0){
      //if(tareaDepartamento.length>0){
        //if(tareaUsuario.length>0){
          if(tareaMinutos.length>0){
            if(tareaHoras.length>0){
             var siguienteColumna =  masAlto();
         agregarFila(siguienteColumna,tareaTitulo,tareaDescripcion,tareaDepartamento,tareaUsuario,tareaHoras,tareaMinutos);
         limpiarCampostexto();
         
       }else{
        alert("Agregar horas");
      }
    }else{
      alert("Agregar minutos");
    }
      //}else{
        //alert("Agregar usuario");
      //}
   // }else{
     // alert("Agregar departamento");
    //}
  }else{
    alert("Agregar descripción");
  }
}else{
  alert("Agregar título");
}
}

/*
  aagrega los elementos necesarios para que la fila se muestre en la tabla correctamente 
  */
  function agregarFila(id,tareaTitulo,tareaDescripcion,TareaDepartamento,tareaUsuario,tareaHoras,tareaMinutos) {
   var style='';
   if(id%2==0){
    //style='background: aliceblue;'
  }
  var htmlTags = 
  '<tr id=fila'+id+'  style = "'+style+'"">'+
  '<td> <input  name="tareaid' + id + '" type="text" value="'+id+'" style="display: none;">' + id + '</td>'+
  '<td> <input  name="tareatareaTitulo' + id + '" type="text" value="'+tareaTitulo+'" style="display: none;">' + tareaTitulo + '</td>'+
  '<td> <input  name="tareatareaDescripcion' + id + '" type="text" value="'+tareaDescripcion+'" style="display: none;">' + tareaDescripcion + '</td>'+
  '<td> <input  name="tareaTareaDepartamento' + id + '" type="text" value="'+TareaDepartamento+'" style="display: none;">' + TareaDepartamento + '</td>'+
  '<td> <input  name="tareatareaUsuario' + id + '" type="text" value="'+tareaUsuario+'" style="display: none;">' + tareaUsuario + '</td>'+
  '<td> <input  name="tareatareaHoras' + id + '" type="text" value="'+tareaHoras+'" style="display: none;">' + tareaHoras + '</td>'+
  '<td> <input  name="tareatareaMinutos' + id + '" type="text" value="'+tareaMinutos+'" style="display: none;">' + tareaMinutos + '</td>'+
  '<td>' + '<a class="btn btn-danger" onclick="borrarFila('+id+')" ><i class="icon_close_alt2"></i></a>' + '</td>'+
  '</tr>';

  $('#tablaTareas tbody').append(htmlTags);
} 

/*
  funcion jquery que borra una fila del elemento de la tabla
  */
  function borrarFila(id){
   $("#fila"+id).remove();
 }

/*
  limpia los campos de texto correspondientes a las tareas que se van a ingresar
  */
  function limpiarCampostexto(){
    document.getElementById("tareaTitulo").value="";
    document.getElementById("tareaDescripcion").value="";
    document.getElementById("tareaMinutos").value="0";
    document.getElementById("tareaHoras").value="0";
  }

  function masAlto(){
    var mayor = 0;
    $('#tablaTareas tr').each(function() {
      var customerId = $(this).find("td").eq(0).text();  
      if(customerId.trim() > mayor){
        mayor = customerId.trim();
      }
    //  alert(customerId);
   /*   if(valor0.trim()==customerId.trim()){
        encontrado = true;
      }*/
    });

    return  parseInt(mayor)+1;
  }