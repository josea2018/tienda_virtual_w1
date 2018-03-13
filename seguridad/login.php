<?php
  $titulo = 'Login';
  $ruta = '../fondos/fondo-login.jpg';
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
      //echo "<h3>Usuario o contraseña invalido</h3>";
      echo '<script language="javascript">alert("Usuario o contraseña invalido");</script>'; 

    }
  }
  include '../shared/header.php';
?>




<div class="container" align="center" style="padding-top: 8%";>


    <form method="POST">
      
      <div class="col-md-3">
        <label for="usr">Email: </label>
        <input type="email" class="form-control input-normal" id="exampleInputEmail1" placeholder="Correo" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
      </div>
      <br>

      
      <div class="col-md-3">
        <label for="pwd">Contraseña:</label>
        <input type="password" class="form-control input-normal" id="exampleInputPassword1" placeholder="Contraseña" name="contrasenna">
      </div>
      <br>

      <input class="btn btn-primary btn-lg" type="submit" name="" value="Login">
      <a href="../seguridad/registro.php" class="btn btn-default" role="button">Registrarse</a>
   </form>

</div>




<?php
  include '../shared/footer.php';
?>
