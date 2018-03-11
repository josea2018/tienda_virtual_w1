<?php

require_once '../db/BaseConnection.php';
require_once '../db/PostgresConnection.php';
require_once '../db/MySqlConnection.php';
require_once '../models/Usuario.php';
require_once '../models/Departamento.php';
require_once '../models/Articulo.php';

$db_class = getenv('DB_CLASS');
$connection = new $db_class(
              getenv('SERVER'),
              getenv('PORT'),
              getenv('USER'),
              getenv('PASSWORD'),
              getenv('DATABASE'));

$connection->connect();
$departamento_model = new models\Departamento($connection);
$articulo_model = new models\Articulo($connection);
$usuario_model = new models\Usuario($connection);



