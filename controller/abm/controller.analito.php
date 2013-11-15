<?php
//DRY don't repeat yourself

require_once '../../model/analito_interface.php';

$parametro_template = 'abm/analito.html';
$parametro_columnas = Array('ID_ANALITO','DESCRIPCION');
$parametro_datos = ORM_analito::obtener_todos_analito();
var_dump($_POST);
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
