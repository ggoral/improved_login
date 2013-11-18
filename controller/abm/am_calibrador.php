<?php
//DRY don't repeat yourself
$tipo_usuario = array('Adm','FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/calibrador_interface.php';
require_once '../../model/analito_interface.php';

$calibrador = array();
$datos_extra = ORM_analito::obtener_todos_analito();

if ($_GET['action'] == 'editar'){
	$calibrador = ORM_calibrador::buscar_calibrador_Twig($_POST['id_calibrador']);
	$datos_extra = ORM_calibrador::buscar_analito_calibrador_Twig($_POST['id_calibrador']);	
}
	
$parametro_display = array(
	'action' => $_GET['action'],
	'calibrador' => $calibrador,
	'datos_extra' => $datos_extra
);

$parametro_template = 'abm/am_calibrador.html';
require '../controller.generico.php';
		
?>