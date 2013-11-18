<?php

require_once "laboratorio_interface.php";

/*public static function agregar_laboratorio($cod_lab, $institucion, $sector, $responsable, $domicilio, $domicilio_corresp, $mail, $tel, $coord_x, $coord_y, $estado, $id_tipo, $id_ciudad)*/
/*$laboratorio = ORM_laboratorio::agregar_laboratorio(2,'instucion','sectir','sivoriresponsable','domilico','domilicocorres','mail@mail.mail','1234322222','45','67','activo',1,1);

//$laboratorio = ORM_laboratorio::buscar_laboratorio(3);//BUSCA POR ID DE LAB!!
//OJO!!!!!! SI HACES ESTO MUCHAS VECES SEGURO DA ERROR; ESTAS BUSCANDO EL CODLAB = 2 Y BORRANDO EL MISMO!
/*$affected_row = ORM_laboratorio::eliminar_laboratorio(2);
echo "Cantidad Afectada:",$affected_row,"\n";*/

//$laboratorio->setCod_lab(1);
//$laboratorio->setInstitucion("CAMBIOOOOOOOOO!!!");
//$affected_row = ORM_laboratorio::actualizar_laboratorio($laboratorio);
//echo "Cantidad Afectada:",$affected_row,"\n";

$laboratoriosMaps = ORM_laboratorio::mostrar_coordenadas();
print_r($laboratoriosMaps);

//imprimir todos los laboratorios
//$laboratorios = ORM_laboratorio::obtener_todos_laboratorio();
//print_r($laboratorios);

?>