<?php

require_once "rol_interface.php";

$rol = ORM_rol::buscar_rol(1);

//$affected_row = ORM_rol::agregar_rol("Gonzalos");
//$affected_row = ORM_rol::eliminar_rol(5);
echo "Cantidad Afectada:",$affected_row,"\n";


$rol->setDescripcion("Admin");
$affected_row = ORM_rol::actualizar_rol($rol);
echo "Cantidad Afectada:",$affected_row,"\n";

//imprimir todos los rols
$rols = ORM_rol::obtener_todos_rol();
print_r($rols);

?>
