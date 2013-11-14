<?php
// include and register Twig auto-loader
require_once '../view/lib/Twig/Autoloader.php'; 
require_once '../model/calibrador_interface.php';
require_once '../model/analito_interface.php';
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
	$template = $twig->loadTemplate('abm/am_calibrador.html');
	
	$calibrador = array();
	$datos_extra = ORM_analito::obtener_analitos_Twig();
	if ($_GET['action'] == 'editar'){

		$calibrador = ORM_calibrador::buscar_calibrador_Twig($_POST['id_calibrador']);
		$datos_extra = ORM_calibrador::buscar_analito_calibrador_Twig($_POST['id_calibrador']);
	}
	
	$template->display(array(
		'action' => $_GET['action'],
		'calibrador' => $calibrador,
		'datos_extra' => $datos_extra
	));
		
} 
catch (Exception $e) {
	die ('ERROR: ' . $e->getMessage());
}
?>