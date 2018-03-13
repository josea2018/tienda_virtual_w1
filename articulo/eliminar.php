<?php
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  $ruta = '../fondos/fondo-principal_2.jpg';
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $articulo = $articulo_model->buscarArticulo($id);
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $articulo_model->eliminar($id);
    return header("Location: ../articulo/menu.php");
  }
?>

<?php
 $titulo = 'Eliminar artículo';
 include '../shared/header.php';
?>

<div class="container" align="center" style="padding-top: 8%";>
  <p>
    Esta seguro de eliminar el artículo: <strong><?php echo $articulo['id_articulo'] . " - " . $articulo['descripcion']; ?></strong>
  </p>
  <form method="POST">
    <input type="submit" class='btn btn-danger' value="Si">
    <a style='font-size: 16px;' class='btn btn-warning' role='button' href="../articulo/menu.php">No</a>
  </form>
</div>