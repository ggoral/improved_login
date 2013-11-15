<?php
//REALIZA LAS ALTAS Y MODIFICACIONES

require_once '../../model/calibrador_interface.php';
require_once '../../model/test_input.php';

if (isset($_POST['action'])){
	//RECOBRAR LOS DATOS POR EL POST
	if ((!isset($_POST['descripcion']))or(!test_input($_POST['descripcion']))
		or (!isset($_POST['analitos']))or(!test_input($_POST['analitos']))){
			die ('5'); //NO PASA VALIDACION DEL LADO DEL SERVIDOR
	}
	
	$descripcion = $_POST['descripcion'];
	
	$analitos = $_POST['analitos'];	//HACER EXPLODE
	$analitosArray = explode(",", $analitos);
	
	if ($_POST['action'] == 'editar'){
		$id_calibrador = $_POST['id_calibrador'];
		if ((!isset($_POST['id_calibrador']))or(!test_input($_POST['id_calibrador']))){
			die ('5');
		}
		else{
			//HACE EL UPDATE
			$calibrador = new Calibrador ();
			$calibrador->setId_calibrador($id_calibrador);
			$calibrador->setDescripcion($descripcion);
			ORM_calibrador::actualizar_calibrador($calibrador);	
			$result = ORM_calibrador::actualizar_combinaciones_analito($id_calibrador, $analitosArray);
			if($result == 0){
				die ('0');		//ERROR DE UPDATE
			}
			die('1');
		}
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_calibrador::agregar_calibrador($descripcion);			
		foreach ($analitosArray as $id_an) 
			$result = ORM_calibrador::combinar_calibrador_analito($descripcion,$id_an);
		if($result == 0){
			die ('0');		//ERROR DE INSERCION
		}
		die('1');
	}

}
?>