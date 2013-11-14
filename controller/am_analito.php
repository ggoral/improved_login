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
	$template = $twig->loadTemplate('abm/am_analito.html');
	
	$analito = array();
	if ($_GET['action'] == 'editar'){

		$analito = ORM_analito::buscar_analito($_POST['id_analito']);
//var_dump($analito);
		$analito = array(
				"id_analito" => $analito->getId_analito(),
				"descripcion" => $analito->getDescripcion(),		//PONER TODOS LOS DATOS O RESOLVERLO DESDE LA INTERFAZ
																	//DEBE DEVOLVER ARREGLO Y DEVUELVE OBJETOS PRIVADOS VER CON VARDUMP
		);	
//var_dump($analito);
	}
	
	$template->display(array(
		'action' => $_GET['action'],
		'analito' => $analito
	));
		
} 
catch (Exception $e) {
	die ('ERROR: ' . $e->getMessage());
}
?>