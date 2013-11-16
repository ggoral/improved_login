<?php

require_once "conexion.php";
require_once "pais.php";

class ORM_pais{

public static function buscar_pais($id_pais)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM pais WHERE id_pais=?",array($id_pais));
    $row = $query[0];

    $pais = new Pais();
    // implementacion del metodo init
    $pais->init($row['id_pais'],$row['descripcion']);
    return $pais;
  }

public static function obtener_todos_pais()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM pais");
    return $query;
  }

public static function agregar_pais($descripcion)
  {
    $conexion = new Conexion();
    $existe = ORM_pais::buscar_por_clave($descripcion);
    if (!$existe){
      $sql_insert = "INSERT INTO pais (descripcion) VALUES (?)";
      $query = $conexion->consulta_row($sql_insert,array($descripcion));
      return $query;
      }
    return 0;
  }

public static function buscar_por_clave($descripcion)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_pais FROM pais WHERE descripcion=?",array($descripcion));
    $id_descripcion = $query['id_pais'];
    return (int)$id_descripcion;
  }
/*
public static function eliminar_pais($id_pais)
NOTA: AL BORRAR UN PAIS SE DEBERAN BORRAR LAS CIUDADES ASOCIADAS
  {
    $conexion = new Conexion();
    $sql_delete = "DELETE FROM pais WHERE id_pais=?";
    $campos = array($id_pais);
    $query = $conexion->consulta_row($sql_delete,$campos);
    return $query;
  }
*/
public static function actualizar_pais($pais)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE pais SET descripcion=? WHERE id_pais=?";

    $campos = array($pais->getDescripcion(), 
                    $pais->getId_pais());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }

public static function buscar_pais_Twig($id_pais)
  {
    $conexion = new Conexion();
    $pais = $conexion->consulta_fetch("SELECT * FROM pais WHERE id_pais=?",array($id_pais));
    return $pais;
  }

}
?>
