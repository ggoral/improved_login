<?php

require('validarSesion.php');
require_once '../model/usuario_interface.php';

if($idRolSesion!=1){ //CONTROLO EL ROL DEL USUARIO SOLAMENTE ESTO LUEGO SE PASARA A OTROO LADO PORQ ESTO ES BASE PARA INDICEEEE
	//header('Location: ../index.php?error=ROL NO AUTORIZADO PARA ESTA SECCION');
	die();	 
}	  

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
	$template = $twig->loadTemplate('abm/usuario.html');
	
	$columnas = Array('ID_USUARIO','USERNAME','E-MAIL','ROL','ACTIVO');

	$datos = ORM_usuario::mostrar_usuarios();
	
	
	$template->display(array(
		'cabecera' => $columnas,
		'filas' => $datos,
	));
		
} 
catch (Exception $e) {
	die ('ERROR: ' . $e->getMessage());
}
?>