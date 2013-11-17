<?php
//DRY don't repeat yourself
$tipo_usuario = array('Adm');

require_once '../validarSesion.php';
require_once '../../model/metodo_interface.php';

$parametro_template = 'abm/metodo.html';
$parametro_columnas = Array('ID_METODO','DESCRIPCION');
$parametro_datos = ORM_metodo::obtener_todos_metodo();

require 'controller.checkerror.php';
require '../controller.generico.php';

?>
