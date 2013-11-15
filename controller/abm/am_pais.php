<?php
//DRY don't repeat yourself

require_once '../../model/pais_interface.php';

$pais = array();

if ($_GET['action'] == 'editar'){
  $pais = ORM_pais::buscar_pais_Twig($_POST['id_pais']);
}

$parametro_display = array(
  'action' => $_GET['action'],
  'pais' => $pais
);

$parametro_template = 'abm/am_pais.html';
require '../controller.generico.php';

?>