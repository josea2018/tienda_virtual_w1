<?php

namespace models
{

	class Departamento
	{
		private $connection;
		function __construct($connection)
	    {
	      $this->connection = $connection;
	    }

	    public function buscarDepartamento($id_departamento)
	    {
	    	$sql = "SELECT * FROM departamentos WHERE id_departamento = '$id_departamento'";
	    	$result = $this->connection->executeSql($sql);
	    	return $this->connection->getResults($result)[0];
	    }

		public function insertarDepartamento($id_departamento, $nombre)
		{
			$sql = "INSERT INTO departamentos(id_departamento, nombre) VALUES ('$id_departamento', '$nombre')";
			$this->connection->executeSql($sql);
		}

		public function listarTodosDepartamentos()
		{
			$sql = "SELECT * FROM departamentos ORDER BY id_departamento ASC";
			$result = $this->connection->executeSql($sql);
			return $this->connection->getResults($result);
		}

		public function editar($id_departamento, $nombre)
	    {
	      $sql = "UPDATE departamentos SET nombre = '$nombre' WHERE id_departamento = '$id_departamento'";
	      $this->connection->executeSql($sql);
	    }

	    public function eliminar($id_departamento)
	    {
	    	$sql = "DELETE FROM departamentos WHERE id_departamento = '$id_departamento'";
	    	$this->connection->executeSql($sql);

	    }

	}

}
