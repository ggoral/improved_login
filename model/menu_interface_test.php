<?php

require_once "menu_interface.php";

//$menu = ORM_menu::buscar_menu(5);

$menu = ORM_menu::buscar_menu_perfil("Administrador");
print_r($menu);

//$affected_row = ORM_menu::agregar_menu("Gonzalo","todos,ningun,o");
//$affected_row = ORM_menu::eliminar_menu(4);
//echo "Cantidad Afectada:",$affected_row,"\n";


//$menu->setDestino("UN menu MAS 234342345");
//$affected_row = ORM_menu::actualizar_menu($menu);
//echo "Cantidad Afectada:",$affected_row,"\n";

//imprimir todos los menus
//$menus = ORM_menu::obtener_todos_menu();
//print_r($menus);

?>
