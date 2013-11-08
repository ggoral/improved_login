<?php
require_once "laboratorio.php";

$laboratorio = new laboratorio();

$laboratorio->setId_lab(1);
echo "id_lab:",$laboratorio->getId_lab(),"\n";

$laboratorio->setCod_lab("12345");
echo "cod_lab:",$laboratorio->getCod_lab(),"\n";

$laboratorio->setInstitucion("institucion_1");
echo "institucion:",$laboratorio->getInstitucion(),"\n";

$laboratorio->setSector("sector1");
echo "sector:",$laboratorio->getSector(),"\n";

$laboratorio->setResponsable("Sivori");
echo "responsable:",$laboratorio->getResponsable(),"\n";

$laboratorio->setDomicilio("unDomicilio");
echo "domicilio:",$laboratorio->getDomicilio(),"\n";

$laboratorio->setDomicilio_corresp("unDomicilio_corresp");
echo "domicilio_corresp:",$laboratorio->getDomicilio_corresp(),"\n";

$laboratorio->setMail("unmail@unservidordemail.com");
echo "mail:",$laboratorio->getMail(),"\n";

$laboratorio->setTel("4123456");
echo "tel:",$laboratorio->getTel(),"\n";

$laboratorio->setCord_x(23);
echo "Cord_x:",$laboratorio->getCord_x(),"\n";

$laboratorio->setCord_y(56);
echo "Cord_y:",$laboratorio->getCord_y(),"\n";

$laboratorio->setEstado("Activo");
echo "Estado:",$laboratorio->getEstado(),"\n";

$laboratorio->setId_tipo(1);
echo "Id_tipo:",$laboratorio->getId_tipo(),"\n";

$laboratorio->setId_ciudad(1);
echo "Id_ciudad:",$laboratorio->getId_ciudad(),"\n";


?>