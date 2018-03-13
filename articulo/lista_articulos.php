<?php
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  $ruta = '../fondos/fondo-principal_2.jpg';

  $id = 0;
  $cedula_usuario = $_SESSION['usuario_cedula'];

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $lineasOrden = $lineaOrden_model->listarLineasOrden();
      $cantidadLineasOrden = count($lineasOrden);    
      $id_orden = $lineasOrden[$cantidadLineasOrden-1]['id_orden'];
      $id_orden++;
      $id_articulo = "";
      $id_departamento = "";
      $descripcion = "";
      $precio = 0;
      $cantidad = 0;
      echo 'id orden nueva:' . $id_orden;
      $lineaOrden_model->insertarLineaOrden($cedula_usuario, $id_orden, $id_articulo, $id_departamento, $descripcion, $precio, $cantidad);
  }else{

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
        //echo $id_orden;
        echo $articulo['id_articulo'];
      }
      $id_articulo = $articulo['id_articulo'];
      $id_departamento = $articulo['id_departamento'];
      $descripcion = $articulo['descripcion'];
      $precio = $articulo['precio'];
      $cantidad = 1;
      $lineaOrden_model->insertarLineaOrden($cedula_usuario, $id_orden, $id_articulo, $id_departamento, $descripcion, $precio, $cantidad);
  }

  //$lineaOrden_model->insertarLineaOrden($id_orden, $id_articulo, $id_departamento, $descripcion, $precio, $cantidad);

    //return header("Location: ../articulo/menu.php");
?>


<?php
  $titulo = 'Lista por artículo';
  //$datosSession = $usuario_model->buscarNombreActual($_SESSION['usuario_cedula']);
  //echo $datosSession['nombre'];
  //$nombreUsuarioActual = $datosSession['nombre'];
  include '../shared/header.php';
?>

<ul>
  <li style="list-style:none;">
    <a style="font-size: 20px;" class="btn btn-default" role="button" href="../home/index.php">Inicio</a>
  </li>
  <li style="list-style:none;">
    <a style="font-size: 20px;" class="btn btn-default" role="button" role="button" href="../carro/menu.php">Carro de compras</a>
  </li>
</ul>


<form method="POST">

    <table class="table table-hover" style="text-align: center;" border="1">
      <tr>
        <th>ID USUARIO</th>
        <th>ID ARTÍCULO</th>
        <th>ID DEPARTAMENTO</th>
        <th>DESCRIPCIÓN</th>
        <th>PRECIO</th>
        <th>EXISTENCIA</th>
        <th><input type="submit" style="font-size: 17px;" class="btn btn-warning"  value="Orden nueva"></th>
      </tr>
      <?php
        include '../DbSetup.php';
        $result_array = $articulo_model->listarTodosAticulos();
        //var_dump($result_array);
        foreach ($result_array as $row) {
            echo "<tr>";
            echo "<td>" . $cedula_usuario . "</td>";
            echo "<td>" . $row['id_articulo'] . "</td>";
            echo "<td>" . $row['id_departamento'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
            echo "<td>" . $row['precio'] . "</td>";
            echo "<td>" . $row['existencia'] . "</td>";

            echo "<td>" .
                 "<a style='font-size: 20px;' class='btn btn-success' role='button' href='?id=" . $row['id_articulo'] . "'>+</a>".
                "</td>";
          	echo "</tr>";
        }
        //"<a href='../carro/agregar_linea_orden.php?id=" . $row['id_articulo'] . "'>+</a>".
      ?>
    </table>
 </form>



<?php
    include '../shared/footer.php';
?>