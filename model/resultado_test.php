<?php
/*
   private $id_resultado;
   private $comentario;
   private $fecha_recepcion;
   private $fecha_analisis;
   private $fecha_ingreso;
   private $id_lab;
   private $id_metodo;
   private $id_reactivo;
   private $id_calibrador;
   private $id_analito;
   private $id_papel_filtro;
   private $id_valor;
*/
require_once "resultado.php";

$resultado = new Resultado();

$resultado->setId_resultado(1);
echo "id_resultado:",$resultado->getId_resultado(),"\n";

$resultado->setComentario("comentario_12345");
echo "comentario:",$resultado->getComentario(),"\n";

$resultado->setFecha_recepcion("fecha_recepcion_1");
echo "Fecha_recepcion:",$resultado->getFecha_recepcion(),"\n";

$resultado->setFecha_analisis("Fecha_analisis1");
echo "Fecha_analisis:",$resultado->getFecha_analisis(),"\n";

$resultado->setFecha_ingreso("Fecha_ingreso1");
echo "Fecha_ingreso:",$resultado->getFecha_ingreso(),"\n";

$resultado->setId_lab("unId_lab");
echo "Id_lab:",$resultado->getId_lab(),"\n";

$resultado->setId_metodo("unId_metodo");
echo "Id_metodo:",$resultado->getId_metodo(),"\n";

$resultado->setId_reactivo("unId_reactivo");
echo "Id_reactivo:",$resultado->getId_reactivo(),"\n";

$resultado->setId_calibrador("unId_calibrador");
echo "Id_calibrador:",$resultado->getId_calibrador(),"\n";

$resultado->setId_analito("unId_analito");
echo "Id_analito:",$resultado->getId_analito(),"\n";

$resultado->setId_papel_filtro("un_Id_filtro");
echo "Id_papel_filtro:",$resultado->getId_papel_filtro(),"\n";

$resultado->setId_valor("unId_valor");
echo "Id_valor:",$resultado->getId_valor(),"\n";

$otro_resultado = new Resultado();

$otro_resultado->init( "id_resultado", 
                       "comentario", 
                       "fecha_recepcion", 
                       "fecha_analisis", 
                       "fecha_ingreso", 
                       "id_lab", 
                       "id_metodo",
                       "id_reactivo",
                       "id_calibrador",
                       "id_analito",
                       "id_papel_filtro",
                       "id_valor");

print_r($otro_resultado);

?>