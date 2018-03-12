<?php


namespace models
{

  class LineaOrden
  {

    private $connection;
    function __construct($connection)
      {
        $this->connection = $connection;
      }

      public function buscarLineasOrden($id_orden)
      {
        $sql = "SELECT * FROM lineas_orden WHERE id_orden = '$id_orden'";
        $result = $this->connection->executeSql($sql);
        return $this->connection->getResults($result);
      }

    public function insertarLineaOrden($id_usuario, $id_orden, $id_articulo, $id_departamento, $descripcion, $precio, $cantidad)
    {
      $sql = "INSERT INTO lineas_orden(cedula_usuario, id_orden, id_articulo, id_departamento, descripcion, precio, cantidad) VALUES ('$id_usuario', '$id_orden', '$id_articulo', '$id_departamento', '$descripcion', '$precio', '$cantidad')";
      $this->connection->executeSql($sql);
    }

    public function listarLineasOrden()
    {
      $sql = "SELECT * FROM lineas_orden ORDER BY id_orden ASC";
      $result = $this->connection->executeSql($sql);
      return $this->connection->getResults($result);
    }

      public function eliminarUno($id_usuario, $id_orden, $id_articulo)
      {
          $sql = "DELETE FROM lineas_orden WHERE cedula_usuario = '$id_usuario' AND id_orden = '$id_orden' AND id_articulo = '$id_articulo'";
        //$sql = "DELETE FROM lineas_orden WHERE cedula_usuario = '206690494' AND id_orden = '1' AND id_articulo = '2'";
        //$this->connection->executeSql($sql);
       //return $sql;
       $this->connection->executeSql($sql);

      }

      public function eliminarTodo($id_usuario)
      {
          $sql = "DELETE FROM lineas_orden WHERE cedula_usuario = '$id_usuario'";
        //$sql = "DELETE FROM lineas_orden WHERE cedula_usuario = '206690494' AND id_orden = '1' AND id_articulo = '2'";
        //$this->connection->executeSql($sql);
        //return $sql;
        $this->connection->executeSql($sql);

      }







  }

}
