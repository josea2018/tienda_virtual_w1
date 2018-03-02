<?php
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $departamento = $departamento_model->buscarDepartamento($id);
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $departamento_model->eliminar($id);
    return header("Location: ../departamento/menu.php");
  }
?>

<?php
 $titulo = 'Eliminar departamento';
 include '../shared/header.php';
?>

<p>
  Esta seguro de eliminar el departamento: <strong><?php echo $departamento['id_departamento'] . " - " . $departamento['nombre']; ?></strong>
</p>
<form method="POST">
  <input type="submit" value="Si">
  <a href="../departamento/menu.php">No</a>
</form>
