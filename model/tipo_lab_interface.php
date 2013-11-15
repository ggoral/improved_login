<?php

require_once "conexion.php";
require_once "tipo_lab.php";

class ORM_tipo_lab{

public static function buscar_tipo_lab($id_tipo_lab)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM tipo_lab WHERE id_tipo=?",array($id_tipo_lab));
    $row = $query[0];

    $valor = new tipo_lab();
    // implementacion del valor init
    $valor->init($row['id_tipo'],$row['descripcion']);
    return $valor;
  }

public static function obtener_todos_tipo_lab()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM tipo_lab");
    return $query;
  }

public static function agregar_tipo_lab($descripcion)
  {
    $conexion = new Conexion();
    $existe = ORM_tipo_lab::buscar_por_clave($descripcion);
    if (!$existe){
      $sql_insert = "INSERT INTO tipo_lab (descripcion) VALUES (?)";
      $query = $conexion->consulta_row($sql_insert, array($descripcion));
      return $query;
      }
    return 0;
  }

  private function buscar_por_clave($descripcion)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_tipo FROM tipo_lab WHERE descripcion=?",array($descripcion));
    $id_descripcion = $query['id_tipo'];
    return (int)$id_descripcion;
  }
/*
public static function eliminar_tipo_lab($id_tipo_lab)		

//NOTA: SI SE QUIERE BORRAR UN PAPEL DE FILTRO DEBE BORRARSE TODAS LAS RELACIONES PREVIAS PARA ELIMINARLO
  {
    $conexion = new Conexion();
    $sql_delete = "DELETE FROM tipo_lab WHERE id_tipo=?";
    $campos = array($id_tipo_lab);
    $query = $conexion->consulta_row($sql_delete,$campos);
    return $query;
  }
*/
public static function actualizar_tipo_lab($valor)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE tipo_lab SET descripcion=? WHERE id_tipo=?";

    $campos = array($valor->getDescripcion(), 
                    $valor->getId_tipo_lab());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }

public static function buscar_tipo_lab_Twig($id_tipo_lab)
  {
    $conexion = new Conexion();
    $tipo_lab = $conexion->consulta_fetch("SELECT * FROM tipo_lab WHERE id_tipo_lab=?",array($id_tipo_lab));
    return $tipo_lab;
  }

}
?>
