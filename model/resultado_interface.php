<?php

require_once "conexion.php";
require_once "resultado.php";

class ORM_resultado{

public static function buscar_resultado($id_resultado)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM resultado WHERE id_resultado=?",array($id_resultado));
    $row = $query[0];

    $resultado = new resultado();
    $resultado->init($row['id_resultado'],
                     $row['comentario'], 
                     $row['fecha_recepcion'], 
                     $row['fecha_analisis'], 
                     $row['fecha_ingreso'], 
                     $row['id_lab'], 
                     $row['id_metodo'], 
                     $row['id_reactivo'], 
                     $row['id_calibrador'], 
                     $row['id_analito'], 
                     $row['id_papel_filtro'], 
                     $row['id_valor']);
    return $resultado;
  }

public static function obtener_todos_resultado()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM resultado");
    return $query;
  }

public static function agregar_resultado($comentario, $fecha_recepcion, $fecha_analisis, $fecha_ingreso, $id_lab, $id_metodo, $id_reactivo, $id_calibrador, $id_analito, $id_papel_filtro, $id_valor)
  {
    $conexion = new Conexion();
    $sql_insert = "INSERT INTO resultado (comentario, fecha_recepcion, fecha_analisis, fecha_ingreso, id_lab, id_metodo, id_reactivo, id_calibrador, id_analito, id_papel_filtro, id_valor) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $campos = array($comentario, $fecha_recepcion, $fecha_analisis, $fecha_ingreso, $id_lab, $id_metodo, $id_reactivo, $id_calibrador, $id_analito, $id_papel_filtro, $id_valor);
    $query = $conexion->consulta_row($sql_insert,$campos);
    return $query;
  }

public static function buscar_por_clave($id_resultado)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_resultado FROM resultado WHERE id_resultado=?",array($id_resultado));
    $id_resultado = $query['id_resultado'];
    return (int)$id_resultado;
  }

/*
public static function eliminar_resultado($id_resultado)
  {
    $conexion = new Conexion();
    $sql_delete = "delete from resultado where id_resultado=?";
    $campos = array($id_resultado);
    $query = $conexion->consulta_row($sql_delete,$campos);
    return $query;
  }
  */

public static function actualizar_resultado($resultado)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE resultado SET comentario=?, fecha_recepcion=?, fecha_analisis=?, fecha_ingreso=?, id_lab=?, id_metodo=?, id_reactivo=?, id_calibrador=?, id_analito=?, id_papel_filtro=?, id_valor=? WHERE id_resultado=?";

    $campos = array($resultado->getComentario(), 
                    $resultado->getFecha_recepcion(),
                    $resultado->getFecha_analisis(),
                    $resultado->getFecha_ingreso(),
                    $resultado->getId_lab(),
                    $resultado->getId_metodo(),
                    $resultado->getId_reactivo(),
                    $resultado->getId_calibrador(),
                    $resultado->getId_analito(),
                    $resultado->getId_papel_filtro(),
                    $resultado->getId_valor(),
                    $resultado->getId_resultado());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }

