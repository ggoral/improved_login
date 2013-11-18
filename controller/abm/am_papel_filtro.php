<?php
//DRY don't repeat yourself
$tipo_usuario = array('Adm','FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/papel_filtro_interface.php';
require_once '../../model/analito_interface.php';

$papel_filtro = array();
$datos_extra = ORM_analito::obtener_todos_analito();

if ($_GET['action'] == 'editar'){
	$papel_filtro = ORM_papel_filtro::buscar_papel_filtro_Twig($_POST['id_papel_filtro']);
	$datos_extra = ORM_papel_filtro::buscar_analito_papel_filtro_Twig($_POST['id_papel_filtro']);	
}
	
$parametro_display = array(
	'action' => $_GET['action'],
	'papel_filtro' => $papel_filtro,
	'datos_extra' => $datos_extra
);

$parametro_template = 'abm/am_papel_filtro.html';
require '../controller.generico.php';
		
?>