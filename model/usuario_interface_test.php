<?php
require_once "usuario_interface.php";



//test select *
//$usuarios = ORM_usuario::obtener_todos_usuario();
//print_r($usuarios);

//test select by user_id
//$usuario = ORM_usuario::buscar_usuario(1);
//print_r($usuario);

//test select by user_id
//$usuario_login = ORM_usuario::buscar_usuario_login("admina","admin");
//print_r($usuario_login);
//echo "Usuario Login:", $usuario_login, "\n";

//test insert por campos
/*
//$affected_row = ORM_usuario::agregar_usuario_campos("Gonzalo2","Gonzalo_Pass","goral.gonzalo@gmail.com",1,1);
//echo "Cantidad Afectada:",$affected_row,"\n";
*/

//test insert por objeto usuario
/*
$usuario_nuevo = new Usuario();
$usuario_nuevo->init(0,'Gonzalo3','Gonzalo_Pass3','ggoral@github.com',1,1);
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

$affected_row = ORM_usuario::agregar_usuario('ggoral', '12345', '', 2, 1);
echo "Cantidad Afectada:",$affected_row,"\n";

//imprimir todos los usuarios
//$usuarios = ORM_usuario::obtener_todos_usuario();
//print_r($usuarios);

?>
