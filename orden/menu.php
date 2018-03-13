<?php
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  $ruta = '../fondos/fondo-principal_2.jpg';
  $titulo = 'Consultar orden';
  include '../shared/header.php';
?>


<form method="POST">

    <a style="font-size: 20px;" class="btn btn-default" role="button" role="button" href="../home/index.php">Inicio</a><br><br>


 <table class="table table-hover" style="text-align: center;" border="1">
      <tr>
        <th>NUM. ORDEN</th>
        <th>ID USUARIO</th>
        <th>ID ORDEN</th>
        <th>ID ARTÍCULO</th>
        <th>ID DEPARTAMENTO</th>
        <th>DESCRIPCIÓN</th>
        <th>PRECIO</th>
        <th>CANTIDAD</th>
      </tr>

<?php
  $cedula_usuario = $_SESSION['usuario_cedula'];

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id_consecutivo = isset($_POST['id_consecutivo']) ? $_POST['id_consecutivo'] : '';

        if($id_consecutivo == 'Ordenes...' || $id_consecutivo == ''){
            //echo "<h3>No se logró, no existen ordenes seleccionadas</h3>";
            echo '<script language="javascript">alert("No se logró, no existen ordenes seleccionadas");</script>'; 
        }else{

              $orden = $orden_model->listarOrden($id_consecutivo);
              $total = 0;             
              foreach ($orden as $row) {
                echo "<tr>";
                echo "<td>" . $row['id_consecutivo'] . "</td>";
                echo "<td>" . $row['cedula_usuario'] . "</td>";
                echo "<td>" . $row['id_orden'] . "</td>";
                echo "<td>" . $row['id_articulo'] . "</td>"; 
                echo "<td>" . $row['id_departamento'] . "</td>";
                echo "<td>" . $row['descripcion'] . "</td>";
                echo "<td>" . $row['precio'] . "</td>";
                echo "<td>" . $row['cantidad'] . "</td>";
                $total += $row['precio'];
          }
            echo "<tr>";
            echo "<td colspan='6'>" . "TOTAL" . "</td>";
            echo "<td colspan='2'>" . $total . "</td>";
         
        }  
         
    }

?>

</table>


    <input type="submit" style='font-size: 17px;' class='btn btn-info' name="" value="Consultar"><br> 
    <label for="usr">Código de orden: </label>

    <SELECT NAME="id_consecutivo">
      <option>Ordenes...</option>
      <?php

        $result_array = $consecutivo_model->listarConsecutivosUsuario($cedula_usuario);
        foreach ($result_array as $row){
          echo "<OPTION VALUE=\"".$row['id_consecutivo']."\">".$row['id_consecutivo']. " - " . $row['cedula_usuario']."</OPTION>";
        }
      ?>
    </SELECT>
    <br>
</form>



<?php
  include '../shared/footer.php';
?>
