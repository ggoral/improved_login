<?php


// include and register Twig auto-loader
require_once '../view/lib/Twig/Autoloader.php'; 
Twig_Autoloader::register();

try {

	// define template directory location
	$loader = new Twig_Loader_Filesystem('../view/templates');

	// initialize Twig environment
	$twig = new Twig_Environment($loader,array(
			//'debug'=> TRUE,
			//'cache' => 'compilation_cache',
			'auto_reload' => TRUE
		));
	$template = $twig->loadTemplate('abm/am_usuario.html');
	$usuario = array();
	if ($_GET['action'] == 'editar'){
		require '../model/usuario_interface.php';
		$usuario = ORM_usuario::buscar_usuario($_GET['id_usuario']);
	}
	
	$template->display(array(
		'action' => $_GET['action'],
		'usuario' => $usuario
	));
		
} 
catch (Exception $e) {
	die ('ERROR: ' . $e->getMessage());
}
?>