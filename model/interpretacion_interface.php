<?php

require_once "conexion.php";
require_once "interpretacion.php";

class ORM_interpretacion{

public static function buscar_interpretacion($id_interpretacion)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM interpretacion WHERE id_interpretacion=?",array($id_interpretacion));
    $row = $query[0];

    $interpretacion = new interpretacion();
    // implementacion del metodo init
    $interpretacion->init($row['id_interpretacion'],$row['descripcion']);
    return $interpretacion;
  }

public static function obtener_todos_interpretacion()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM interpretacion");
    return $query;
  }

public static function agregar_interpretacion($descripcion)
  {
    $conexion = new Conexion();
    $existe = new ORM_interpretacion();
    $existe = $existe->buscar_por_clave($descripcion);
    if ($existe == 0){
      $sql_insert = "INSERT INTO interpretacion (descripcion) VALUES (?)";
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
    $query = $conexion->consulta_fetch("SELECT id_interpretacion FROM interpretacion WHERE descripcion=?",array($descripcion));
    $id_descripcion = $query['id_interpretacion'];
    return (int)$id_descripcion;
  }
/*
public static function eliminar_interpretacion($id_interpretacion)
 //NOTA: SI SE QUIERE BORRAR UNA INTERPRETACION DEBE BORRARSE TODAS LAS RELACIONES PREVIAS PARA ELIMINARLO
  {
    $conexion = new Conexion();
    $sql_delete = "DELETE FROM interpretacion WHERE id_interpretacion=?";
    $campos = array($id_interpretacion);
    $query = $conexion->consulta_row($sql_delete,$campos);
    return $query;
  }
*/
public static function actualizar_interpretacion($interpretacion)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE interpretacion SET descripcion=? WHERE id_interpretacion=?";

    $campos = array($interpretacion->getDescripcion(), 
                    $interpretacion->getId_interpretacion());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }

  public static function combinar_interpretacion_analito($descripcion, $id_analito)
  {   //SE LE PASA ESOS PARAMETROS PORQUE AL MOMENTO DEL ALTA SE PUEDE CONOCER EL ID ANALITO PERO NO EL ID DE LA interpretacion YA QUE NO SE SABE SI EXISTIA O NO PREVIAMENTE DESDE EL CONTROLLER
  $conexion = new Conexion();
  $id_interpretacion = new ORM_interpretacion();
  $id_interpretacion = $id_interpretacion->buscar_por_clave($descripcion);  //EN ESTE MOMENTO YA EXISTE SI O SI PORQUE PREVIO SE INSERTO
  $sql_insert = "INSERT INTO analito_interpretacion (id_interpretacion,id_analito) VALUES (?,?)";
  $campos = array($id_interpretacion,$id_analito);
  $query = $conexion->consulta_row($sql_insert,$campos);
  return $query;
  }


}
?>
