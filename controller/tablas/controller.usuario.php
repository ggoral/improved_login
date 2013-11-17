<?php
//DRY don't repeat yourself
$tipo_usuario = array('Adm');

require_once '../validarSesion.php';
require_once '../../model/usuario_interface.php';

$parametro_template = 'abm/usuario.html';
$parametro_columnas = Array('ID_USUARIO','USERNAME','E-MAIL','ROL','ACTIVO');
$parametro_datos = ORM_usuario::mostrar_usuarios();

require 'controller.checkerror.php';
require '../controller.generico.php';

?>