<?php
if(isset($_POST['Prioridad'])){
	echo $_POST['Prioridad'];
}else{
	echo "no";
}
if(isset($_POST['NombreDepartamento'])){
	echo $_POST['NombreDepartamento'];
}else{
	echo "no";
}

?>