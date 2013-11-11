<?php
require_once "ciudad.php";

$ciudad = new ciudad();

$ciudad->setId_ciudad(6);
echo "id_ciudad:",$ciudad->getId_ciudad(),"\n";

$ciudad->setFecha_inicio("ALGO Q SEA UNA Fecha_inicio");
echo "Fecha_inicio:",$ciudad->getFecha_inicio(),"\n";

$ciudad->setCod_postal("ALGO Q SEA UN Cod_postal");
echo "Cod_postal:",$ciudad->getCod_postal(),"\n";

$ciudad->setId_pais("ALGO Q SEA UN Id_pais");
echo "Id_pais:",$ciudad->getId_pais(),"\n";

?>