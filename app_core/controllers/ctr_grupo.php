<?php

require_once(__MDL_PATH . "mdl_grupo.php");
class ctr_grupo{
	private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_grupo();
		}
		public function obtener_Objetos()
		{
			return $this->postdata->obtener_Objetos();
		}
		public function insertar_Grupo($Titulo,$Observaciones,$Estado,$Departamento,$Usuario)
		{
			return $this->postdata->insertar_Grupo($Titulo,$Observaciones,$Estado,$Departamento,$Usuario);
		}
		public function actualizar_Grupo($Titulo,$Observaciones,$Estado,$Usuario,$departmento,$grupo)
		{
			return $this->postdata->actualizar_Grupo($Titulo,$Observaciones,$Estado,$Usuario,$departmento,$grupo);
		}
		public function eliminar_Grupo($Titulo,$Observaciones,$Estado,$Usuario,$departmento,$grupo)
		{
			return $this->postdata->eliminar_Grupo($Titulo,$Observaciones,$Estado,$Usuario,$departmento,$grupo);
		}

		public function buscar_Grupo($id)
		{
			return $this->postdata->buscar_Grupo($id);
		}
		public function obtener_Grupos(){
			return $this->postdata->obtener_Grupos();
		}
	}

	?>