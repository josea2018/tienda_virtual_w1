<?php

require_once '../db/BaseConnection.php';
require_once '../db/PostgresConnection.php';
require_once '../db/MySqlConnection.php';
require_once '../Models/Usuario.php';

$db_class = getenv('DB_CLASS');
$connection = new $db_class(
              getenv('SERVER'),
              getenv('PORT'),
              getenv('USER'),
              getenv('PASSWORD'),
              getenv('DATABASE'));

$connection->connect();
$usuario_model = new Models\Usuario($connection);

