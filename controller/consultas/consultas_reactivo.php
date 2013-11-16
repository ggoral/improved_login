<?php
//REALIZA LAS ALTAS Y MODIFICACIONES

require_once '../../model/reactivo_interface.php';
require_once '../../model/test_input.php';

if (isset($_POST['action'])){
	//RECOBRAR LOS DATOS POR EL POST
	if ((!isset($_POST['descripcion']))or(!test_input($_POST['descripcion']))
		or (!isset($_POST['analitos']))or(!test_input($_POST['analitos']))){
			die ('5'); //NO PASA VALIDACION DEL LADO DEL SERVIDOR DATOS INVALIDOS
	}
	
	$descripcion = $_POST['descripcion'];
	
	$analitos = $_POST['analitos'];	//HACER EXPLODE
	$analitosArray = explode(",", $analitos);
	
	if ($_POST['action'] == 'editar'){
		if ((!isset($_POST['id_reactivo']))or(!test_input($_POST['id_reactivo']))){
			die ('5');	//DATOS INVALIDOS
		}
		else{
			$id_reactivo = $_POST['id_reactivo'];
			//HACE EL UPDATE
			$reactivo = new Reactivo ();
			$reactivo->setId_reactivo($id_reactivo);
			$reactivo->setDescripcion($descripcion);
			ORM_reactivo::actualizar_reactivo($reactivo);	
			$result = ORM_reactivo::actualizar_combinaciones_analito($id_reactivo, $analitosArray);
			if($result == 0){
				die ('3');		//ERROR DE UPDATE
			}
			die('1');
		}
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_reactivo::agregar_reactivo($descripcion);	
		if ($result == 0)
			die('4');
		foreach ($analitosArray as $id_an) 
			$result = ORM_reactivo::combinar_reactivo_analito($descripcion,$id_an);
		if($result == 0){
			die ('2');		//ERROR DE INSERCION DE ANALITOS
		}
		die('1');
	}

}
?>