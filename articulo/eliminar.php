<?php
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
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

<p>
  Esta seguro de eliminar el artículo: <strong><?php echo $articulo['id_articulo'] . " - " . $articulo['descripcion']; ?></strong>
</p>
<form method="POST">
  <input type="submit" value="Si">
  <a href="../articulos/menu.php">No</a>
</form>