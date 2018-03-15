<?php
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  $ruta = '../fondos/fondo-principal_2.jpg';
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $departamento_model->editar($id, $nombre);
    return header("Location: ../departamento/menu.php");
  }
?>

<?php
  $titulo = 'Editar Departamento';
  include '../shared/header.php';
?>

  <form method="POST">


    <?php
      //include '../seguridad/verificar_session.php';
      include '../DbSetup.php';
      $id = isset($_GET['id']) ? $_GET['id'] : '';
      $departamento = $departamento_model->buscarDepartamento($id);
      //var_dump($articulo);  <input type="text" name="descripcion"> <input type="number" name="precio">   <input type="number" name="existencia"> 
    ?>
    
  <div class="container" align="center" style="padding-top: 8%";>
    <div class="col-md-3">
      <label for="usr">Nombre:</label>
      <input type="text" class="form-control input-normal" placeholder="Nombre" name="nombre" value="<?php echo $departamento['nombre']; ?>">
    </div>
    <br>
    <!--<input type="text" name="nombre">-->
    <input style="font-size: 17px;" class="btn btn-success" type="submit" value="Guardar">
    <a style="font-size: 17px;" class="btn btn-default" role="button" href="../departamento/menu.php">Administración de departamentos</a>
  </div>
  </form>
