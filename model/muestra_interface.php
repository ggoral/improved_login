<?php

require_once "conexion.php";
require_once "muestra.php";

class ORM_muestra{

public static function buscar_muestra($id_muestra)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM muestra WHERE id_muestra=?",array($id_muestra));
    $row = $query[0];

    $muestra = new Muestra();
    // implementacion del metodo init
    //($id_muestra, $resultado_control, $id_interpretacion, $id_decision, $id_resultado) 
    $muestra->init($row['id_muestra'],$row['resultado_control'],$row['id_interpretacion'],$row['id_decision'],$row['id_resultado']);
    return $muestra;
  }

public static function obtener_todos_muestra()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM muestra");
    return $query;
  }

public static function agregar_muestra_campos($resultado_control, $id_interpretacion, $id_decision, $id_resultado) 
  {
    $conexion = new Conexion();
    $sql_insert = "INSERT INTO muestra (resultado_control, id_interpretacion, id_decision, id_resultado)  VALUES (?,?,?,?)";
    $campos = array($resultado_control, $id_interpretacion, $id_decision, $id_resultado);
    $query = $conexion->consulta_row($sql_insert,$campos);
    return $query;
  }

//Baja fisica
//public static function eliminar_muestra($id_muestra)
//  {
//    $conexion = new Conexion();
//    $sql_delete = "delete from muestra where id_muestra=?";
//    $campos = array($id_muestra);
//    $query = $conexion->consulta_row($sql_delete,$campos);
//    return $query;
//  }

//Baja logica
//public static function eliminar_muestra($id_muestra)
//  {
//    $muestra = ORM_muestra::buscar_muestra($id_muestra);
//    $muestra->setActivo(0);
//    $resultado = ORM_muestra::actualizar_muestra($muestra);
//    return $resultado;
//  }
//

  //($id_muestra, $resultado_control, $id_interpretacion, $id_decision, $id_resultado) 
public static function actualizar_muestra($muestra)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE muestra SET resultado_control=?,id_interpretacion=?,id_decision=?,id_resultado=? WHERE id_muestra=?";
    $campos = array($muestra->getResultado_control(), $muestra->getId_interpretacion(), $muestra->getId_decision(), $muestra->getId_resultado(), $muestra->getId_muestra());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }
  
private static function buscar_por_clave($id_interpretacion, $id_decision, $id_resultado)
  {
    $conexion = new Conexion();
    $campos = array($id_interpretacion, $id_decision, $id_resultado);
    $query = $conexion->consulta_fetch("SELECT id_muestra FROM muestra WHERE id_interpretacion=? and id_decision=? and id_resultado=?",$campos);
    $id_muestra = $query['id_muestra'];
    return (int)$id_muestra;
  }
  
public static function agregar_muestra($resultado_control, $id_interpretacion, $id_decision, $id_resultado)
  {
    $existe = ORM_muestra::buscar_por_clave($id_interpretacion, $id_decision, $id_resultado);
    if (!$existe){
      $row_affected = ORM_muestra::agregar_muestra_campos($resultado_control, $id_interpretacion, $id_decision, $id_resultado);
      return $row_affected;
    }
    return 0;
  }

}
?>
