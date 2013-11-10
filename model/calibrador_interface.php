<?php

require_once "conexion.php";
require_once "calibrador.php";

class ORM_calibrador{

public static function buscar_calibrador($id_calibrador)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM calibrador WHERE id_calibrador=?",array($id_calibrador));
    $row = $query[0];

    $calibrador = new calibrador();
    // implementacion del metodo init
    $calibrador->init($row['id_calibrador'],$row['descripcion']);
    return $calibrador;
  }

public static function obtener_todos_calibrador()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM calibrador");
    return $query;
  }

public static function agregar_calibrador($descripcion)
  {
    $conexion = new Conexion();
    $existe = new ORM_calibrador();
    $existe = $existe->buscar_por_clave($descripcion);
    if ($existe == 0){
      $sql_insert = "INSERT INTO calibrador (descripcion) VALUES (?)";
      $campos = array($descripcion);
      $query = $conexion->consulta_row($sql_insert,$campos);
      return $query;
    }
    else{
      return 0;
    }
  }

  private function buscar_por_clave($descripcion)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_calibrador FROM calibrador WHERE descripcion=?",array($descripcion));
    $id_descripcion = $query['id_calibrador'];
    return (int)$id_descripcion;
  }
/*
public static function eliminar_calibrador($id_calibrador)
 //NOTA: SI SE QUIERE BORRAR UN CALIBRADOR DEBE BORRARSE TODAS LAS RELACIONES PREVIAS PARA ELIMINARLO
 
  {
    $conexion = new Conexion();
    $sql_delete = "DELETE FROM calibrador WHERE id_calibrador=?";
    $campos = array($id_calibrador);
    $query = $conexion->consulta_row($sql_delete,$campos);
    return $query;
  }
*/
public static function actualizar_calibrador($calibrador)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE calibrador SET descripcion=? WHERE id_calibrador=?";

    $campos = array($calibrador->getDescripcion(), 
                    $calibrador->getId_calibrador());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }


}
?>
