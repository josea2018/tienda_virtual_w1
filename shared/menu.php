<?php
  include_once '../DbSetup.php';
  //session_start();
  //var_dump($_SESSION);
  $datosSession = $usuario_model->buscarNombreActual($_SESSION['usuario_cedula']);
  $tipoUsuario = $datosSession['tipo'];
  echo $tipoUsuario;
  //echo $datosSession['nombre'];
  $nombreUsuarioActual = $datosSession['nombre'];
  //echo $nombreUsuarioActual;
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $lineaOrden_model->eliminarTodo($_SESSION['usuario_cedula']);
    return header("Location: ../seguridad/logout.php");
  }
?>

<form method="POST">
  <h3>Bienvenido <?= $nombreUsuarioActual ?></h3>
  <ul>
    <li>
      <a href="../home">Inicio</a>
      <!--<a href="../seguridad/logout.php">Salir</a>-->
      <input type="submit" value="Salir">
    </li>
  </ul>
</form>

