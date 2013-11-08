<?php
require_once "papel_filtro.php";

$valor = new papel_filtro();

$valor->setId_papel_filtro(6);
echo "id_papel_filtro:",$valor->getId_papel_filtro(),"\n";

$valor->setDescripcion("ALGO Q SEA UN valor");
echo "Descripcion:",$valor->getDescripcion(),"\n";


?>