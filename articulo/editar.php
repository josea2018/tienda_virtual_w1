<?php
  include '../seguridad/verificar_session.php';
  $ruta = '../fondos/fondo-principal_2.jpg';
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

<div class="container" align="center" style="padding-top: 3%";>
  <form method="POST">

    <?php
      //include '../seguridad/verificar_session.php';
      include '../DbSetup.php';
      $id = isset($_GET['id']) ? $_GET['id'] : '';
      $articulo = $articulo_model->buscarArticulo($id);
      //var_dump($articulo);  <input type="text" name="descripcion"> <input type="number" name="precio">   <input type="number" name="existencia"> 
    ?>
    <div class="col-md-3">
      <label for="usr">Descripción:</label>
      <input type="text" class="form-control input-normal" placeholder="Descripción" name="descripcion" value="<?php echo $articulo['descripcion']; ?>">
    </div>
    <br>
    <div class="col-md-3">
      <label for="usr">Precio:</label>
      <input type="number" class="form-control input-normal" placeholder="Precio" name="precio" value="<?php echo $articulo['precio']; ?>">
    </div>
    <br>
    <div class="col-md-3">
      <label for="usr">Existencia:</label>
      <input type="number" class="form-control input-normal" placeholder="Existencia" name="existencia" value="<?php echo $articulo['existencia']; ?>">
    </div>
    <br>
    <input style="font-size: 17px;" class="btn btn-success"  type="submit" value="Guardar">
    <a style="font-size: 17px;" class="btn btn-default" role="button" href="../articulo/menu.php">Administración de artículos</a>
  </form>
</div>