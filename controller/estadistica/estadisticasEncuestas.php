<?php
//DRY don't repeat yourself
$tipo_usuario = array('FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/encuesta_interface.php';
require_once '../../model/laboratorio_interface.php';

$parametro_template = 'abm/estadisticasEncuestas.html';
$parametro_columnas = Array('ID_ENCUESTA','FECHA INICIO','FECHA CIERRE');
$parametro_datos = ORM_encuesta::obtener_estadisticas_encuestas();

$parametro_display = array(
    'cabecera' => $parametro_columnas,
    'filas' => $parametro_datos
  );

require '../controller.generico.php';

?>