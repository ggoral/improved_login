<?php
//DRY don't repeat yourself
$tipo_usuario = array('Adm');

require_once '../validarSesion.php';
require_once '../../model/rol_interface.php';

$parametro_template = 'abm/rol.html';
$parametro_columnas = Array('ID_ROL','DESCRIPCION');
$parametro_datos = ORM_rol::obtener_todos_rol();

require 'controller.checkerror.php';
require '../controller.generico.php';

?>