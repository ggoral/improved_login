<?php
//DRY don't repeat yourself
$tipo_usuario = array('FBA');

require_once '../validarSesion.php';
require_once '../../model/analito_interface.php';

$parametro_template = 'abm/analitoEstadistica.html';
$parametro_columnas = Array('DESCRIPCION','LABORATORIO','CANT ANALITOS');
$parametro_datos = ORM_analito::obtener_analito_laboratorio();

$parametro_display = array(
    'cabecera' => $parametro_columnas,
    'filas' => $parametro_datos
  );

require 'controller.checkerror.php';
require '../controller.generico.php';

?>