<?php
require_once "interpretacion.php";

$interpretacion = new interpretacion();

$interpretacion->setId_interpretacion(6);
echo "id_interpretacion:",$interpretacion->getId_interpretacion(),"\n";

$interpretacion->setDescripcion("ALGO Q SEA UN interpretacion");
echo "Descripcion:",$interpretacion->getDescripcion(),"\n";


?>