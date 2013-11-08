<?php
require_once "metodo.php";

$metodo = new metodo();

$metodo->setId_metodo(6);
echo "id_metodo:",$metodo->getId_metodo(),"\n";

$metodo->setDescripcion("ALGO Q SEA UN metodo");
echo "Descripcion:",$metodo->getDescripcion(),"\n";


?>