<?php
//DRY don't repeat yourself
$tipo_usuario = array('Adm','FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/rol_interface.php';

$rol = array();

if ($_GET['action'] == 'editar'){
  $rol = ORM_rol::buscar_rol_Twig($_POST['id_rol']);
}

$parametro_display = array(
  'action' => $_GET['action'],
  'rol' => $rol
);

$parametro_template = 'abm/am_rol.html';
require '../controller.generico.php';

?>