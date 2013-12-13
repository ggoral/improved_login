<?php
//DRY don't repeat yourself
$tipo_usuario = array('FBA','Lab');

require_once '../validarSesion.php';
require_once '../../model/laboratorio_interface.php';

$parametro_template = 'estadistica/estadisticaGraficos.html';
$parametro_columnas = Array('ID_LAB','COD_LAB');
$parametro_datos = ORM_laboratorio::mostrar_laboratorio_graficos();


$parametro_display = array(
    'cabecera' => $parametro_columnas,
    'filas' => $parametro_datos,
  );

require '../controller.generico.php';

?>