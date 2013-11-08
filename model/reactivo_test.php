<?php
require_once "reactivo.php";

$reactivo = new reactivo();

$reactivo->setId_reactivo(6);
echo "id_reactivo:",$reactivo->getId_reactivo(),"\n";

$reactivo->setDescripcion("ALGO Q SEA UN reactivo");
echo "Descripcion:",$reactivo->getDescripcion(),"\n";


?>