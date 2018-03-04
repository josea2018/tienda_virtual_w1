<?php

namespace models {

  class Usuario
  {
    private $connection;
    function __construct($connection)
    {
      $this->connection = $connection;
    }

    public function buscar($email, $contrasenna)
    {
      $result = $this->connection->executeSql("select * from usuarios where email = '$email' and contrasenna = md5('$contrasenna')");
      return $this->connection->getResults($result)[0];
    }

    public function buscarNombreActual($cedula)
    {
      $result = $this->connection->executeSql("select * from usuarios where cedula = '$cedula'");
      return $this->connection->getResults($result)[0];
    }

    public function insertar($cedula, $nombre, $email, $contrasenna, $tipo)
    {
      $sql = "INSERT INTO usuarios(cedula, nombre, email, contrasenna, tipo) VALUES ('$cedula','$nombre', '$email', md5('$contrasenna'), '$tipo')";
      $this->connection->executeSql($sql);
    }
  }
}
