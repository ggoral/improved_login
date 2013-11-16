<?php
//DRY don't repeat yourself

require_once '../../model/interpretacion_interface.php';
require_once '../../model/analito_interface.php';

$interpretacion = array();
$datos_extra = ORM_analito::obtener_todos_analito();

if ($_GET['action'] == 'editar'){
	$interpretacion = ORM_interpretacion::buscar_interpretacion_Twig($_POST['id_interpretacion']);
	$datos_extra = ORM_interpretacion::buscar_analito_interpretacion_Twig($_POST['id_interpretacion']);	
}
	
$parametro_display = array(
	'action' => $_GET['action'],
	'interpretacion' => $interpretacion,
	'datos_extra' => $datos_extra
);

$parametro_template = 'abm/am_interpretacion.html';
require '../controller.generico.php';
		
?>