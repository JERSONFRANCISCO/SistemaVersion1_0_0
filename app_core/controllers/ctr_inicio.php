<?php

require_once(__MDL_PATH . "mdl_departamentos.php");
class ctr_departamentos{
	private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_departamentos();
		}
	}
?>