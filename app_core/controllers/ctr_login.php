<?php

require_once(__MDL_PATH . "mdl_login.php");
class ctr_login{
	private $login_exec;

		public function __construct() //CONSTRUCTOR
		{
			$this->login_exec = new mdl_login();
		}
		function login($user, $password){
			//echo "<script>alert('cr')</script>";
		//	$username=trim($_POST['txt_user']);
		//	$password=trim($_POST['txt_pssw']);

			$this->login_exec->login(trim($user),trim($password));

			if ($this->login_exec->conn_status) {
				//session_start();
				session_name("MYAPP"); 
				session_start();
				$_SESSION['MYAPP']="YES";
				$_SESSION['USR_user']=$this->login_exec->get_USR_user();
				//echo "<script>alert(".$this->login_exec->get_USR_user().");</script>";
				$_SESSION['USR_nombre']=$this->login_exec->get_USR_nombre();
				$_SESSION['USR_img']=$this->login_exec->get_USR_img();
				$_SESSION['USR_correo']=$this->login_exec->get_USR_correo();
				$_SESSION['USR_rol']=$this->login_exec->get_USR_rol();

				//echo $_SESSION['USR_user'];
				//$_SESSION['USERPHOTO']=$this->login_exec->get_userphoto();

				//header("Location:");
				//echo "<script>$('#login').css('display','none');location.href='login.php';</script>";
				echo "<script>location.href='inicio.php';</script>";
			}else{
				$_SESSION['MYAPP']="NO";
				echo "<script>alert('INGRESO INCORRECTAMENTE')</script>";
				//$this->MSSG->show_message("","warning","fail_auth");
			}
		}
	}

	?>