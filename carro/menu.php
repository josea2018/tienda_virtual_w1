<?php
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  $titulo = 'Carrito de compras';
  include '../shared/header.php';
?>

<ul>
  <li>
    <a href="../home/index.php">Inicio</a>
  </li>
  <li>
    <?php
      $cedula_usuario = $_SESSION['usuario_cedula'];
      echo "<a href='../carro/checkout.php?cedula_usuario=" . $cedula_usuario . "'>Checkout</a>";
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

    <table border="1">
      <tr>
        <th>ID USUARIO</th>
        <th>ID ORDEN</th>
        <th>ID ARTÍCULO</th>
        <th>ID DEPARTAMENTO</th>
        <th>DESCRIPCIÓN</th>
        <th>PRECIO</th>
        <th>CANTIDAD</th>
        <th><input type="submit" value="Borrar todo"></th>
      </tr>
      <?php
        include '../DbSetup.php';
        //var_dump($result_array);
        $lineasOrden = $lineaOrden_model->listarLineasOrden();
        if($lineasOrden == null)
        {
          echo "<h2>No hay artículos en el carro</h2>";
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
                  "<a href='../carro/eliminarUno.php?ido=".$id_orden . " &ida=".$row['id_articulo'] . " &usuario=".$row['cedula_usuario'] . "'>Eliminar</a>".
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