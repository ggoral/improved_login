<?php
//DRY don't repeat yourself
$tipo_usuario = array('Lab');

require_once '../validarSesion.php';
require_once '../../model/inscripcion_interface.php';
require_once '../../model/encuesta_interface.php';
require_once '../../model/analito_interface.php';


$perfil = $_SESSION['usuarioLogeado']['rol'];
$idlab = str_replace('Laboratorio_','',$perfil);

$inscripcion = array('fecha_ingreso'=> date('Y-m-d'),'laboratorio_id_lab'=> $idlab,'fecha_baja'=> date('Y-m-d'));
$datos_extra = ORM_encuesta::obtener_todos_encuesta_en_termino();



if ($_GET['action'] == 'desinscripcion'){
	$inscripcion = ORM_inscripcion::buscar_inscripcion_Twig($_POST['id_inscripcion']);
	$datos_extra = ORM_inscripcion::buscar_encuesta_inscripcion_Twig($_POST['id_inscripcion']);	
}

$parametro_display = array(
	'action' => $_GET['action'],
	'inscripcion' => $inscripcion,
	'datos_extra' => $datos_extra
);

$parametro_template = 'abm/am_inscripcion.html';
require '../controller.generico.php';
		
?>