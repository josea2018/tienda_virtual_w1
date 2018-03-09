 <?php
  $titulo = 'Crear artículo';
  include '../seguridad/verificar_session.php';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '../DbSetup.php';
    //var_dump($_POST);
    $id_articulo = isset($_POST['id_articulo']) ? $_POST['id_articulo'] : '';
    $id_departamento = isset($_POST['id_departamento']) ? $_POST['id_departamento'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $precio = isset($_POST['precio']) ? $_POST['precio'] : '';
    $existencia = isset($_POST['existencia']) ? $_POST['existencia'] : '';
    
    if($id_articulo == '' || $id_departamento == 'Opciones...' || $descripcion == '' || $precio == '' || $existencia == ''){
      echo "<h3>No se logró, todos los campos son requeridos</h3>";
    }
    else {
        //var_dump($departamento_model);
      $articulo_model->insertarArticulo($id_articulo, $id_departamento, $descripcion, $precio, $existencia);
      //var_dump($departamento_model);
      //echo $departamento_model;
      echo "<h3>Artículo registrado con éxito</h3>";
      //return header("Location: ../departamento/menu.php");
    }
  }
  include '../shared/header.php';
?>

 <form method="POST">
    <label>Código de artículo: </label>
    <input type="text" name="id_articulo">
    <br>
    <label>Descripción: </label>
    <input type="text" name="descripcion">
    <br>
    <label>Precio: </label>
    <input type="number" name="precio">
    <br>
    <label>Existencia: </label>
    <input type="number" name="existencia">
    <br>


    <table border="1">
      <tr>
        <th>CÓDIGO ARTÍCULO</th>
        <th>CÓDIGO DEPARTAMENTO</th>
        <th>DESCRIPCIÓN</th>
        <th>PRECIO</th>
        <th>EXISTENCIA</th>
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
            echo "</tr>";
        }
      ?>
    </table>

    <br>
    <label>Código departamento: </label>
    <!--<input type="text" name="id_departamento">-->
    <SELECT NAME="id_departamento">
      <option>Opciones...</option>
      <?php

        $result_array2 = $departamento_model->listarTodosDepartamentos();
        foreach ($result_array2 as $row){
          echo "<OPTION VALUE=\"".$row['id_departamento']."\">".$row['id_departamento']. " - " . $row['nombre']."</OPTION>";
        }
      ?>
    </SELECT>
    <br><br>    

    <input type="submit" name="" value="Crear">
    <a href="../articulo/menu.php">Administración de artículos</a>

 </form>

<?php
    include '../shared/footer.php';
?>