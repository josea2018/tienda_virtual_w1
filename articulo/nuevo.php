 <?php
  $titulo = 'Crear artículo';
  $ruta = '../fondos/fondo-principal_2.jpg';
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
      echo '<script language="javascript">alert("No se logró, todos los campos son requeridos");</script>'; 
    }
    else {
        //var_dump($departamento_model);
      $articulo_model->insertarArticulo($id_articulo, $id_departamento, $descripcion, $precio, $existencia);
      //var_dump($departamento_model);
      //echo $departamento_model;
      echo "<h3>Artículo registrado con éxito</h3>";
      echo '<script language="javascript">alert("Artículo registrado con éxito");</script>'; 
      //return header("Location: ../departamento/menu.php");
    }
  }
  include '../shared/header.php';
?>

<div class="container" align="center" style="padding-top: 3%";>
 <form method="POST">
  <div class="col-md-3">
    <label for="usr">Código de artículo: </label>
    <input class="form-control input-normal" placeholder="Código de artículo" type="text" name="id_articulo">
  </div>
    <br>
  <div class="col-md-3">
    <label for="usr">Descripción: </label>
    <input type="text" class="form-control input-normal" placeholder="Descripción" name="descripcion">
  </div>
    <br>
  <div class="col-md-3">
    <label for="usr">Precio: </label>
    <input type="number" class="form-control input-normal" placeholder="Precio" name="precio">
  </div>
    <br>
  <div class="col-md-3">
    <label for="usr">Existencia: </label>
    <input type="number" class="form-control input-normal" placeholder="Existencia" name="existencia">
  </div>
    <br>


    <table class="table table-hover" style="text-align: center;" border="1">
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
    <div class="col-md-3">
      <label for="usr">Código departamento: </label>
        <input type="submit" name="" value="Guardar">
        <SELECT class="selectpicker dropup" NAME="id_departamento">
          <option>Opciones...</option>
          <?php

            $result_array2 = $departamento_model->listarTodosDepartamentos();
            foreach ($result_array2 as $row){
              echo "<OPTION VALUE=\"".$row['id_departamento']."\">".$row['id_departamento']. " - " . $row['nombre']."</OPTION>";
            }
          ?>
      </SELECT>
    </div>
    <br><br>    

    <input type="submit" style="font-size: 17px;" class="btn btn-success" name="" value="Crear">
    <a style="font-size: 17px;" class="btn btn-default" role="button" href="../articulo/menu.php">Administración de artículos</a>

 </form>
</div>

<?php
    include '../shared/footer.php';
?>