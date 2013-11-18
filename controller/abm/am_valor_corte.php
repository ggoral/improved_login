<?php
//DRY don't repeat yourself
$tipo_usuario = array('Adm','FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/valor_corte_interface.php';
require_once '../../model/analito_interface.php';

$valor_corte = array();
$datos_extra = ORM_analito::obtener_todos_analito();

if ($_GET['action'] == 'editar'){
	$valor_corte = ORM_valor_corte::buscar_valor_corte_Twig($_POST['id_valor_corte']);
	$datos_extra = ORM_valor_corte::buscar_analito_valor_corte_Twig($_POST['id_valor_corte']);	
}
	
$parametro_display = array(
	'action' => $_GET['action'],
	'valor_corte' => $valor_corte,
	'datos_extra' => $datos_extra
);

$parametro_template = 'abm/am_valor_corte.html';
require '../controller.generico.php';
		
?>