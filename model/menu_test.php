<?php
require_once "menu.php";

$menu = new Menu();

$menu->setId_menu(6);
echo "id_menu:",$menu->getId_menu(),"\n";

$menu->setDestino("ALGO Q SEA UN menu");
echo "Destino:",$menu->getDestino(),"\n";

$menu->setPerfil("ALGO Q SEA UN Perfil");
echo "Perfil:",$menu->getPerfil(),"\n";


?>