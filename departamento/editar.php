<?php
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
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

    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $departamento['nombre']; ?>">
    <br>
    <!--<input type="text" name="nombre">-->
    <input type="submit" value="Guardar">
    <a href="../departamento/menu.php">Administración de departamentos</a>
  </form>
