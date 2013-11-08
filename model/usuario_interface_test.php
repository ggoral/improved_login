<?php
require_once "usuario_interface.php";

$usuario = ORM_usuario::buscar_usuario(2);
print_r($usuario);

//test insert por campos
/*
//$affected_row = ORM_usuario::agregar_usuario_campos("Gonzalo2","Gonzalo_Pass","goral.gonzalo@gmail.com",1);
//echo "Cantidad Afectada:",$affected_row,"\n";
*/

//test insert por objeto usuario
/*
$usuario_nuevo = new Usuario();
$usuario_nuevo->init(0,'Gonzalo3','Gonzalo_Pass3','ggoral@github.com',1);
$affected_row = ORM_usuario::agregar_usuario($usuario_nuevo);
echo "Cantidad Afectada:",$affected_row,"\n";
*/

//test delete
/*
$usuario_eliminar = ORM_usuario::buscar_usuario(7);
print_r($usuario_eliminar);
$affected_row = ORM_usuario::eliminar_usuario(7);
echo "Cantidad Afectada:",$affected_row,"\n";
*/

//test update
/*
echo $usuario->getUsername(),"\n";
$usuario->setUsername("Pepito");
echo $usuario->getUsername(),"\n";
echo $usuario->getEmail(),"\n";
$usuario->setEmail("pepito@disney.com");
echo $usuario->getEmail(),"\n";

$affected_row = ORM_usuario::actualizar_usuario($usuario);
echo "Cantidad Afectada:",$affected_row,"\n";
*/


//imprimir todos los usuarios
$usuarios = ORM_usuario::obtener_todos_usuario();
print_r($usuarios);

?>
