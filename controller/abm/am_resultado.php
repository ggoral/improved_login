<?php
//DRY don't repeat yourself
function normalize_date($date){   
	if(!empty($date)){ 
		$var = explode('/',str_replace('-','/',$date)); 
		return "$var[2]/$var[1]/$var[0]";		
	}   
}

require_once '../../model/resultado_interface.php';
require_once '../../model/laboratorio_interface.php';
require_once '../../model/metodo_interface.php';
require_once '../../model/reactivo_interface.php';
require_once '../../model/calibrador_interface.php';
require_once '../../model/analito_interface.php';
require_once '../../model/papel_filtro_interface.php';
require_once '../../model/valor_corte_interface.php';

$resultado = array();
$laboratorio = ORM_laboratorio::obtener_todos_laboratorio();
$analito = ORM_analito::obtener_todos_analito();

$metodo = 1;
$reactivo = 1;
$calibrador = 1;
$papel_filtro = 1;
$valor_corte = 1;

if ($_GET['action'] == 'editar'){

  $resultado = ORM_resultado::buscar_resultado_Twig($_POST['id_resultado']);
  $laboratorio = ORM_resultado::buscar_resultado_laboratorio_Twig($_POST['id_resultado']);
  $metodo = ORM_resultado::buscar_resultado_metodo_Twig($_POST['id_resultado']);
  $reactivo = ORM_resultado::buscar_resultado_reactivo_Twig($_POST['id_resultado']);
  $calibrador = ORM_resultado::buscar_resultado_calibrador_Twig($_POST['id_resultado']);
  $analito = ORM_resultado::buscar_resultado_analito_Twig($_POST['id_resultado']);
  $papel_filtro = ORM_resultado::buscar_resultado_papel_filtro_Twig($_POST['id_resultado']);;
  $valor_corte = ORM_resultado::buscar_resultado_valor_corte_Twig($_POST['id_resultado']);
}

$parametro_display = array(
  'action' => $_GET['action'],
  'resultado' => $resultado,
  'laboratorio' => $laboratorio,
  'metodo' => $metodo,
  'reactivo' => $reactivo,
  'calibrador' => $calibrador,
  'analito' => $analito,
  'papel_filtro' => $papel_filtro,
  'valor_corte' => $valor_corte
);

$parametro_template = 'abm/am_resultado.html';
require '../controller.generico.php';

?>