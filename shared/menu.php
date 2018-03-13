<?php
  include_once '../DbSetup.php';
  $ruta = '../fondos/fondo-principal_2.jpg';
  //session_start();
  //var_dump($_SESSION);
  $datosSession = $usuario_model->buscarNombreActual($_SESSION['usuario_cedula']);
  $tipoUsuario = $datosSession['tipo'];
  //echo $tipoUsuario;
  //echo $datosSession['nombre'];
  $nombreUsuarioActual = $datosSession['nombre'];
  //echo $nombreUsuarioActual;
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $lineaOrden_model->eliminarTodo($_SESSION['usuario_cedula']);
    return header("Location: ../seguridad/logout.php");
  }
?>

<form method="POST">
  <h3 style="text-align: right;">Bienvenido <?= $nombreUsuarioActual ?></h3>
  <ul>
    <li style="list-style:none;">
      <a style="font-size: 20px;" href="../home" class="btn btn-default" role="button">Inicio</a>
      <!--<a href="../seguridad/logout.php">Salir</a>-->
    </li>
    <li style="list-style:none; text-align: right; margin-top: -3%;">
      <!--<a href="../seguridad/logout.php">Salir</a>-->
      <input type="submit" class="btn btn-danger" value="Salir">
    </li>
  </ul>
</form>

