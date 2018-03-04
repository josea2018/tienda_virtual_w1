<?php
  $titulo = 'Registro';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '../DbSetup.php';

    $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $contrasenna = isset($_POST['contrasenna']) ? $_POST['contrasenna'] : '';
    $confirmar_contrasenna = isset($_POST['confirmar_contrasenna']) ? $_POST['confirmar_contrasenna'] : '';
    $tipo = 'c';
    if ($contrasenna != $confirmar_contrasenna) {
      echo "<h3>Las contraseñas no coinciden</h3>";
    } else {
      $usuario_model->insertar($cedula, $nombre, $email, $contrasenna, $tipo);
      echo "<h3>Usuario registrado con éxito</h3>";
      return header("Location: ../seguridad/login.php");
    }
  }
  //include '../shared/header.php';
?>
  <form method="POST">
    <label>Cédula: </label>
    <input type="text" name="cedula">
    <br>
    <label>Nombre: </label>
    <input type="text" name="nombre">
    <br>
    <label>Email: </label>
    <input type="email" name="email">
    <br>
    <label>Contraseña:</label>
    <input type="password" name="contrasenna">
    <br>
    <label>Confirmar Contraseña:</label>
    <input type="password" name="confirmar_contrasenna">
    <br>
    <input type="submit" name="" value="Registrarme">
    <a href="../seguridad/login.php">Login</a>
  </form>
<?php
//include '../shared/footer.php';
?>

