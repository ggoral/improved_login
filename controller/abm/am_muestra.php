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
/*obtener el id de laboratorio y mandarlo para q solo pueda anotarse al resultado que le pertenezca */
	if (substr($_SESSION['usuarioLogeado']['rol'],0,3) == 'FBA')
		$idLab = 0;
	else
		$idLab = substr($_SESSION['usuarioLogeado']['rol'],-1);
$resultado = ORM_resultado::obtener_todos_resultado_para_muestra($idLab);

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