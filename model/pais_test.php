<?php
require_once "pais.php";

$pais = new pais();

$pais->setId_pais(6);
echo "id_pais:",$pais->getId_pais(),"\n";

$pais->setDescripcion("ALGO Q SEA UN pais");
echo "Descripcion:",$pais->getDescripcion(),"\n";


?>