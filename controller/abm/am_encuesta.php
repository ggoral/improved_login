<?php
//DRY don't repeat yourself
function normalize_date($date){   
	if(!empty($date)){ 
		$var = explode('/',str_replace('-','/',$date)); 
		return "$var[2]/$var[1]/$var[0]";		
	}   
}

require_once '../../model/encuesta_interface.php';
require_once '../../model/resultado_interface.php';

$encuesta = array();
$id_resultado = ORM_resultado::obtener_todos_resultado();

$fecha_inicio = 1/1/1;
$fecha_cierre = 2/2/2;
$id_resultado = 1;

if ($_GET['action'] == 'editar'){

  $encuesta = ORM_encuesta::buscar_encuesta_Twig($_POST['id_encuesta']);
  $id_resultado = ORM_resultado::buscar_encuesta_resultado_Twig($_POST['id_encuesta']);


}

$parametro_display = array(
  'action' => $_GET['action'],
  'encuesta' => $encuesta,
  'fecha_inicio' => $fecha_inicio,
  'fecha_cierre' => $fecha_cierre,
  'id_resultado' => $id_resultado
);

$parametro_template = 'abm/am_encuesta.html';
require '../controller.generico.php';

?>