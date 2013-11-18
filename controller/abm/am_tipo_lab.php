<?php
//DRY don't repeat yourself
$tipo_usuario = array('Adm','FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/tipo_lab_interface.php';

$tipo_lab = array();

if ($_GET['action'] == 'editar'){
  $tipo_lab = ORM_tipo_lab::buscar_tipo_lab_Twig($_POST['id_tipo_lab']);
}

$parametro_display = array(
  'action' => $_GET['action'],
  'tipo_lab' => $tipo_lab
);

$parametro_template = 'abm/am_tipo_lab.html';
require '../controller.generico.php';

?>