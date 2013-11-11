<?php
require_once "rol.php";

$rol = new rol();

$rol->setId_rol(6);
echo "id_rol:",$rol->getId_rol(),"\n";

$rol->setDescripcion("ALGO Q SEA UN rol");
echo "Descripcion:",$rol->getDescripcion(),"\n";


?>