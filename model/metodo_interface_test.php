<?php

require_once "metodo_interface.php";

//$metodo = ORM_metodo::buscar_metodo(6);

//$affected_row = ORM_metodo::agregar_metodo("Gonzalo");
/*$affected_row = ORM_metodo::eliminar_metodo(6);
echo "Cantidad Afectada:",$affected_row,"\n";*/


//$metodo->setDescripcion("UN metodo MAS 234342345");
//$affected_row = ORM_metodo::actualizar_metodo($metodo);
//echo "Cantidad Afectada:",$affected_row,"\n";

//imprimir todos los metodos
$metodos = ORM_metodo::obtener_todos_metodo();
print_r($metodos);

?>
