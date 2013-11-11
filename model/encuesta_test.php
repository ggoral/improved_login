<?php
require_once "encuesta.php";

$encuesta = new encuesta();

$encuesta->setId_encuesta(6);
echo "id_encuesta:",$encuesta->getId_encuesta(),"\n";

$encuesta->setFecha_inicio("ALGO Q SEA UNA Fecha_inicio");
echo "Fecha_inicio:",$encuesta->getFecha_inicio(),"\n";

$encuesta->setFecha_cierre("ALGO Q SEA UN Fecha_cierre");
echo "Fecha_cierre:",$encuesta->getFecha_cierre(),"\n";

$encuesta->setId_resultado("ALGO Q SEA UN Id_resultado");
echo "Id_resultado:",$encuesta->getId_resultado(),"\n";

?>