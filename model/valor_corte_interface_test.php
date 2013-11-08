<?php

require_once "valor_corte_interface.php";

$valor = ORM_valor_corte::buscar_valor_corte(5);

//$affected_row = ORM_valor_corte::agregar_valor_corte("Gonzalo");
/*$affected_row = ORM_valor_corte::eliminar_valor(6);
echo "Cantidad Afectada:",$affected_row,"\n";*/


//$valor->setDescripcion("UN valor MAS 234342345");
//$affected_row = ORM_valor_corte::actualizar_valor_corte($valor);
//echo "Cantidad Afectada:",$affected_row,"\n";

//imprimir todos los valors
$valors = ORM_valor_corte::obtener_todos_valor_corte();
print_r($valors);

?>
