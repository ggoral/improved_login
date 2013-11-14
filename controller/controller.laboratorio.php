<?php
//DRY don't repeat yourself

require_once '../model/laboratorio_interface.php';

$parametro_template = 'abm/am_laboratorio.html';
$parametro_columnas = Array('ID_laboratorio','CODIGO','INSTITUCION','SECTOR','ESTADO');
$parametro_datos = ORM_laboratorio::mostrar_laboratorios();

require 'controller.generico.php';

?>