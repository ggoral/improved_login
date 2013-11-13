<?php
// include and register Twig auto-loader
require_once '../view/lib/Twig/Autoloader.php'; 
require_once '../model/usuario_interface.php';
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

		$usuario = ORM_usuario::buscar_usuario($_POST['id_usuario']);

		$usuario = array(
				"username" => $usuario->getUsername(),		//PONER TODOS LOS DATOS O RESOLVERLO DESDE LA INTERFAZ
				
		);


	
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