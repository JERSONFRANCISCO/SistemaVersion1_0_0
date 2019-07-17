<?php

require_once(__MDL_PATH . "mdl_login.php");
class ctr_login{
	private $login_exec;

		public function __construct() //CONSTRUCTOR
		{
			$this->login_exec = new mdl_login();
		}
		function login($user, $password){
			$this->login_exec->login(trim($user),trim($password));
			if ($this->login_exec->conn_status) {
				session_name("MYAPP"); 
				session_start();
				$_SESSION['MYAPP']="YES";
				$_SESSION['USR_user']=$this->login_exec->get_USR_user();
				$_SESSION['USR_nombre']=$this->login_exec->get_USR_nombre();
				$_SESSION['USR_img']=$this->login_exec->get_USR_img();
				$_SESSION['USR_correo']=$this->login_exec->get_USR_correo();
				$_SESSION['USR_rol']=$this->login_exec->get_USR_rol();
				echo "<script>location.href='inicio.php';</script>";
			}else{
				$_SESSION['MYAPP']="NO";
				echo "<script>alert('INGRESO INCORRECTAMENTE')</script>";
			}
		}
		function btn_logout_click(){
			if(isset($_GET['login'])){
				if ($_GET['login']="false") {
					$this->login_exec->btn_logout_click();
					echo "<script>location.href='login.php';</script>";
				}
			}
			
		}
	}

	?>