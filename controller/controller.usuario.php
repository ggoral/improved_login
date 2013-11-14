<?php
//DRY don't repeat yourself

require_once '../model/usuario_interface.php';

$parametro_template = 'abm/usuario.html';
$parametro_columnas = Array('ID_USUARIO','USERNAME','E-MAIL','ROL','ACTIVO');
$parametro_datos = ORM_usuario::mostrar_usuarios();

require 'controller.generico.php';

?>