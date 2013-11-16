<?php
//REALIZA LAS ALTAS Y MODIFICACIONES

require_once '../../model/ciudad_interface.php';
require_once '../../model/test_input.php';

if (isset($_POST['action'])){
	//RECOBRAR LOS DATOS POR EL POST
	if ((!isset($_POST['descripcion']))or(!test_input($_POST['descripcion']))
		or(!isset($_POST['codpostal']))or(!test_input($_POST['codpostal']))
		or (!isset($_POST['pais']))or(!test_input($_POST['pais']))){
			die ('5'); //NO PASA VALIDACION DEL LADO DEL SERVIDOR DATOS INVALIDOS
	}
	
	$descripcion = $_POST['descripcion'];
	$codPostal = $_POST['codpostal'];
	$idPais = $_POST['pais'];	
	
	if ($_POST['action'] == 'editar'){
		if ((!isset($_POST['id_ciudad']))or(!test_input($_POST['id_ciudad']))){
			die ('5');	//DATOS INVALIDOS
		}
		else{
			$id_ciudad = $_POST['id_ciudad'];
			//HACE EL UPDATE
			$ciudad = new Ciudad ();
			$ciudad->setId_ciudad($id_ciudad);
			$ciudad->setDescripcion($descripcion);
			$ciudad->setCod_postal($codPostal);
			$ciudad->setId_pais($idPais);
			$result = ORM_ciudad::actualizar_ciudad($ciudad);	
			
			if($result == 0){
				die ('3');		//ERROR DE UPDATE
			}
			die('1');
		}
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_ciudad::agregar_ciudad($descripcion, $codPostal, $idPais);	
		if ($result == 0)
			die('4');
	}

	die('1');
}
?>