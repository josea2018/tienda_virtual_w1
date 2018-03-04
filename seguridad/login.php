<?php
  $titulo = 'Login';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '../DbSetup.php';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $contrasenna = isset($_POST['contrasenna']) ? $_POST['contrasenna'] : '';
    $usuario = $usuario_model->buscar($email, $contrasenna);
    if (isset($usuario)) {
      session_start();
      $_SESSION['usuario_cedula'] = $usuario['cedula'];
      var_dump($_SESSION);
      return header("Location: ../home");
    } else {
      echo "<h3>Usuario o contraseña invalido</h3>";
    }
  }
  include '../shared/header.php';
?>
  <form method="POST">
    <label>Email: </label>
    <input type="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
    <br>
    <label>Contraseña:</label>
    <input type="password" name="contrasenna">
    <br>
    <input type="submit" name="" value="Login">
    <a href="../seguridad/registro.php">Registrarse</a>
  </form>
<?php
  include '../shared/footer.php';
?>
