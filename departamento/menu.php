<?php
  $titulo = 'Administración de departamentos';
  $ruta = '../fondos/fondo-principal_2.jpg';
  include '../shared/header.php';
?>

<ul>
  <li style="list-style:none;">
    <a style="font-size: 20px;" class="btn btn-default" role="button"  href="../home/index.php">Inicio</a>
  </li>
</ul>


<form method="POST">

    <table class="table table-hover" style="text-align: center;" border="1">
      <tr>
        <th>ID DEPARTAMENTO</th>
        <th>NOMBRE</th>
        <th><a style="font-size: 20px;" class="btn btn-success" role="button" href="../departamento/nuevo.php">+</a></th>
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
                "<a style='font-size: 17px;' class='btn btn-info' role='button' href='../departamento/editar.php?id=" . $row['id_departamento'] . "'>Editar</a>".
                "<a style='font-size: 16px;' class='btn btn-danger' role='button' href='../departamento/eliminar.php?id=" . $row['id_departamento'] . "'>Eliminar</a>".
                "</td>";
          	echo "</tr>";
        }
      ?>
    </table>
 </form>



<?php
    include '../shared/footer.php';
?>
