 <?php
  $titulo = 'Crear departamento';
  $ruta = '../fondos/fondo-principal_2.jpg';
  include '../seguridad/verificar_session.php';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '../DbSetup.php';
    //var_dump($_POST);
    $id_departamento = isset($_POST['id_departamento']) ? $_POST['id_departamento'] : '';
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    if($id_departamento == '' || $nombre == ''){
      //echo "<h3>No se logró, todos los campos son requeridos</h3>";
      echo '<script language="javascript">alert("No se logró, todos los campos son requeridos");</script>'; 
    }
    else {
        //var_dump($departamento_model);
      $departamento_model->insertarDepartamento($id_departamento, $nombre);
      //var_dump($departamento_model);
      //echo $departamento_model;
      echo "<h3>Departamento registrado con éxito</h3>";
      //return header("Location: ../departamento/menu.php");
    }
  }
  include '../shared/header.php';
?>

<div class="container" align="center" style="padding-top: 3%";>
 <form method="POST">

  <div class="col-md-3">
    <label for="usr">Código de departamento: </label>
    <input type="text" class="form-control input-normal" placeholder="Código de departamento" name="id_departamento">
  </div>
    <br>
  <div class="col-md-3">
    <label for="usr">Nombre: </label>
    <input type="text" class="form-control input-normal" placeholder="Nombre" name="nombre">
  </div>
    <br>

    <input style="font-size: 17px;" class="btn btn-success" type="submit" name="" value="Crear">
    <a style="font-size: 17px;" class="btn btn-default" role="button" href="../departamento/menu.php">Administración de departamentos</a>

    <div style="padding-top: 2%";>
      <table class="table table-hover" style="text-align: center;" border="1">
        <tr>
          <th>ID DEPARTAMENTO</th>
          <th>NOMBRE</th>
        </tr>
        <?php
          include '../DbSetup.php';
          $result_array = $departamento_model->listarTodosDepartamentos();
          //var_dump($result_array);
          foreach ($result_array as $row) {
              echo "<tr>";
              echo "<td>" . $row['id_departamento'] . "</td>";
              echo "<td>" . $row['nombre'] . "</td>";
              echo "</tr>";
          }
        ?>
      </table>
    </div>

 </form>
</div>

<?php
    include '../shared/footer.php';
?>