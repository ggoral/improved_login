<?php

require_once "conexion.php";
require_once "laboratorio.php";

class ORM_laboratorio{

public static function buscar_laboratorio($id_lab)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM laboratorio WHERE id_lab=?",array($id_lab));
    $row = $query[0];

    $laboratorio = new laboratorio();
    $laboratorio->init($row['id_lab'],$row['cod_lab'],$row['institucion'],$row['sector'],$row['responsable'],$row['domicilio'],$row['domicilio_corresp'],$row['mail'],$row['tel'],$row['coord_x'],$row['coord_y'],$row['estado'],$row['id_tipo'],$row['id_ciudad']);
    return $laboratorio;
  }

public static function obtener_todos_laboratorio()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT * FROM laboratorio");
    return $query;
  }

public static function agregar_laboratorio($cod_lab, $institucion, $sector, $responsable, $domicilio, $domicilio_corresp, $mail, $tel, $coord_x, $coord_y, $estado, $id_tipo, $id_ciudad)
  {
    $conexion = new Conexion();
    $existe = ORM_laboratorio::buscar_por_clave($cod_lab);
    if (!$existe){
      $sql_insert = "INSERT INTO laboratorio (cod_lab, institucion, sector, responsable, domicilio, domicilio_corresp, mail, tel, coord_x, coord_y, estado, id_tipo, id_ciudad) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $campos = array($cod_lab, $institucion, $sector, $responsable, $domicilio, $domicilio_corresp, $mail, $tel, $coord_x, $coord_y, $estado, $id_tipo, $id_ciudad);
      $query = $conexion->consulta_row($sql_insert,$campos);
      return $query;
      }
    return 0;
  }

 public static function buscar_por_clave($cod_lab)
  {
    $conexion = new Conexion();
    $query = $conexion->consulta_fetch("SELECT id_lab FROM laboratorio WHERE cod_lab=?",array($cod_lab));
    $cod_lab = $query['id_lab'];
    return (int)$cod_lab;
  }

/*
public static function eliminar_laboratorio($id_lab)
  {
    $conexion = new Conexion();
    $sql_delete = "delete from laboratorio where id_lab=?";
    $campos = array($id_lab);
    $query = $conexion->consulta_row($sql_delete,$campos);
    return $query;
  }
  */

public static function actualizar_laboratorio($laboratorio)
  {
    $conexion = new Conexion();
    $sql_update = "UPDATE laboratorio SET cod_lab=?,institucion=?,sector=?,responsable=?,domicilio=?,domicilio_corresp=?,mail=?,tel=?,coord_x=?,coord_y=?,estado=?,id_tipo=?,id_ciudad=? WHERE id_lab=?";

    $campos = array($laboratorio->getCod_lab(), 
                    $laboratorio->getInstitucion(), 
                    $laboratorio->getSector(),
                    $laboratorio->getResponsable(),
                    $laboratorio->getDomicilio(),
                    $laboratorio->getDomicilio_corresp(),
                    $laboratorio->getMail(),
                    $laboratorio->getTel(),
                    $laboratorio->getcoord_x(),
                    $laboratorio->getcoord_y(),
                    $laboratorio->getEstado(),
                    $laboratorio->getId_tipo(),
                    $laboratorio->getId_ciudad(),
                    $laboratorio->getId_lab());
    $query = $conexion->consulta_row($sql_update,$campos);
    return $query;
  }


  public static function mostrar_coordenadas()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT cod_lab,coord_x,coord_y FROM laboratorio");
    return $query;
  }


  public static function mostrar_laboratorio()
  {
    $conexion = new Conexion();
    $query = $conexion->consulta("SELECT 	id_lab,
											cod_lab,
											ciudad.descripcion AS ciudad, 
											tipo_lab.descripcion AS tipo_lab
										FROM laboratorio 	INNER JOIN ciudad ON (laboratorio.id_ciudad = ciudad.id_ciudad) 
															INNER JOIN tipo_lab ON (laboratorio.id_tipo = tipo_lab.id_tipo) where id_lab <> 0");
    return $query;
  }
	public static function mostrar_datos_laboratorio($id_lab)
	  {
		$conexion = new Conexion();
		$query = $conexion->consulta("SELECT 	*,
												ciudad.descripcion AS ciudad, 
												tipo_lab.descripcion AS tipo_lab
											FROM laboratorio 	INNER JOIN ciudad ON (laboratorio.id_ciudad = ciudad.id_ciudad) 
																INNER JOIN tipo_lab ON (laboratorio.id_tipo = tipo_lab.id_tipo)
											WHERE id_lab = ?",array($id_lab));
		return $query;
	  }
	  
	public static function buscar_laboratorio_Twig($id_laboratorio)
  {
    $conexion = new Conexion();
    $laboratorio = $conexion->consulta_fetch("SELECT * FROM laboratorio WHERE id_lab=?",array($id_laboratorio));
    return $laboratorio;
  }
  
  	public static function buscar_laboratorio_Twig2($id_laboratorio)
  {
    $conexion = new Conexion();
    $laboratorio = $conexion->consulta_fetch("SELECT id_lab AS id,
	cod_lab,
	institucion,
	sector,
	responsable,
	domicilio,
	domicilio_corresp,
	mail,
	tel,
	coord_x,
	coord_y,
	estado,
	laboratorio.id_tipo,
	laboratorio.id_ciudad,
	ciudad.descripcion AS ciudad, 
	tipo_lab.descripcion AS tipo_lab
	FROM laboratorio 	INNER JOIN ciudad ON (laboratorio.id_ciudad = ciudad.id_ciudad) 
						INNER JOIN tipo_lab ON (laboratorio.id_tipo = tipo_lab.id_tipo)
	WHERE id_lab = ?",array($id_laboratorio));
    return $laboratorio;
  }
}
?>
