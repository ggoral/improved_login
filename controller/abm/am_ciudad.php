<?php
//DRY don't repeat yourself
$tipo_usuario = array('Adm','FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/ciudad_interface.php';
require_once '../../model/pais_interface.php';

$ciudad = array();
$datos_extra = ORM_pais::obtener_todos_pais();

if ($_GET['action'] == 'editar'){
	$ciudad = ORM_ciudad::buscar_ciudad_Twig($_POST['id_ciudad']);
	$datos_extra = ORM_ciudad::buscar_pais_ciudad_Twig($_POST['id_ciudad']);	
}

$parametro_display = array(
	'action' => $_GET['action'],
	'ciudad' => $ciudad,
	'datos_extra' => $datos_extra
);

$parametro_template = 'abm/am_ciudad.html';
require '../controller.generico.php';
		
?>