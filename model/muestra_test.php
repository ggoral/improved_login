<?php
require_once "muestra.php";

$muestra = new Muestra();

$muestra->setId_muestra("Id_muestra");
echo "id_muestra:",$muestra->getId_muestra(),"\n";

$muestra->setResultado_control("Resultado_control");
echo "Resultado_control:",$muestra->getResultado_control(),"\n";

$muestra->setId_interpretacion("Id_interpretacion");
echo "Id_interpretacion:",$muestra->getId_interpretacion(),"\n";

$muestra->setId_decision("Id_decision");
echo "Id_decision:",$muestra->getId_decision(),"\n";

$muestra->setId_resultado("Id_resultado");
echo "Id_resultado:",$muestra->getId_resultado(),"\n";

$muestra->init(1,1,1,1,1);
var_dump($muestra);

?>