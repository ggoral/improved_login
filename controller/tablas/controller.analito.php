<?php
//DRY don't repeat yourself
$tipo_usuario = array('Adm','Fba','Lab');

require_once '../validarSesion.php';
require_once '../../model/analito_interface.php';

$parametro_template = 'abm/analito.html';
$parametro_columnas = Array('ID_ANALITO','DESCRIPCION');
$parametro_datos = ORM_analito::obtener_todos_analito();

require 'controller.checkerror.php';
require '../controller.generico.php';

?>