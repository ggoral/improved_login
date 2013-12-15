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
  
public static function buscar_por_clave($id_interpretacion, $id_decision, $id_resultado)
  {
    $conexion = new Conexion();
    $campos = array($id_interpretacion, $id_decision, $id_resultado);
    $query = $conexion->consulta_fetch("SELECT id_muestra FROM muestra WHERE id_interpretacion=? and id_decision=? and id_resultado=?",$campos);
    $id_muestra = $query['id_muestra'];
    return (int)$id_muestra;
  }

  public static function buscar_cant_por_clave($id_resultado)
  {
    $conexion = new Conexion();
    $campos = array($id_resultado);
    $query = $conexion->consulta_fetch("SELECT COUNT(id_muestra) AS cant_id_muestra FROM muestra WHERE  id_resultado= ? ",$campos);
    $cant_id_muestra = $query['cant_id_muestra'];
    return (int)$cant_id_muestra;
  }
  
public static function agregar_muestra($resultado_control, $id_interpretacion, $id_decision, $id_resultado)
  {
    //$existe = ORM_muestra::buscar_por_clave($id_interpretacion, $id_decision, $id_resultado);
    $cant = ORM_muestra::buscar_cant_por_clave($id_resultado);
   
    if ($cant < 1){ 
      $row_affected = ORM_muestra::agregar_muestra_campos($resultado_control, $id_interpretacion, $id_decision, $id_resultado);
      return $row_affected;
    }
    return 0;
  }

  public static function agregar_muestra_lab($resultado_control, $id_interpretacion, $id_decision, $id_resultado)
  {
    //$existe = ORM_muestra::buscar_por_clave($id_interpretacion, $id_decision, $id_resultado);
    $cant = ORM_muestra::buscar_cant_por_clave($id_resultado);
   
    if ($cant < 2){ 
      $row_affected = ORM_muestra::agregar_muestra_campos($resultado_control, $id_interpretacion, $id_decision, $id_resultado);
      return $row_affected;
    }
    return 0;
  }
  
