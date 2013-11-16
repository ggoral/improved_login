<?php
//DRY don't repeat yourself

require_once '../../model/metodo_interface.php';
require_once '../../model/analito_interface.php';

$metodo = array();
$datos_extra = ORM_analito::obtener_todos_analito();

if ($_GET['action'] == 'editar'){
	$metodo = ORM_metodo::buscar_metodo_Twig($_POST['id_metodo']);
	$datos_extra = ORM_metodo::buscar_analito_metodo_Twig($_POST['id_metodo']);	
}
	
$parametro_display = array(
	'action' => $_GET['action'],
	'metodo' => $metodo,
	'datos_extra' => $datos_extra
);

$parametro_template = 'abm/am_metodo.html';
require '../controller.generico.php';
		
?>