<?php

require_once "conexion.php";
require_once "laboratorio.php";

class ORM_laboratorio{

public static function buscar_laboratorio($id_lab)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM laboratorio WHERE id_lab=?",array($id_lab));
    $row = $query[0];
    $conexion->cerrar_conexion();

    $laboratorio = new laboratorio();
    $laboratorio->init($row['id_lab'],$row['cod_lab'],$row['institucion'],$row['sector'],$row['responsable'],$row['domicilio'],$row['domicilio_corresp'],$row['mail'],$row['tel'],$row['coord_x'],$row['coord_y'],$row['estado'],$row['id_tipo'],$row['id_ciudad']);
    return $laboratorio;
  }

public static function obtener_todos_laboratorio()
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $query = $conexion->consulta("SELECT * FROM laboratorio");
    $conexion->cerrar_conexion();
    return $query;
  }

public static function agregar_laboratorio($cod_lab, $institucion, $sector, $responsable, $domicilio, $domicilio_corresp, $mail, $tel, $coord_x, $coord_y, $estado, $id_tipo, $id_ciudad)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_insert = "INSERT INTO laboratorio (cod_lab, institucion, sector, responsable, domicilio, domicilio_corresp, mail, tel, coord_x, coord_y, estado, id_tipo, id_ciudad) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $campos = array($cod_lab, $institucion, $sector, $responsable, $domicilio, $domicilio_corresp, $mail, $tel, $coord_x, $coord_y, $estado, $id_tipo, $id_ciudad);
    $query = $conexion->consulta_fetch($sql_insert,$campos);
    $cantidad = $conexion->cantidad($query);
    $conexion->cerrar_conexion();
    return $cantidad;
  }

public static function eliminar_laboratorio($id_lab)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
    $sql_delete = "delete from laboratorio where id_lab=?";
    $campos = array($id_lab);
    $query = $conexion->consulta_row($sql_delete,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }

public static function actualizar_laboratorio($laboratorio)
  {
    $conexion = new Conexion();
    $conexion->crear_conexion();
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
    print_r($laboratorio);
    echo $sql_update;
    //die();
    $query = $conexion->consulta_row($sql_update,$campos);
    $conexion->cerrar_conexion();
    return $query;
  }


}
?>
