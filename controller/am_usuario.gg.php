<?php
//DRY don't repeat yourself

require_once '../model/usuario_interface.php';

$usuario = array();
if ($_GET['action'] == 'editar'){
	$usuario = ORM_usuario::buscar_usuario($_POST['id_usuario']);
	$usuario = array(
		"username" => $usuario->getUsername(),		//PONER TODOS LOS DATOS O RESOLVERLO DESDE LA INTERFAZ
	);
}
	
$parametro_display = array(
	'action' => $_GET['action'],
	'usuario' => $usuario
);

$parametro_template = 'abm/am_usuario.html';
require 'am_generico.php';

?>