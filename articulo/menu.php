<?php
  $titulo = 'Administración de artículos';
  $ruta = '../fondos/fondo-principal_2.jpg';
  include '../shared/header.php';
?>

<ul>
  <li style="list-style:none;">
    <a style="font-size: 20px;" class="btn btn-default" role="button" href="../home/index.php">Inicio</a>
  </li>
</ul>



<form method="POST">

    <table class="table table-hover" style="text-align: center;" border="1">
      <tr>
        <th>ID ARTÍCULO</th>
        <th>ID DEPARTAMENTO</th>
        <th>DESCRIPCIÓN</th>
        <th>PRECIO</th>
        <th>EXISTENCIA</th>
        <th><a style="font-size: 20px;" class="btn btn-success" role="button" href="../articulo/nuevo.php">+</a></th>
      </tr>
      <?php
        include '../DbSetup.php';
        $result_array = $articulo_model->listarTodosAticulos();
        //var_dump($result_array);
        foreach ($result_array as $row) {
            echo "<tr>";
            echo "<td>" . $row['id_articulo'] . "</td>";
            echo "<td>" . $row['id_departamento'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
            echo "<td>" . $row['precio'] . "</td>";
            echo "<td>" . $row['existencia'] . "</td>";

            echo "<td>" .
                "<a style='font-size: 17px;' class='btn btn-info' role='button' href='../articulo/editar.php?id=" . $row['id_articulo'] . "'>Editar</a>".
                "<a style='font-size: 16px;' class='btn btn-danger' role='button' href='../articulo/eliminar.php?id=" . $row['id_articulo'] . "'>Eliminar</a>".
                "</td>";
          	echo "</tr>";
        }
      ?>
    </table>
 </form>



<?php
    include '../shared/footer.php';
?>