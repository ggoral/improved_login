<?php

require_once "ciudad_interface.php";

$ciudad = ORM_ciudad::buscar_ciudad(12);

//$affected_row = ORM_ciudad::agregar_ciudad("DESC CIUDAD", 666, 1);
$affected_row = ORM_ciudad::eliminar_ciudad(21);
echo "Cantidad Afectada:",$affected_row,"\n";


$ciudad->setDescripcion("UN ciudad MAS 234342345");
$affected_row = ORM_ciudad::actualizar_ciudad($ciudad);
echo "Cantidad Afectada:",$affected_row,"\n";

//imprimir todos los ciudads
$ciudades = ORM_ciudad::obtener_todos_ciudad();
print_r($ciudades);

?>