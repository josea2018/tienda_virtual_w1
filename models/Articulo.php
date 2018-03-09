<?php

namespace models
{

	class Articulo
	{
		private $connection;
		function __construct($connection)
	    {
	      $this->connection = $connection;
	    }

	    public function buscarArticulo($id_articulo)
	    {
	    	$sql = "SELECT * FROM articulos WHERE id_articulo = '$id_articulo'";
	    	$result = $this->connection->executeSql($sql);
	    	return $this->connection->getResults($result)[0];
	    }

		public function insertarArticulo($id_articulo, $id_departamento, $descripcion, $precio, $existencia)
		{
			$sql = "INSERT INTO articulos(id_articulo, id_departamento, descripcion, precio, existencia) VALUES ('$id_articulo', '$id_departamento', '$descripcion', '$precio', '$existencia')";
			$this->connection->executeSql($sql);
		}

		public function listarTodosAticulos()
		{
			$sql = "SELECT * FROM articulos ORDER BY id_articulo ASC";
			$result = $this->connection->executeSql($sql);
			return $this->connection->getResults($result);
		}

		public function editar($id_articulo, $descripcion, $precio, $existencia)
	    {
	      $sql = "UPDATE articulos SET descripcion = '$descripcion', precio = '$precio', existencia = '$existencia'  WHERE id_articulo = '$id_articulo'";
	      $this->connection->executeSql($sql);
	    }

	    public function eliminar($id_articulo)
	    {
	    	$sql = "DELETE FROM articulos WHERE id_articulo = '$id_articulo'";
	    	$this->connection->executeSql($sql);

	    }

	}

}
