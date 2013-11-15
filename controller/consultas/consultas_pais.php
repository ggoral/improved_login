<?php
//REALIZA LAS ALTAS Y MODIFICACIONES

require_once '../../model/pais_interface.php';
require_once '../../model/test_input.php';

if (isset($_POST['action'])){
	//RECOBRAR LOS DATOS POR EL POST
	if ((!isset($_POST['descripcion']))or(!test_input($_POST['descripcion']))
		or (!isset($_POST['id_pais']))or(!test_input($_POST['id_pais'])){
			die ('5'); //NO PASA VALIDACION DEL LADO DEL SERVIDOR
	}	

	$descripcion = $_POST['descripcion'];
	$id_pais = $_POST['id_pais'];
	
	if ($_POST['action'] == 'editar'){
		//HACE EL UPDATE
		$pais = new pais ();
		$pais->setId_pais($id_pais);
		$pais->setDescripcion($descripcion);
		ORM_pais::actualizar_pais($pais);
		echo "1";
		return;
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_pais::agregar_pais($descripcion);
		if($result == 0){
			echo "0";
			return;
		}
		echo "1";
		return;
	}

}
?>