public static function buscar_muestra_Twig_Tabla()
  {
    $conexion = new Conexion();
    $muestra = $conexion->consulta("SELECT id_muestra, 
                      resultado_control, 
                      interpretacion.descripcion AS interpretacion, 
                      decision.descripcion AS decision, 
                      resultado.id_resultado
                  FROM muestra 
                  INNER JOIN decision ON muestra.id_decision = decision.id_decision
                  INNER JOIN interpretacion ON muestra.id_interpretacion = interpretacion.id_interpretacion 
                  INNER JOIN resultado ON muestra.id_resultado = resultado.id_resultado" );
    return $muestra;
  }

public static function buscar_muestra_Twig_Tabla_para_lab($codlab)
  {
    $conexion = new Conexion();
    $muestra = $conexion->consulta("SELECT id_muestra, 
      resultado_control, 
      interpretacion.descripcion AS interpretacion,
      decision.descripcion AS decision,
      resultado.id_resultado
      resultado.comentario, 
      resultado.fecha_recepcion, 
      resultado.fecha_analisis, 
      resultado.fecha_ingreso, 
      laboratorio.id_lab,
      metodo.descripcion AS descmetodo,
      reactivo.descripcion AS descreactivo,
      calibrador.descripcion AS desccalibrador,
      analito.descripcion AS descanalito,
      papel_filtro.descripcion AS descpapel_filtro,
      valor_corte.descripcion AS descvalor_corte
                  FROM muestra 
                  INNER JOIN interpretacion ON muestra.id_interpretacion = interpretacion.id_interpretacion INNER JOIN decision ON muestra.id_decision = decision.id_decision INNER JOIN resultado ON muestra.id_resultado = resultado.id_resultado INNER JOIN laboratorio ON resultado.id_lab = laboratorio.id_lab INNER JOIN metodo ON resultado.id_metodo = metodo.id_metodo INNER JOIN reactivo ON resultado.id_reactivo = reactivo.id_reactivo INNER JOIN calibrador ON calibrador.id_calibrador = resultado.id_calibrador INNER JOIN analito ON resultado.id_analito = analito.id_analito INNER JOIN papel_filtro ON resultado.id_papel_filtro = papel_filtro.id_papel_filtro INNER JOIN valor_corte ON resultado.id_valor = valor_corte.id_valor
    WHERE id_muestra = ? AND laboratorio.cod_lab = $cod_lab", array($id_muestra));
                 
    return $muestra;
  }


public static function buscar_muestra_Twig2($id_muestra)
  {
    $conexion = new Conexion();
    $muestra = $conexion->consulta_fetch("SELECT id_muestra, 
      resultado_control, 
      interpretacion.descripcion AS interpretacion,
      decision.descripcion AS decision,
      resultado.id_resultado,
      resultado.comentario, 
      resultado.fecha_recepcion, 
      resultado.fecha_analisis, 
      resultado.fecha_ingreso, 
      laboratorio.id_lab,
      metodo.descripcion AS descmetodo,
      reactivo.descripcion AS descreactivo,
      calibrador.descripcion AS desccalibrador,
      analito.descripcion AS descanalito,
      papel_filtro.descripcion AS descpapel_filtro,
      valor_corte.descripcion AS descvalor_corte
                  FROM muestra 
                  INNER JOIN interpretacion ON muestra.id_interpretacion = interpretacion.id_interpretacion INNER JOIN decision ON muestra.id_decision = decision.id_decision INNER JOIN resultado ON muestra.id_resultado = resultado.id_resultado INNER JOIN laboratorio ON resultado.id_lab = laboratorio.id_lab INNER JOIN metodo ON resultado.id_metodo = metodo.id_metodo INNER JOIN reactivo ON resultado.id_reactivo = reactivo.id_reactivo INNER JOIN calibrador ON calibrador.id_calibrador = resultado.id_calibrador INNER JOIN analito ON resultado.id_analito = analito.id_analito INNER JOIN papel_filtro ON resultado.id_papel_filtro = papel_filtro.id_papel_filtro INNER JOIN valor_corte ON resultado.id_valor = valor_corte.id_valor
    WHERE id_muestra = ?", array($id_muestra));
                 
    return $muestra;
  }

public static function buscar_muestra_interpretacion_Twig($id_muestra)
  {
    $conexion = new Conexion();
    $muestra = $conexion->consulta("SELECT *, IF(interpretacion.id_interpretacion IN (SELECT id_interpretacion FROM muestra WHERE id_muestra = ?), 'selected', '') AS activo FROM interpretacion",array($id_muestra));
    return $muestra;
  }

public static function buscar_muestra_decision_Twig($id_muestra)
  {
    $conexion = new Conexion();
    $muestra = $conexion->consulta("SELECT *, IF(decision.id_decision IN (SELECT id_decision FROM muestra WHERE id_muestra = ?), 'selected', '') AS activo FROM decision",array($id_muestra));
    return $muestra;
  }

public static function buscar_muestra_resultado_Twig($id_muestra)
  {
    $conexion = new Conexion();
    $muestra = $conexion->consulta("SELECT *, IF(resultado.id_resultado IN (SELECT id_resultado FROM muestra WHERE id_muestra = ?), 'selected', '') AS activo FROM resultado",array($id_muestra));
    return $muestra;
  }
 public static function buscar_muestra_resultado_laboratorio_Twig($id_lab)
 {
  $conexion = new Conexion();
  $muestra = $conexion->consulta("SELECT id_muestra, resultado_control, id_interpretacion, id_decision, muestra.`id_resultado` FROM muestra INNER JOIN resultado ON muestra.`id_resultado` = resultado.`id_resultado` INNER JOIN laboratorio ON resultado.`id_lab` = laboratorio.`id_lab` WHERE laboratorio.`id_lab` = ?",array($id_lab));
  return $muestra;
 }


}
?>
