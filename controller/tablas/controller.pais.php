<?php
//DRY don't repeat yourself

require_once '../../model/pais_interface.php';

$parametro_template = 'abm/pais.html';
$parametro_columnas = Array('ID_PAIS','DESCRIPCION');
$parametro_datos = ORM_pais::obtener_todos_pais();


if (isset($_POST['error'])){
  $error = $_POST['error'];
  $display = 'block';
  $color = "red";
}
else{
  $error = '';
  $display = 'none';
}

if($error = "OK!"){
  $color = "green";
}

$parametro_display = array(
    'cabecera' => $parametro_columnas,
    'filas' => $parametro_datos,
    'error' => $error,
    'displayerror' => $display,
    'messagecolor' => $color
  );


require '../controller.generico.php';

?>
