<?php
//DRY don't repeat yourself
$tipo_usuario = array('FBA');

require_once '../validarSesion.php';
require_once '../../model/encuesta_interface.php';
require_once '../../model/laboratorio_interface.php';

$parametro_template = 'abm/comparacionesEncuestas.html';
$parametro_columnas = Array('ID LABORATORIO','COD LABORATORIO','ID_ENCUESTA','FECHA INICIO','FECHA CIERRE',);
$parametro_datos = ORM_encuesta::obtener_compraciones_encuestas_validas();

$parametro_display = array(
    'cabecera' => $parametro_columnas,
    'filas' => $parametro_datos
  );

require '../controller.generico.php';

?>