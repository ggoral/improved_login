<?php
require_once '../model/usuario_interface.php';

$parametro_template = 'abm/usuario.html';
$parametro_columnas = Array('ID_USUARIO','USERNAME','E-MAIL','ROL','ACTIVO');

require 'controller.generico';

?>