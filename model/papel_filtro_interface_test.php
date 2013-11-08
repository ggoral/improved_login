<?php

require_once "papel_filtro_interface.php";

$valor = ORM_papel_filtro::buscar_papel_filtro(5);

//$affected_row = ORM_papel_filtro::agregar_papel_filtro("Gonzalo");
/*$affected_row = ORM_papel_filtro::eliminar_valor(6);
echo "Cantidad Afectada:",$affected_row,"\n";*/


$valor->setDescripcion("UN valor MAS 234342345");
$affected_row = ORM_papel_filtro::actualizar_papel_filtro($valor);
echo "Cantidad Afectada:",$affected_row,"\n";

//imprimir todos los valors
//$valors = ORM_papel_filtro::obtener_todos_papel_filtro();
//print_r($valors);

?>
