<?php
require_once "decision.php";

$decision = new decision();

$decision->setId_decision(6);
echo "id_decision:",$decision->getId_decision(),"\n";

$decision->setDescripcion("ALGO Q SEA UN decision");
echo "Descripcion:",$decision->getDescripcion(),"\n";


?>