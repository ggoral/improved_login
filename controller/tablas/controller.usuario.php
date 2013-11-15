<?php
//DRY don't repeat yourself

require_once '../../model/usuario_interface.php';

$parametro_template = 'abm/usuario.html';
$parametro_columnas = Array('ID_USUARIO','USERNAME','E-MAIL','ROL','ACTIVO');
$parametro_datos = ORM_usuario::mostrar_usuarios();

if (isset($_POST['error'])){
  $error = $_POST['error'];
  $display = 'block';
}
else{
  $error = '';
  $display = 'none';
}

$parametro_display = array(
    'cabecera' => $parametro_columnas,
    'filas' => $parametro_datos,
    'error' => $error,
    'displayerror' => $display
  );

require '../controller.generico.php';

?>