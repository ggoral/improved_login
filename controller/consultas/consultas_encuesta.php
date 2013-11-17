<?php
//REALIZA LAS ALTAS Y MODIFICACIONES

require_once '../../model/encuesta_interface.php';
require_once '../../model/test_input.php';

if (isset($_POST['action'])){
	//RECOBRAR LOS DATOS POR EL POST
	if ((!isset($_POST['fecha_inicio']))or(!test_input($_POST['fecha_inicio']))
		or (!isset($_POST['fecha_cierre']))or(!test_input($_POST['fecha_cierre']))
		or (!isset($_POST['id_resultado']))or(!test_input($_POST['id_resultado']))){
			die ('5'); //NO PASA VALIDACION DEL LADO DEL SERVIDOR DATOS INVALIDOS
	}
	
	if ((isset($_POST['fecha_inicio']))and(test_input($_POST['fecha_inicio'])))
		if (preg_match('/^\d{4}\/\d{1,2}\/\d{1,2}$/', $_POST['fecha_inicio']))
			die('6');
	if ((isset($_POST['fecha_cierre']))and(test_input($_POST['fecha_cierre'])))
		if (preg_match('/^\d{4}\/\d{1,2}\/\d{1,2}$/', $_POST['fecha_cierre']))
			die('6');	
	
	$fecha_inicio = $_POST['fecha_inicio'];	
	$fecha_cierre = $_POST['fecha_cierre'];	
	$id_resultado = $_POST['id_resultado'];			
	
	if ($_POST['action'] == 'editar'){
		if ((!isset($_POST['id_encuesta']))or(!test_input($_POST['id_encuesta']))){
			die ('5');	//DATOS INVALIDOS
		}
		else{		
			$id_encuesta = $_POST['id_encuesta'];
			//HACE EL UPDATE
			$encuesta = new Encuesta ();
			$encuesta->setId_encuesta($id_encuesta);
			$encuesta->setFecha_inicio($fecha_inicio);
			$encuesta->setFecha_cierre($fecha_cierre);
			$encuesta->setId_resultado($id_resultado);
 
 			$result = ORM_encuesta::actualizar_encuesta($encuesta);
			
			if($result == 0)
				die ('3');		//ERROR DE UPDATE
		}
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_encuesta::agregar_encuesta($fecha_inicio, $fecha_cierre, $id_resultado);
		if ($result == 0)
			die('4');
		
	}
	die('1');
}
?>