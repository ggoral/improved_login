<?php
require_once "inscripcion.php";

$inscripcion = new inscripcion();

$inscripcion->setId_inscripcion(6);
echo "id_inscripcion:",$inscripcion->getId_inscripcion(),"\n";

$inscripcion->setFecha_ingreso("ALGO Q SEA UNA Fecha_ingreso");
echo "Fecha_ingreso:",$inscripcion->getFecha_ingreso(),"\n";

$inscripcion->setLaboratorio_id_lab("ALGO Q SEA UN Laboratorio_id_lab");
echo "Laboratorio_id_lab:",$inscripcion->getLaboratorio_id_lab(),"\n";

$inscripcion->setId_encuesta("ALGO Q SEA UN Id_encuesta");
echo "Id_encuesta:",$inscripcion->getId_encuesta(),"\n";

$inscripcion->setFecha_baja("ALGO Q SEA UN fecha_baja");
echo "fecha_baja:",$inscripcion->getFecha_baja(),"\n";

$inscripcion->setId_analito("ALGO Q SEA UN Id_encuesta");
echo "Id_encuesta:",$inscripcion->getId_analito(),"\n";

?>