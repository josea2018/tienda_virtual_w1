<?php
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  $ruta = '../fondos/fondo-principal_2.jpg';
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

<div class="container" align="center" style="padding-top: 8%";>
  <p>
    Esta seguro de eliminar el departamento: <strong><?php echo $departamento['id_departamento'] . " - " . $departamento['nombre']; ?></strong>
  </p>
  <form method="POST">
    <input class='btn btn-danger' type="submit" value="Si">
    <a style='font-size: 16px;' class='btn btn-warning' role='button' href="../departamento/menu.php">No</a>
  </form>
</div>
