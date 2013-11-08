<?php

require_once "tipo_lab_interface.php";

$valor = ORM_tipo_lab::buscar_tipo_lab(12);

//$affected_row = ORM_tipo_lab::agregar_tipo_lab("Gonzalo");
/*$affected_row = ORM_tipo_lab::eliminar_valor(6);
echo "Cantidad Afectada:",$affected_row,"\n";*/


$valor->setDescripcion("UN valor MAS 234342345");
$affected_row = ORM_tipo_lab::actualizar_tipo_lab($valor);
echo "Cantidad Afectada:",$affected_row,"\n";

//imprimir todos los valors
//$valors = ORM_tipo_lab::obtener_todos_tipo_lab();
//print_r($valors);

?>
