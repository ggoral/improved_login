<?php
//DRY don't repeat yourself

require_once '../../model/reactivo_interface.php';
require_once '../../model/analito_interface.php';

$reactivo = array();
$datos_extra = ORM_analito::obtener_todos_analito();

if ($_GET['action'] == 'editar'){
	$reactivo = ORM_reactivo::buscar_reactivo_Twig($_POST['id_reactivo']);
	$datos_extra = ORM_reactivo::buscar_analito_reactivo_Twig($_POST['id_reactivo']);	
}
	
$parametro_display = array(
	'action' => $_GET['action'],
	'reactivo' => $reactivo,
	'datos_extra' => $datos_extra
);

$parametro_template = 'abm/am_reactivo.html';
require '../controller.generico.php';
		
?>