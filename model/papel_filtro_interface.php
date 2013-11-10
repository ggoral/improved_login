<?php

require_once "conexion.php";
require_once "papel_filtro.php";

class ORM_papel_filtro{

public static function buscar_papel_filtro($id_papel_filtro)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM papel_filtro WHERE id_papel_filtro=?",array($id_papel_filtro));
    $row = $query[0];

    $valor = new papel_filtro();
    // implementacion del valor init
    $valor->init($row['id_papel_filtro'],$row['descripcion']);
    return $valor;
  }

public static function obtener_todos_papel_filtro()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM papel_filtro");
    return $query;
  }

public static function agregar_papel_filtro($descripcion)
  {
    $conexion = new Conexion();
    $existe = new ORM_papel_filtro();
    $existe = $existe->buscar_por_clave($descripcion);
    if ($existe == 0){
      $sql_insert = "INSERT INTO papel_filtro (descripcion) VALUES (?)";
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
    $query = $conexion->consulta_fetch("SELECT id_papel_filtro FROM papel_filtro WHERE descripcion=?",array($descripcion));
    $id_descripcion = $query['id_papel_filtro'];
    return (int)$id_descripcion;
  }
/*
public static function eliminar_papel_filtro($id_papel_filtro)		

//NOTA: SI SE QUIERE BORRAR UN PAPEL DE FILTRO DEBE BORRARSE TODAS LAS RELACIONES PREVIAS PARA ELIMINARLO
  {
    $conexion = new Conexion();
    $sql_delete = "DELETE FROM papel_filtro WHERE id_papel_filtro=?";
    $campos = array($id_papel_filtro);
    $query = $conexion->consulta_row($sql_delete,$campos);
    return $query;
  }
*/
public static function actualizar_papel_filtro($valor)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE papel_filtro SET descripcion=? WHERE id_papel_filtro=?";

    $campos = array($valor->getDescripcion(), 
                    $valor->getId_papel_filtro());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }


}
?>
