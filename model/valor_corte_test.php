<?php
require_once "valor_corte.php";

$valor = new valor_corte();

$valor->setId_valor_corte(6);
echo "id_valor_corte:",$valor->getId_valor_corte(),"\n";

$valor->setDescripcion("ALGO Q SEA UN valor");
echo "Descripcion:",$valor->getDescripcion(),"\n";


?>