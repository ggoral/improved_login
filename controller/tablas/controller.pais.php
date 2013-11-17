<?php
//DRY don't repeat yourself
$tipo_usuario = array('Adm');

require_once '../validarSesion.php';
require_once '../../model/pais_interface.php';

$parametro_template = 'abm/pais.html';
$parametro_columnas = Array('ID_PAIS','DESCRIPCION');
$parametro_datos = ORM_pais::obtener_todos_pais();

require 'controller.checkerror.php';
require '../controller.generico.php';

?>