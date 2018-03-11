<?php
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $precio = isset($_POST['precio']) ? $_POST['precio'] : '';
    $existencia = isset($_POST['existencia']) ? $_POST['existencia'] : '';
    $articulo_model->editar($id, $descripcion, $precio, $existencia);
    return header("Location: ../articulo/menu.php");
  }
?>

<?php
  $titulo = 'Editar artículo';
  include '../shared/header.php';
?>

  <form method="POST">

    <?php
      //include '../seguridad/verificar_session.php';
      include '../DbSetup.php';
      $id = isset($_GET['id']) ? $_GET['id'] : '';
      $articulo = $articulo_model->buscarArticulo($id);
      //var_dump($articulo);  <input type="text" name="descripcion"> <input type="number" name="precio">   <input type="number" name="existencia"> 
    ?>

    <label>Descripción:</label>
    <input type="text" name="descripcion" value="<?php echo $articulo['descripcion']; ?>">
    <br>
    <label>Precio:</label>
    <input type="number" name="precio" value="<?php echo $articulo['precio']; ?>">
    <br>
    <label>Existencia:</label>
    <input type="number" name="existencia" value="<?php echo $articulo['existencia']; ?>">
    <br>
    <input type="submit" value="Guardar">
    <a href="../articulo/menu.php">Administración de artículos</a>
  </form>
