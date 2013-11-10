<?php

require_once "conexion.php";
require_once "reactivo.php";

class ORM_reactivo{

public static function buscar_reactivo($id_reactivo)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM reactivo WHERE id_reactivo=?",array($id_reactivo));
    $row = $query[0];

    $reactivo = new reactivo();
    // implementacion del reactivo init
    $reactivo->init($row['id_reactivo'],$row['descripcion']);
    return $reactivo;
  }

public static function obtener_todos_reactivo()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM reactivo");
    return $query;
  }

public static function agregar_reactivo($descripcion)
  {
    $conexion = new Conexion();
    $existe = new ORM_reactivo();
    $existe = $existe->buscar_por_clave($descripcion);
    if ($existe == 0){
      $sql_insert = "INSERT INTO reactivo (descripcion) VALUES (?)";
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
    $query = $conexion->consulta_fetch("SELECT id_reactivo FROM reactivo WHERE descripcion=?",array($descripcion));
    $id_descripcion = $query['id_reactivo'];
    return (int)$id_descripcion;
  }
/*
public static function eliminar_reactivo($id_reactivo)		

//NOTA: SI SE QUIERE BORRAR UN REACTIVO DEBE BORRARSE TODAS LAS RELACIONES PREVIAS PARA ELIMINARLO
  {
    $conexion = new Conexion();
    $sql_delete = "DELETE FROM reactivo WHERE id_reactivo=?";
    $campos = array($id_reactivo);
    $query = $conexion->consulta_row($sql_delete,$campos);
    return $query;
  }
*/
public static function actualizar_reactivo($reactivo)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE reactivo SET descripcion=? WHERE id_reactivo=?";

    $campos = array($reactivo->getDescripcion(), 
                    $reactivo->getId_reactivo());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }

  public static function combinar_reactivo_analito($descripcion, $id_analito)
  {   //SE LE PASA ESOS PARAMETROS PORQUE AL MOMENTO DEL ALTA SE PUEDE CONOCER EL ID ANALITO PERO NO EL ID DE LA reactivo YA QUE NO SE SABE SI EXISTIA O NO PREVIAMENTE DESDE EL CONTROLLER
  $conexion = new Conexion();
  $id_reactivo = new ORM_reactivo();
  $id_reactivo = $id_reactivo->buscar_por_clave($descripcion);  //EN ESTE MOMENTO YA EXISTE SI O SI PORQUE PREVIO SE INSERTO
  $sql_insert = "INSERT INTO analito_reactivo (id_reactivo,id_analito) VALUES (?,?)";
  $campos = array($id_reactivo,$id_analito);
  $query = $conexion->consulta_row($sql_insert,$campos);
  return $query;
  }


}
?>
