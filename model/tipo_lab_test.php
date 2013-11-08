<?php
require_once "tipo_lab.php";

$valor = new tipo_lab();

$valor->setId_tipo_lab(6);
echo "id_tipo_lab:",$valor->getId_tipo_lab(),"\n";

$valor->setDescripcion("ALGO Q SEA UN valor");
echo "Descripcion:",$valor->getDescripcion(),"\n";


?>