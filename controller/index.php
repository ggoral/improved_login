<?php	
session_start();
	
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

		$template = $twig->loadTemplate('templateLogin.html');
		$barnav = 'barnavLogin.html';

		if (isset($_SESSION['usuarioLogeado'])) {
			//si ya estaba logeado, le muestra inicio
			$template = $twig->loadTemplate('templateInicio.html');
			$barnav = $_SESSION['usuarioLogeado']['barnav'];
		}

		if (isset($_GET['error'])){
			$error = $_GET['error'];
			$display = 'block';
		}

		else{
			$error = '';
			$display = 'none';
		}

		$template->display(array(
			'barnav' => $barnav,
			'error' => $error,
			'displayerror' => $display
			));

			
 
} catch (Exception $e) {
	die ('ERROR: ' . $e->getMessage());
}
?>