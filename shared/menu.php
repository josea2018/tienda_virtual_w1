<?php
  include_once '../DbSetup.php';
  //session_start();
  //var_dump($_SESSION);
  $datosSession = $usuario_model->buscarNombreActual($_SESSION['usuario_cedula']);
  //echo $datosSession['nombre'];
  $nombreUsuarioActual = $datosSession['nombre'];
  //echo $nombreUsuarioActual;
?>
<h3>Bienvenido <?= $nombreUsuarioActual ?></h3>
<ul>
  <li>
    <a href="../home">Inicio</a>
    <a href="../seguridad/logout.php">Salir</a>
  </li>
</ul>
