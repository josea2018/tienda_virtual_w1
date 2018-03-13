<?php


namespace models
{

  class Orden
  {

    private $connection;
    function __construct($connection)
      {
        $this->connection = $connection;
      }

      
    public function insertarOrden($id_consecutivo, $cedula_usuario, $id_orden, $id_articulo, $id_departamento, $descripcion, $precio, $cantidad)
    {
      $sql = "INSERT INTO ordenes(id_consecutivo, cedula_usuario, id_orden, id_articulo, id_departamento, descripcion, precio, cantidad) VALUES ('$id_consecutivo', '$cedula_usuario', '$id_orden', '$id_articulo', '$id_departamento', '$descripcion', '$precio', '$cantidad')";
      $this->connection->executeSql($sql);
    }

    public function listarOrden($id_consecutivo)
    {
      $sql = "SELECT * FROM ordenes WHERE id_consecutivo = '$id_consecutivo' ORDER BY id_consecutivo ASC";
      $result = $this->connection->executeSql($sql);
      return $this->connection->getResults($result);
    }


  }

}