public static function buscar_resultado_Twig()
  {
    $conexion = new Conexion();
    $resultado = $conexion->consulta_fetch("SELECT id_resultado, 
      comentario, 
      fecha_recepcion, 
      fecha_analisis, 
      fecha_ingreso, 
      laboratorio.cod_lab, 
      metodo.descripcion AS descmetodo,
      reactivo.descripcion AS descreactivo,
      calibrador.descripcion AS desccalibrador,
      analito.descripcion AS descanalito,
      papel_filtro.descripcion AS descpapel_filtro,
      valor_corte.descripcion AS descvalor_corte
      FROM resultado INNER JOIN laboratorio ON resultado.id_lab = laboratorio.id_lab INNER JOIN metodo ON resultado.id_metodo = metodo.id_metodo INNER JOIN reactivo ON resultado.id_reactivo = reactivo.id_reactivo INNER JOIN calibrador ON calibrador.id_calibrador = resultado.id_calibrador INNER JOIN analito ON resultado.id_analito = analito.id_analito INNER JOIN papel_filtro ON resultado.id_papel_filtro = papel_filtro.id_papel_filtro INNER JOIN valor_corte ON resultado.id_valor = valor_corte.id_valor" );
    return $resultado;
  }

  public static function buscar_resultado_laboratorio_Twig($id_resultado)
  {
    $conexion = new Conexion();
    $resultado = $conexion->consulta("SELECT id_lab, cod_lab, IF(laboratorio.id_lab IN (SELECT id_lab FROM resultado WHERE id_resultado = ?), 'selected', '') AS activo FROM laboratorio",array($id_resultado));
    return $resultado;
  }

 public static function buscar_resultado_metodo_Twig($id_resultado)
  {
    $conexion = new Conexion();
    $resultado = $conexion->consulta("SELECT *, IF(metodo.id_metodo IN (SELECT id_metodo FROM resultado WHERE id_resultado = ?), 'selected', '') AS activo FROM metodo",array($id_resultado));
    return $resultado;
  }

 public static function buscar_resultado_reactivo_Twig($id_resultado)
  {
    $conexion = new Conexion();
    $resultado = $conexion->consulta("SELECT *, IF(reactivo.id_reactivo IN (SELECT id_reactivo FROM resultado WHERE id_resultado = ?), 'selected', '') AS activo FROM reactivo",array($id_resultado));
    return $resultado;
  }

 public static function buscar_resultado_calibrador_Twig($id_resultado)
  {
    $conexion = new Conexion();
    $resultado = $conexion->consulta("SELECT *, IF(calibrador.id_calibrador IN (SELECT id_calibrador FROM resultado WHERE id_resultado = ?), 'selected', '') AS activo FROM calibrador",array($id_resultado));
    return $resultado;
  }

 public static function buscar_resultado_analito_Twig($id_resultado)
  {
    $conexion = new Conexion();
    $resultado = $conexion->consulta("SELECT *, IF(analito.id_analito IN (SELECT id_analito FROM resultado WHERE id_resultado = ?), 'selected', '') AS activo FROM analito",array($id_resultado));
    return $resultado;
  }

 public static function buscar_resultado_papel_filtro_Twig($id_resultado)
  {
    $conexion = new Conexion();
    $resultado = $conexion->consulta("SELECT *, IF(papel_filtro.id_papel_filtro IN (SELECT id_papel_filtro FROM resultado WHERE id_resultado = ?), 'selected', '') AS activo FROM papel_filtro",array($id_resultado));
    return $resultado;
  }

 public static function buscar_resultado_valor_corte_Twig($id_resultado)
  {
    $conexion = new Conexion();
    $resultado = $conexion->consulta("SELECT *, IF(valor_corte.id_valor IN (SELECT id_valor FROM resultado WHERE id_resultado = ?), 'selected', '') AS activo FROM valor_corte",array($id_resultado));
    return $resultado;
  }

public static function buscar_resultado_Twig_Tabla()
  {
    $conexion = new Conexion();
    $resultado = $conexion->consulta("SELECT id_resultado, 
										  comentario, 
										  fecha_analisis, 
										  laboratorio.cod_lab, 
										  analito.descripcion AS desc_analito
									FROM resultado 
									INNER JOIN laboratorio ON resultado.id_lab = laboratorio.id_lab 
									INNER JOIN analito ON resultado.id_analito = analito.id_analito" );
    return $resultado;
  }
  
  public static function buscar_resultado_Twig2($id_resultado)
  {
    $conexion = new Conexion();
    $resultado = $conexion->consulta_fetch("SELECT id_resultado, 
      comentario, 
      fecha_recepcion, 
      fecha_analisis, 
      fecha_ingreso, 
      laboratorio.cod_lab, 
      metodo.descripcion AS descmetodo,
      reactivo.descripcion AS descreactivo,
      calibrador.descripcion AS desccalibrador,
      analito.descripcion AS descanalito,
      papel_filtro.descripcion AS descpapel_filtro,
      valor_corte.descripcion AS descvalor_corte
      FROM resultado INNER JOIN laboratorio ON resultado.id_lab = laboratorio.id_lab INNER JOIN metodo ON resultado.id_metodo = metodo.id_metodo INNER JOIN reactivo ON resultado.id_reactivo = reactivo.id_reactivo INNER JOIN calibrador ON calibrador.id_calibrador = resultado.id_calibrador INNER JOIN analito ON resultado.id_analito = analito.id_analito INNER JOIN papel_filtro ON resultado.id_papel_filtro = papel_filtro.id_papel_filtro INNER JOIN valor_corte ON resultado.id_valor = valor_corte.id_valor
	  WHERE id_resultado = ?", array($id_resultado));
    return $resultado;
  }

}
?>
