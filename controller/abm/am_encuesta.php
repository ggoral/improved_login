<?php
//DRY don't repeat yourself
$tipo_usuario = array('Adm','FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/encuesta_interface.php';
require_once '../../model/resultado_interface.php';

$encuesta = array();
$id_resultado = ORM_resultado::obtener_todos_resultado();

if ($_GET['action'] == 'editar'){

  $encuesta = ORM_encuesta::buscar_encuesta_Twig($_POST['id_encuesta']);
  $id_resultado = ORM_encuesta::buscar_encuesta_resultado_Twig($_POST['id_encuesta']);

}

$parametro_display = array(
  'action' => $_GET['action'],
  'encuesta' => $encuesta,
  'id_resultado' => $id_resultado
);

$parametro_template = 'abm/am_encuesta.html';
require '../controller.generico.php';

?>