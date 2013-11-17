<?php
//DRY don't repeat yourself

require_once '../../model/laboratorio_interface.php';
require_once '../../model/ciudad_interface.php';
require_once '../../model/tipo_lab_interface.php';

$laboratorio = array();
$datos_ciudad = ORM_ciudad::obtener_todos_ciudad();
$datos_tipo_lab = ORM_tipo_lab::obtener_todos_tipo_lab();


if ($_GET['action'] == 'editar'){
	$laboratorio = ORM_laboratorio::buscar_laboratorio_Twig($_POST['id_laboratorio']);
	$datos_ciudad = ORM_ciudad::buscar_lab_ciudad_Twig($_POST['id_laboratorio']);
	$datos_tipo_lab = ORM_tipo_lab::buscar_tipo_lab_Twig2($_POST['id_laboratorio']);
	
}

$parametro_display = array(
	'action' => $_GET['action'],
	'laboratorio' => $laboratorio,
	'datos_ciudad' => $datos_ciudad,
	'datos_tipo_lab' => $datos_tipo_lab
);

$parametro_template = 'abm/am_laboratorio.html';
require '../controller.generico.php';

?>