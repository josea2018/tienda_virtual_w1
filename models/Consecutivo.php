<?php


namespace models
{

  class Consecutivo
  {

    private $connection;
    function __construct($connection)
      {
        $this->connection = $connection;
      }

      
    public function insertarConsecutivo($id_usuario)
    {
      $sql = "INSERT INTO consecutivo(cedula_usuario) VALUES ('$id_usuario')";
      $this->connection->executeSql($sql);
    }

    public function listarConsecutivos()
    {
      $sql = "SELECT * FROM consecutivo ORDER BY id_consecutivo ASC";
      $result = $this->connection->executeSql($sql);
      return $this->connection->getResults($result);
    }

    public function listarConsecutivosUsuario($cedula_usuario)
    {
      $sql = "SELECT * FROM consecutivo WHERE cedula_usuario = '$cedula_usuario' ORDER BY id_consecutivo ASC";
      $result = $this->connection->executeSql($sql);
      return $this->connection->getResults($result);
    }


  }

}