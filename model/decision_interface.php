<?php

require_once "conexion.php";
require_once "decision.php";

class ORM_decision{

public static function buscar_decision($id_decision)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM decision WHERE id_decision=?",array($id_decision));
    $row = $query[0];
    $conexion->cerrar_conexion();

    $decision = new decision();
    // implementacion del metodo init
    $decision->init($row['id_decision'],$row['descripcion']);
    return $decision;
  }

public static function obtener_todos_decision()
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM decision");
    $conexion->cerrar_conexion();
    return $query;
  }

public static function agregar_decision($descripcion)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_insert = "INSERT INTO decision (descripcion) VALUES (?)";
    $campos = array($descripcion);
    $query = $conexion->consulta_fetch($sql_insert,$campos);
    $cantidad = $conexion->cantidad($query);
    $conexion->cerrar_conexion();
    return $cantidad;
  }
/*
public static function eliminar_decision($id_decision)
 //NOTA: SI SE QUIERE BORRAR UNA DECISION DEBE BORRARSE TODAS LAS RELACIONES PREVIAS PARA ELIMINARLO
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_delete = "DELETE FROM decision WHERE id_decision=?";
    $campos = array($id_decision);
    $query = $conexion->consulta_row($sql_delete,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }
*/
public static function actualizar_decision($decision)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_update = "UPDATE decision SET descripcion=? WHERE id_decision=?";

    $campos = array($decision->getDescripcion(), 
                    $decision->getId_decision());
    $query = $conexion->consulta_row($sql_update,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }


}
?>
