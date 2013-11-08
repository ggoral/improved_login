<?php
require_once "calibrador.php";

$calibrador = new calibrador();

$calibrador->setId_calibrador(6);
echo "id_calibrador:",$calibrador->getId_calibrador(),"\n";

$calibrador->setDescripcion("ALGO Q SEA UN calibrador");
echo "Descripcion:",$calibrador->getDescripcion(),"\n";


?>