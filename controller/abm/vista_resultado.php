<?php
//DRY don't repeat yourself
$tipo_usuario = array('Adm','FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/resultado_interface.php';

$parametro_template = 'abm/vista_resultado.html';
$parametro_datos = ORM_resultado::buscar_resultado_Twig2($_POST['id_resultado']);

$perfil = $_SESSION['usuarioLogeado']['rol'];
if (($perfil != 'Administrador')or($perfil != 'FBA'))
	$perfil = str_replace('Laboratorio_','',$perfil);

$parametro_display = array(
    'resultado' => $parametro_datos,
	'perfil' => $perfil
  );

require '../controller.generico.php';

?>