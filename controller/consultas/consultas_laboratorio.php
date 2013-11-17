<?php
//REALIZA LAS ALTAS Y MODIFICACIONES

require_once '../../model/usuario_interface.php';
require_once '../../model/test_input.php';

if (isset($_POST['action'])){
	//RECOBRAR LOS DATOS POR EL POST
	if ((!isset($_POST['username']))or(!test_input($_POST['username']))
		or (!isset($_POST['password']))or(!test_input($_POST['password']))
		or (!isset($_POST['activo']))or(!test_input($_POST['activo']))
		or (!isset($_POST['rol']))or(!test_input($_POST['rol']))){
			die ('5'); //NO PASA VALIDACION DEL LADO DEL SERVIDOR DATOS INVALIDOS
	}
	
	$username = $_POST['username'];	
	$password = $_POST['password'];	 
	$rol = $_POST['rol'];	
	if ($_POST['activo'] == 'true'){
		$activo = 1;	
	}
	else{
		$activo = 0;	
	}
	$email = $_POST['email'];	
		
	if ($_POST['action'] == 'editar'){
		if ((!isset($_POST['id_usuario']))or(!test_input($_POST['id_usuario']))){
			die ('5');	//DATOS INVALIDOS
		}
		else{		
			$id_usuario = $_POST['id_usuario'];
			//HACE EL UPDATE
			$usuario = new Usuario ();
			$usuario->setId_usuario($id_usuario);
			$usuario->setUsername($username);
			$usuario->setPassword($password);
			$usuario->setEmail($email);
			$usuario->setId_rol($rol);
			$usuario->setActivo($activo);
			$result = ORM_usuario::actualizar_usuario($usuario);	
			if($result == 0){
				die ('3');		//ERROR DE UPDATE
			}
			die('1');
		}
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_usuario::agregar_usuario_campos($username, $password, $email, $rol, $activo);	
		if ($result == 0)
			die('4');
		die('1');
	}

}
?>