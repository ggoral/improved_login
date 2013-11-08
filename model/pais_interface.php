<?php

require_once "conexion.php";
require_once "pais.php";

class ORM_pais{

public static function buscar_pais($id_pais)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM pais WHERE id_pais=?",array($id_pais));
    $row = $query[0];
    $conexion->cerrar_conexion();

    $pais = new pais();
    // implementacion del metodo init
    $pais->init($row['id_pais'],$row['descripcion']);
    return $pais;
  }

public static function obtener_todos_pais()
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM pais");
    $conexion->cerrar_conexion();
    return $query;
  }

public static function agregar_pais($descripcion)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_insert = "INSERT INTO pais (descripcion) VALUES (?)";
    $campos = array($descripcion);
    $query = $conexion->consulta_fetch($sql_insert,$campos);
    $cantidad = $conexion->cantidad($query);
    $conexion->cerrar_conexion();
    return $cantidad;
  }
/*
public static function eliminar_pais($id_pais)
NOTA: AL BORRAR UN PAIS SE DEBERAN BORRAR LAS CIUDADES ASOCIADAS
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_delete = "DELETE FROM pais WHERE id_pais=?";
    $campos = array($id_pais);
    $query = $conexion->consulta_row($sql_delete,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }
*/
public static function actualizar_pais($pais)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_update = "UPDATE pais SET descripcion=? WHERE id_pais=?";

    $campos = array($pais->getDescripcion(), 
                    $pais->getId_pais());
    $query = $conexion->consulta_row($sql_update,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }


}
?>
