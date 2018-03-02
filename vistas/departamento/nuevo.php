 <?php
  $titulo = 'Crear departamento';
  include '../../seguridad/verificar_session.php';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '../../DbSetup.php';
    var_dump($_POST);
    $id_departamento = isset($_POST['id_departamento']) ? $_POST['id_departamento'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    if($id_departamento == '' || $nombre == ''){
      echo "<h3>No se logró, todos los campos son requeridos</h3>";
    }
    else {
        //var_dump($departamento_model);
      $departamento_model->insertarDepartamento($id_departamento, $nombre);
      var_dump($departamento_model);
      //echo $departamento_model;
      echo "<h3>Departamento registrado con éxito</h3>";
      return header("Location: ../departamento/menu.php");
    }
  }
  include '../../shared/header.php';
?>

 <form method="POST">
    <label>Código de departamento: </label>
    <input type="text" name="id_departamento">
    <br>
    <label>Nombre: </label>
    <input type="text" name="nombre">
    <br>
    <input type="submit" name="" value="Crear">
    <a href="../departamento/menu.php">Administrción de departamentos</a>
 </form>

<?php
    include '../../shared/footer.php';
?>