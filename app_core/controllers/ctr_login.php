<?php

require_once(__MDL_PATH . "mdl_ticket.php");
class ctr_ticket{
	private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_ticket();
		}

	}

	?>