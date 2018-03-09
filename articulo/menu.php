<?php
  $titulo = 'Administración de artículos';
  include '../shared/header.php';
?>

<ul>
  <li>
    <a href="../home/index.php">Inicio</a>
  </li>
</ul>



<form method="POST">

    <table border="1">
      <tr>
        <th>ID ARTÍCULO</th>
        <th>ID DEPARTAMENTO</th>
        <th>DESCRIPCIÓN</th>
        <th>PRECIO</th>
        <th>EXISTENCIA</th>
        <th><a href="../articulo/nuevo.php">+</a></th>
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
                "<a href='../articulo/editar.php?id=" . $row['id_articulo'] . "'>Editar</a>".
                "<a href='../articulo/eliminar.php?id=" . $row['id_articulo'] . "'>Eliminar</a>".
                "</td>";
          	echo "</tr>";
        }
      ?>
    </table>
 </form>



<?php
    include '../shared/footer.php';
?>