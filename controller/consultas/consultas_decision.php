<?php
//REALIZA LAS ALTAS Y MODIFICACIONES

require_once '../../model/decision_interface.php';
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
		$id_decision = $_POST['id_decision'];
		if ((!isset($_POST['id_decision']))or(!test_input($_POST['id_decision']))){
			die ('5');	//DATOS INVALIDOS
		}
		else{
			//HACE EL UPDATE
			$decision = new Decision ();
			$decision->setId_decision($id_decision);
			$decision->setDescripcion($descripcion);
			ORM_decision::actualizar_decision($decision);	
			$result = ORM_decision::actualizar_combinaciones_analito($id_decision, $analitosArray);
			if($result == 0){
				die ('3');		//ERROR DE UPDATE
			}
			die('1');
		}
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_decision::agregar_decision($descripcion);	
		if ($result == 0)
			die('4');
		foreach ($analitosArray as $id_an) 
			$result = ORM_decision::combinar_decision_analito($descripcion,$id_an);
		if($result == 0){
			die ('2');		//ERROR DE INSERCION DE ANALITOS
		}
		die('1');
	}

}
?>