<?php
//DRY don't repeat yourself
$tipo_usuario = array('FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/muestra_interface.php';

$parametro_template = 'abm/vista_muestra.html';
$parametro_datos = ORM_muestra::buscar_muestra_Twig2($_POST['id_muestra']);

$perfil = $_SESSION['usuarioLogeado']['rol'];
if (($perfil != 'Administrador')or($perfil != 'FBA'))
	$perfil = str_replace('Laboratorio_','',$perfil);

$parametro_display = array(
    'muestra' => $parametro_datos,
	'perfil' => $perfil
  );

require '../controller.generico.php';

?>