<?php
//REALIZA LAS ALTAS Y MODIFICACIONES

require_once '../../model/pais_interface.php';
require_once '../../model/test_input.php';

if (isset($_POST['action'])){
	//RECOBRAR LOS DATOS POR EL POST
	if ((!isset($_POST['descripcion']))or(!test_input($_POST['descripcion']))){
		die('5'); //NO PASA VALIDACION DEL LADO DEL SERVIDOR
	}	

	$descripcion = $_POST['descripcion'];
	
	if ($_POST['action'] == 'editar'){
		if((!isset($_POST['id_pais']))or(!test_input($_POST['id_pais']))){
			die('5'); //NO PASA VALIDACION DEL LADO DEL SERVIDOR
		}else{
			//HACE EL UPDATE
			$id_pais = $_POST['id_pais'];
			$pais = new Pais ();
			$pais->setId_pais($id_pais);
			$pais->setDescripcion($descripcion);
			$result = ORM_pais::actualizar_pais($pais);
			if($result == 0)
			{	
				die('3');
			}
		}
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_pais::agregar_pais($descripcion);
		if($result == 0)
		{
			die('4');
		}
	}
	die('1');
}
?>