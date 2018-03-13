<?php
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  $titulo = 'Carrito de compras';
  $ruta = '../fondos/fondo-principal_2.jpg';
  include '../shared/header.php';
?>

<ul>
  <li style="list-style:none;">
    <a style="font-size: 20px;" class="btn btn-default" role="button" href="../home/index.php">Inicio</a>
  </li>
  <li style="list-style:none;">
    <?php
      $cedula_usuario = $_SESSION['usuario_cedula'];
      echo "<a style='font-size: 20px;' class='btn btn-default' role='button' href='../carro/checkout.php?cedula_usuario=" . $cedula_usuario . "'>Checkout</a>";
    ?>
  </li>
  <li style="list-style:none;">
    <?php
      echo "<a style='font-size: 20px;'' class='btn btn-default' role='button' href=../articulo/lista_articulos.php>Lista de artículos</a>";
    ?>
  </li>
</ul>

<?php
  
  if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $cedula_usuario = $_SESSION['usuario_cedula'];
      //echo $cedula_usuario;
      //$lineaOrden_model->eliminarTodo($cedula_usuario);
      $lineaOrden_model->eliminarTodo($cedula_usuario);
  }
?>

<form method="POST">

    <table class="table table-hover" style="text-align: center;" border="1">
      <tr>
        <th>ID USUARIO</th>
        <th>ID ORDEN</th>
        <th>ID ARTÍCULO</th>
        <th>ID DEPARTAMENTO</th>
        <th>DESCRIPCIÓN</th>
        <th>PRECIO</th>
        <th>CANTIDAD</th>
        <th><input type="submit" style="font-size: 17px;" class="btn btn-danger" value="Borrar todo"></th>
      </tr>
      <?php
        include '../DbSetup.php';
        //var_dump($result_array);
        $lineasOrden = $lineaOrden_model->listarLineasOrden();
        if($lineasOrden == null)
        {
          //echo "<h2>No hay artículos en el carro</h2>";
          echo '<script language="javascript">alert("No hay artículos en el carro");</script>'; 
        }else{
          $cantidadLineasOrden = count($lineasOrden);   
          $id_orden = $lineasOrden[$cantidadLineasOrden-1]['id_orden'];
          $lineasOrdenActual = $lineaOrden_model->buscarLineasOrden($id_orden);

          foreach ($lineasOrdenActual as $row) {
            echo "<tr>";
            echo "<td>" . $row['cedula_usuario'] . "</td>";
            echo "<td>" . $row['id_orden'] . "</td>";
            echo "<td>" . $row['id_articulo'] . "</td>"; 
            echo "<td>" . $row['id_departamento'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
            echo "<td>" . $row['precio'] . "</td>";
            echo "<td>" . $row['cantidad'] . "</td>";

            echo "<td>" .
                  "<a style='font-size: 17px;' class='btn btn-danger' href='../carro/eliminarUno.php?ido=".$id_orden . " &ida=".$row['id_articulo'] . " &usuario=".$row['cedula_usuario'] . "'>Eliminar</a>".
                "</td>";
            echo "</tr>";


            //"<a href='../carro/eliminarUno.php?ido=".$id_orden . "' '&ida=".$row['id_articulo'] ."'>Eliminar</a>".
          }
          
        }
        //"<a href='../carro/eliminarUno.php?id_a=" . $row['id_articulo'] . "'>Eliminar</a>".
      ?>
    </table>
 </form>



<?php
    include '../shared/footer.php';
?>