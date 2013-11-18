<?php
//DRY don't repeat yourself
//$tipo_usuario = array('Adm','FBA');

//require_once '../validarSesion.php';
require_once '../../model/laboratorio_interface.php';
$parametro_template = 'maps.html';
$parametro_datos = ORM_laboratorio::mostrar_coordenadas();
$parametro_columnas = Array();
$parametro_display = array(
    'laboratorios' => $parametro_datos,
  );

require '../controller.generico.php';
?>