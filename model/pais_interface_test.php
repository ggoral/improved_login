<?php

require_once "pais_interface.php";

$pais = ORM_pais::buscar_pais(20);

//$affected_row = ORM_pais::agregar_pais("Gonzalo");
//$affected_row = ORM_pais::eliminar_pais(5);
//echo "Cantidad Afectada:",$affected_row,"\n";


$pais->setDescripcion("UN pais MAS 234342345");
$affected_row = ORM_pais::actualizar_pais($pais);
echo "Cantidad Afectada:",$affected_row,"\n";
/*
//imprimir todos los paiss
$paiss = ORM_pais::obtener_todos_pais();
print_r($paiss);
*/
?>
