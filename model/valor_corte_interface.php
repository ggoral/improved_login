<?php

require_once "conexion.php";
require_once "valor_corte.php";

class ORM_valor_corte{

public static function buscar_valor_corte($id_valor)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM valor_corte WHERE id_valor=?",array($id_valor));
    $row = $query[0];

    $valor = new valor_corte();
    // implementacion del valor init
    $valor->init($row['id_valor'],$row['descripcion']);
    return $valor;
  }

public static function obtener_todos_valor_corte()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM valor_corte");
    return $query;
  }

public static function agregar_valor_corte($descripcion)
  {
    $conexion = new Conexion();
    $existe = new ORM_valor_corte();
    $existe = $existe->buscar_por_clave($descripcion);
    if ($existe == 0){
      $sql_insert = "INSERT INTO valor_corte (descripcion) VALUES (?)";
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
    $query = $conexion->consulta_fetch("SELECT id_valor FROM valor_corte WHERE descripcion=?",array($descripcion));
    $id_descripcion = $query['id_valor'];
    return (int)$id_descripcion;
  }
/*
public static function eliminar_valor_corte($id_valor)		

//NOTA: SI SE QUIERE BORRAR UN VALOR DE CORTE DEBE BORRARSE TODAS LAS RELACIONES PREVIAS PARA ELIMINARLO
  {
    $conexion = new Conexion();
    $sql_delete = "DELETE FROM valor_corte WHERE id_valor=?";
    $campos = array($id_valor);
    $query = $conexion->consulta_row($sql_delete,$campos);
    return $query;
  }
*/
public static function actualizar_valor_corte($valor)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE valor_corte SET descripcion=? WHERE id_valor=?";

    $campos = array($valor->getDescripcion(), 
                    $valor->getId_valor_corte());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }

  public static function combinar_valor_corte_analito($descripcion, $id_analito)
  {   //SE LE PASA ESOS PARAMETROS PORQUE AL MOMENTO DEL ALTA SE PUEDE CONOCER EL ID ANALITO PERO NO EL ID DE LA valor_corte YA QUE NO SE SABE SI EXISTIA O NO PREVIAMENTE DESDE EL CONTROLLER
  $conexion = new Conexion();
  $id_valor_corte = new ORM_valor_corte();
  $id_valor_corte = $id_valor_corte->buscar_por_clave($descripcion);  //EN ESTE MOMENTO YA EXISTE SI O SI PORQUE PREVIO SE INSERTO
  $sql_insert = "INSERT INTO analito_valor_corte (id_valor_corte,id_analito) VALUES (?,?)";
  $campos = array($id_valor_corte,$id_analito);
  $query = $conexion->consulta_row($sql_insert,$campos);
  return $query;
  }


}
?>
