<?php
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';

  $nueva = 0;
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nueva = 1;
  }



  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $articulo = $articulo_model->buscarArticulo($id);
  $lineasOrden = $lineaOrden_model->listarLineasOrden();
  $cantidadLineasOrden = count($lineasOrden);
  $id_orden = 0;

  if($lineasOrden == null)
  {
    $id_orden = 1;
  }else if($cantidadLineasOrden >= 1){
    //var_dump($lineasOrden[$cantidadLineasOrden-1]['descripcion']);
    $id_orden = $lineasOrden[$cantidadLineasOrden-1]['id_orden'];
    echo $id_orden;
    echo 'Nueva: ' . $nueva;
  }

  $id_articulo = $articulo['id_articulo'];
  $id_departamento = $articulo['id_departamento'];
  $descripcion = $articulo['descripcion'];
  $precio = $articulo['precio'];
  $cantidad = 1;

  //$lineaOrden_model->insertarLineaOrden($id_orden, $id_articulo, $id_departamento, $descripcion, $precio, $cantidad);

    //return header("Location: ../articulo/menu.php");
?>

<?php
  $titulo = 'Lista por artículo';
  include '../shared/header.php';
?>

  <form method="POST">

    <label>Existencia:</label>
    <input type="number" name="existencia" value="<?php echo $articulo['existencia']; ?>">
    <br>
    <input type="submit" value="Guardar">
    <a href="../articulo/menu.php">Administración de artículos</a>
  </form>
