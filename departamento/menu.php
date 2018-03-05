<?php
  $titulo = 'Administración de departamentos';
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
        <th>ID DEPARTAMENTO</th>
        <th>NOMBRE</th>
        <th><a href="../departamento/nuevo.php">+</a></th>
      </tr>
      <?php
        include '../DbSetup.php';
        $result_array = $departamento_model->listarTodosDepartamentos();
        //var_dump($result_array);
        foreach ($result_array as $row) {
            echo "<tr>";
            echo "<td>" . $row['id_departamento'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";

            echo "<td>" .
                "<a href='../departamento/editar.php?id=" . $row['id_departamento'] . "'>Editar</a>".
                "<a href='../departamento/eliminar.php?id=" . $row['id_departamento'] . "'>Eliminar</a>".
                "</td>";
          	echo "</tr>";
        }
      ?>
    </table>
 </form>



<?php
    include '../shared/footer.php';
?>
