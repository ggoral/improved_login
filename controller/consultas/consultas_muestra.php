<?php
//REALIZA LAS ALTAS Y MODIFICACIONES
$tipo_usuario = array('Adm','FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/muestra_interface.php';
require_once '../../model/test_input.php';

if (isset($_POST['action'])){
	//RECOBRAR LOS DATOS POR EL POST
	if ((!isset($_POST['resultado_control']))or(!test_input($_POST['resultado_control']))
		or (!isset($_POST['interpretacion']))or(!test_input($_POST['interpretacion']))
		or (!isset($_POST['decision']))or(!test_input($_POST['decision']))
		or (!isset($_POST['id_resultado']))or(!test_input($_POST['id_resultado']))){
			die ('5'); //NO PASA VALIDACION DEL LADO DEL SERVIDOR DATOS INVALIDOS
	}

	$id_resultado_control = $_POST['resultado_control'];	
	$id_interpretacion = $_POST['interpretacion'];		
	$id_resultado = $_POST['id_resultado'];	
	$id_decision = $_POST['decision'];	
	
	if ($_POST['action'] == 'editar'){

		if ((!isset($_POST['id_muestra']))or(!test_input($_POST['id_muestra']))){
			die ('5');	//DATOS INVALIDOS
		}
		else{		
			$id_muestra = $_POST['id_muestra'];
			//HACE EL UPDATE
			$muestra = new Muestra ();
			$muestra->setId_muestra($id_muestra);
			$muestra->setResultado_control($id_resultado_control);
			$muestra->setId_interpretacion($id_interpretacion);
			$muestra->setId_resultado($id_resultado);
			$muestra->setId_decision($id_decision);

 			$result = ORM_muestra::actualizar_muestra($muestra);
			
			if($result == 0)
				die ('3');		//ERROR DE UPDATE
		}
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_muestra::agregar_muestra($id_resultado_control, $id_interpretacion, $id_decision, $id_resultado);
		if ($result == 0)
			die('4');
		
	}
	die('1');
}
?>