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

$encuestas = ORM_encuesta::mostrar_encuestas_laboratorio($id_lab);

$encuestas_nuevas = array();

$i = 0;
foreach ($encuestas as $enc) {
  $fecha_inicio = new DateTime($enc['fecha_inicio']);
  $fecha_analisis = new DateTime($enc['fecha_analisis']);
  $fecha_cierre = new DateTime($enc['fecha_cierre']);
  $fecha_recepcion = new DateTime($enc['fecha_recepcion']);
  $fecha_ingreso = new DateTime($enc['fecha_ingreso']);
  
  $encuestas_nuevas[$i]['id_encuesta'] = $enc['id_encuesta']; 
  
  $encuestas_nuevas[$i]['tiempo_envio'] = $fecha_recepcion->diff($fecha_inicio)->days; 
  $encuestas_nuevas[$i]['tiempo_analisis'] = $fecha_analisis->diff($fecha_recepcion)->days; 
  $encuestas_nuevas[$i]['tiempo_ingreso'] = $fecha_ingreso->diff($fecha_analisis)->days; 
  $i++;
}

$parametro_template = 'graphs.html';
$parametro_datos = $encuestas_nuevas;
$parametro_columnas = Array();
$parametro_display = array(
    'encuestas' => $parametro_datos,
  );

require '../controller.generico.php';
?>