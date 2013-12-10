<?php
//DRY don't repeat yourself
$tipo_usuario = array('FBA');

require_once '../validarSesion.php';
require_once '../../model/analito_interface.php';

$parametro_template = 'abm/analito.html';
$parametro_columnas = Array('DESCRIPCION','LABORATORIO');
$parametro_datos = ORM_analito::obtener_analito_laboratorio();

require 'controller.checkerror.php';
require '../controller.generico.php';

?>