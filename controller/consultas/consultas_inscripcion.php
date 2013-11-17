<?php
//REALIZA LAS ALTAS Y MODIFICACIONES

require_once '../../model/inscripcion_interface.php';
require_once '../../model/encuesta_interface.php';
require_once '../../model/resultado_interface.php';
require_once '../../model/test_input.php';

if (isset($_POST['action'])){
	//RECOBRAR LOS DATOS POR EL POST

	if ((!isset($_POST['id_encuesta']))or(!test_input($_POST['id_encuesta'])))
			die ('5'); //NO PASA VALIDACION DEL LADO DEL SERVIDOR DATOS INVALIDOS

	$fecha_ingreso = $_POST['fecha_ingreso'];
	$fecha_baja = $_POST['fecha_baja'];
	$laboratorio_id_lab = $_POST['laboratorio_id_lab'];
	$id_encuesta =$_POST['id_encuesta'];
	
	//Se obtiene el analito de la encuesta
	$id_resultado = ORM_encuesta::buscar_encuesta_Twig($id_encuesta);
	$id_resultado = $id_resultado['id_resultado'];
	$id_analito = ORM_resultado::buscar_analito_resultado($id_resultado);
	$id_analito = $id_analito['id_analito'];
	
	
	
	if ($_POST['action'] == 'desinscripcion'){
		if ((!isset($_POST['id_inscripcion']))or(!test_input($_POST['id_inscripcion']))){
			die ('5');	//DATOS INVALIDOS
		}
		else{
			$id_inscripcion = $_POST['id_inscripcion'];
			$fecha_baja = '0000-00-00 00:00:00';
			//HACE EL UPDATE
			$inscripcion = new Inscripcion ();
			$inscripcion->setId_inscripcion($id_inscripcion);
			$inscripcion->setFecha_ingreso($fecha_ingreso);
			$inscripcion->setLaboratorio_id_lab($laboratorio_id_lab);
			$inscripcion->setFecha_baja($fecha_baja);
			$inscripcion->setId_encuesta($id_encuesta);
			$inscripcion->setId_analito($id_analito);
		
			$result = ORM_inscripcion::actualizar_inscripcion($inscripcion);	
			if($result == 0){
				die ('3');		//ERROR DE UPDATE
			}		
		}
	}
	elseif ($_POST['action'] == 'alta'){
		//HACE EL INSERT
		$result = ORM_inscripcion::agregar_inscripcion($fecha_ingreso, $laboratorio_id_lab, $fecha_baja, $id_encuesta, $id_analito);
		if ($result == 0)
			die('4');
	}
	die('1');
}
?>