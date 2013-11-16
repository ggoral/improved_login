<?php
//DRY don't repeat yourself

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
$metodo = ORM_metodo::obtener_todos_metodo();
$reactivo = ORM_reactivo::obtener_todos_reactivo();
$calibrador = ORM_calibrador::obtener_todos_calibrador();
$analito = ORM_analito::obtener_todos_analito();
$papel_filtro = ORM_papel_filtro::obtener_todos_papel_filtro();
$valor_corte = ORM_valor_corte::obtener_todos_valor_corte();


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