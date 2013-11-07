<?php

require_once "usuario.orm.class.php";

$usuario = ORM_usuario::buscar_usuario(5);

//$affected_row = ORM_usuario::agregar_usuario("Gonzalo","Gonzalo_Pass","goral.gonzalo@gmail.com",1);
$affected_row = ORM_usuario::eliminar_usuario(3);
echo "Cantidad Afectada:",$affected_row,"\n";

$usuario->setUsername("Pepito");
$affected_row = ORM_usuario::actualizar_usuario($usuario);
echo "Cantidad Afectada:",$affected_row,"\n";

//imprimir todos los usuarios
$usuarios = ORM_usuario::obtener_todos_usuario();
print_r($usuarios);

?>
