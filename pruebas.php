<?php
if(isset($_POST['as'])){
    echo $_POST['as'];
}else{
    echo "no";
}
if(isset($_POST['as'])){
    echo $_POST['as'];
}else{
    echo "no";
}
if(isset($_POST['as2'])){
    echo $_POST['as2'];
}else{
    echo "no";
}
if(isset($_POST['as2'])){
    echo $_POST['as2'];
}else{
    echo "no";
}
?>
<form class="form-horizontal " method="POST" action="pruebas.php">
    <table class="table" id="tablaTareas" name="tablaTareas">
        <thead style="background-color: #394a593b;">
          <tr>
            <th>Tarea</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Departamento</th>
            <th>Usuario Asignado</th>
            <th>Horas</th>
            <th>Minutos</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tfoot style="background-color: #394a593b;">
      <tr>
        <th>Tarea</th>
        <th>Título</th>
        <th>Descripción</th>
        <th>Departamento</th>
        <th>Usuario Asignado</th>
        <th>Horas</th>
        <th>Minutos</th>
        <th>Acción</th>
    </tr>
</tfoot>
<tbody>
    <tr>

        <td><input type="text"  id = "as2" name ="as2" value="a" readonly></label></td>
        <td>Título</td>
        <td>Descripción</td>
        <td>Departamento</td>
        <td>Usuario Asignado</td>
        <td>Horas</td>
        <td>Minutos</td>
        <td>Acción</td>

    </tr>
</tbody>
</table>
<button type="submit" class="btn btn-primary btn-lg btn-block">Abrir</button>
</form>