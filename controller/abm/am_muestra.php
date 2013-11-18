<?php
//DRY don't repeat yourself
$tipo_usuario = array('FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/muestra_interface.php';
require_once '../../model/interpretacion_interface.php';
require_once '../../model/decision_interface.php';
require_once '../../model/resultado_interface.php';

$muestra = array();
$interpretacion = ORM_interpretacion::obtener_todos_interpretacion();
$decision = ORM_decision::obtener_todos_decision();
$resultado = ORM_resultado::obtener_todos_resultado();

if ($_GET['action'] == 'editar'){

  $muestra = ORM_muestra::buscar_muestra_Twig2($_POST['id_muestra']);
  $interpretacion = ORM_muestra::buscar_muestra_interpretacion_Twig($_POST['id_muestra']);
  $decision = ORM_muestra::buscar_muestra_decision_Twig($_POST['id_muestra']);
  $resultado = ORM_muestra::buscar_muestra_resultado_Twig($_POST['id_muestra']);

}

$parametro_display = array(
  'action' => $_GET['action'],
  'muestra' => $muestra,
  'interpretacion' => $interpretacion,
  'decision' => $decision,
  'resultado' => $resultado
);

$parametro_template = 'abm/am_muestra.html';
require '../controller.generico.php';

?>