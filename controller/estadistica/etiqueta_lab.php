<?php
//DRY don't repeat yourself
$tipo_usuario = array('FBA');

require_once '../validarSesion.php';
require_once '../../model/laboratorio_interface.php';

$laboratorios = ORM_laboratorio::obtener_todos_laboratorio(true);

$parametro_display = array(
  'laboratorio' => $laboratorios
);

$parametro_template = 'estadistica/etiqueta_lab.html';
require '../controller.generico.php';

?>