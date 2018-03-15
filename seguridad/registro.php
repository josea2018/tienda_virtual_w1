<?php
  $titulo = 'Registro';
  $ruta = '../fondos/fondo-login.jpg';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '../DbSetup.php';

    $cedula = isset($_POST['cedula']) ? $_POST['cedula'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $contrasenna = isset($_POST['contrasenna']) ? $_POST['contrasenna'] : '';
    $confirmar_contrasenna = isset($_POST['confirmar_contrasenna']) ? $_POST['confirmar_contrasenna'] : '';
    $tipo = 'c';

    if($cedula == '' || $nombre == '' || $email == '' || $contrasenna == ''){
      //echo "<h3>No se logró, complete todos los campos</h3>";
      echo '<script language="javascript">alert("No se logró, complete todos los campos");</script>'; 
    }
    else if($contrasenna != $confirmar_contrasenna) {
      //echo "<h3>Las contraseñas no coinciden</h3>";
      echo '<script language="javascript">alert("Las contraseñas no coinciden");</script>'; 
    } else {
      $usuario_model->insertar($cedula, $nombre, $email, $contrasenna, $tipo);
      //echo "<h3>Usuario registrado con éxito</h3>";
      echo '<script language="javascript">alert("Usuario registrado con éxito");</script>'; 
      return header("Location: ../seguridad/login.php");
    }
  }
  include '../shared/header.php';
?>

<div class="container" align="center" style="padding-top: 3%";>

  <form method="POST">
    <div class="col-md-3">
      <label for="usr">Cédula: </label>
      <input type="text" class="form-control input-normal" id="exampleInputEmail1" placeholder="Cédula" name="cedula">
    </div>
    <br>

    <div class="col-md-3">
      <label for="usr">Nombre: </label>
      <input type="text" class="form-control input-normal" id="exampleInputEmail1" placeholder="Nombre" name="nombre">
    </div>
    <br>

    <div class="col-md-3">
    <label for="usr">Email: </label>
    <input type="email" class="form-control input-normal" id="exampleInputEmail1" placeholder="Correo" name="email">
    </div>
    <br>

    <div class="col-md-3">
    <label for="pwd">Contraseña:</label>
    <input type="password" class="form-control input-normal" id="exampleInputPassword1" placeholder="Contraseña" name="contrasenna">
    </div>
    <br>

    <div class="col-md-3">
    <label for="pwd">Confirmar Contraseña:</label>
    <input type="password" class="form-control input-normal" id="exampleInputPassword1" placeholder="Confirmar Contraseña" name="confirmar_contrasenna">
    </div>
    <br>

    <input class="btn btn-primary btn-lg" type="submit" name="" value="Registrarme">
    <a href="../seguridad/login.php" class="btn btn-default" role="button">Login</a>
  </form>

</div>

<?php
 include '../shared/footer.php';
?>

