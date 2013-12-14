<?php
//DRY don't repeat yourself
$tipo_usuario = array('Adm','FBA');

require_once '../validarSesion.php';
require_once '../../model/laboratorio_interface.php';
require_once '../../model/encuesta_interface.php';
require_once '../../model/test_input.php';

$id_lab = 0;
if (isset($_GET['id_lab']) && (test_input($_GET['id_lab']))){
  $id_lab = $_GET['id_lab'];
  }

$parametro_template = 'graphs.html';
$parametro_datos = ORM_encuesta::mostrar_encuestas_laboratorio($id_lab);
$parametro_columnas = Array();
$parametro_display = array(
    'encuestas' => $parametro_datos,
  );

require '../controller.generico.php';
?>