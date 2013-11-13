<?php
// include and register Twig auto-loader
require_once '../view/lib/Twig/Autoloader.php'; 
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
	$template = $twig->loadTemplate('abm/analito.html');
	
	
	
	$columnas = Array('ID_ANALITO','DESCRIPCION');

	$datos = ORM_analito::obtener_todos_analito();
	
	
	$template->display(array(
		'cabecera' => $columnas,
		'filas' => $datos
	));
		
} 
catch (Exception $e) {
	die ('ERROR: ' . $e->getMessage());
}
?>