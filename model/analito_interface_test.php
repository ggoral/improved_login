<?php

require_once "analito_interface.php";

$analito = ORM_analito::buscar_analito(2);
var_dump($analito);

//$affected_row = ORM_analito::agregar_analito("Gonzalo");
//$affected_row = ORM_analito::eliminar_analito(5);
//echo "Cantidad Afectada:",$affected_row,"\n";


//$analito->setDescripcion("UN ANALITO MAS 234342345");
//$affected_row = ORM_analito::actualizar_analito($analito);
//echo "Cantidad Afectada:",$affected_row,"\n";

//imprimir todos los analitos
//$analitos = ORM_analito::obtener_todos_analito();
//print_r($analitos);
?>
