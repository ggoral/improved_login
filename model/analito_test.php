<?php
require_once "analito.php";

$analito = new Analito();

$analito->setId_analito(6);
echo "id_analito:",$analito->getId_analito(),"\n";

$analito->setDescripcion("ALGO Q SEA UN ANALITO");
echo "Descripcion:",$analito->getDescripcion(),"\n";


?>