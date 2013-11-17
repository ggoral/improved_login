<?php
//DRY don't repeat yourself

require_once '../../model/usuario_interface.php';
require_once '../../model/rol_interface.php';

$usuario = array();
$datos_extra = ORM_rol::obtener_todos_rol();


if ($_GET['action'] == 'editar'){
	$usuario = ORM_usuario::buscar_usuario_Twig($_POST['id_usuario']);
	$datos_extra = ORM_usuario::buscar_rol_usuario_Twig($_POST['id_usuario']);		
}



$parametro_display = array(
	'action' => $_GET['action'],
	'usuario' => $usuario,
	'datos_extra' => $datos_extra
);

$parametro_template = 'abm/am_usuario.html';
require '../controller.generico.php';

?>