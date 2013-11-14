<?php
//DRY don't repeat yourself

require_once '../../model/analito_interface.php';

$analito = array();

if ($_GET['action'] == 'editar'){
  $analito = ORM_analito::buscar_analito_Twig($_POST['id_analito']);
}

$parametro_display = array(
  'action' => $_GET['action'],
  'analito' => $analito
);

$parametro_template = 'abm/am_analito.html';
require '../controller.generico.php';

?>