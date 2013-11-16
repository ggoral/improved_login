<?php
//DRY don't repeat yourself

require_once '../../model/decision_interface.php';
require_once '../../model/analito_interface.php';

$decision = array();
$datos_extra = ORM_analito::obtener_todos_analito();

if ($_GET['action'] == 'editar'){
	$decision = ORM_decision::buscar_decision_Twig($_POST['id_decision']);
	$datos_extra = ORM_decision::buscar_analito_decision_Twig($_POST['id_decision']);	
}
	
$parametro_display = array(
	'action' => $_GET['action'],
	'decision' => $decision,
	'datos_extra' => $datos_extra
);

$parametro_template = 'abm/am_decision.html';
require '../controller.generico.php';
		
?>