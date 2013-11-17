<?php
//DRY don't repeat yourself
$tipo_usuario = array('Adm');

require_once '../validarSesion.php';
require_once '../../model/ciudad_interface.php';

$parametro_template = 'abm/ciudad.html';
$parametro_columnas = Array('ID_CIUDAD','DESCRIPCION', 'COD POSTAL', 'PAIS');
$parametro_datos = ORM_ciudad::obtener_todos_ciudad_Twig();

require 'controller.checkerror.php';
require '../controller.generico.php';

?>
