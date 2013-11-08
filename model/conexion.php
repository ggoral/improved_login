<?php
 
class Conexion 
  {
    private $conexion;

    function crear_conexion()
      {
        if(!isset($this->conexion)){
          $db_host="127.0.0.1";
          $db_user="proyecto";
          $db_pass="proyecto";
          $db_base="fba_db";
          $this->conexion = new PDO("mysql:dbname=$db_base;host=$db_host",$db_user,$db_pass);
        }
      }

    function cerrar_conexion()
      {
        $this->conexion = null;
      }

    function consulta($consulta, $atributos=null)
      {
        $this->crear_conexion();
        try{
          $query = $this->conexion->prepare($consulta);
          $query->execute($atributos);
          $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
          $resultado = 'Error: ' . $e->getMessage();
        }
        return $resultado;
      }

    function consulta_fetch($consulta, $atributos=null)
      {
        $this->crear_conexion();
        try{
          $query = $this->conexion->prepare($consulta);
          $query->execute($atributos);
          $resultado = $query->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
          $resultado = 'Error: ' . $e->getMessage();
        }
        return $resultado;
      }

      function consulta_row($consulta, $atributos=null)
      {
        $this->crear_conexion();
        try{
          $query = $this->conexion->prepare($consulta);
          $query->execute($atributos);
          $affected_rows = $query->rowCount();
        }
        catch(PDOException $e){
          $affected_rows = 'Error: ' . $e->getMessage();
        }
        $this->cerrar_conexion();
        return $affected_rows;
      }

    function cantidad($resultado)
      {
        return sizeof($resultado);
      }
  }

?>