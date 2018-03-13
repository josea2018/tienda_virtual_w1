<?php
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';
  echo "<li><a href=../home/index.php>Inicio</a><br></li>";
  echo "<li><a href=../carro/menu.php>Carro de compras</a></li>";
  $cedula_usuario = isset($_GET['cedula_usuario']) ? $_GET['cedula_usuario'] : '';
  //echo $cedula_usuario;
  $lineasOrden = $lineaOrden_model->listarLineasOrden();
  
  if($lineasOrden == null){
       echo "<h2>No hay artículos en el carro para generar la orden</h2>";
    }else{
    	$consecutivo_model->insertarConsecutivo($cedula_usuario);
    	$consecutivos = $consecutivo_model->listarConsecutivos();
    	$cantidad_consecutivos = count($consecutivos);
    	$id_consecutivo = $consecutivos[$cantidad_consecutivos-1]['id_consecutivo'];

    	$cantidadLineasOrden = count($lineasOrden);   
        $id_orden = $lineasOrden[$cantidadLineasOrden-1]['id_orden'];
        $lineasOrdenActual = $lineaOrden_model->buscarLineasOrden($id_orden);

        foreach ($lineasOrdenActual as $row) {

        	$cedula_usuario = $row['cedula_usuario'];
        	$id_orden = $row['id_orden'];
        	$id_articulo = $row['id_articulo'];
        	$id_departamento = $row['id_departamento'];
        	$descripcion = $row['descripcion'];
        	$precio = $row['precio'];
        	$cantidad = $row['cantidad'];

        	if($id_articulo != ""){
        		$orden_model->insertarOrden($id_consecutivo, $cedula_usuario, $id_orden, $id_articulo, $id_departamento, $descripcion, $precio, $cantidad);

        	}
        }
    }
  
  //return header("Location: ../carro/menu.php");
?>

    <table border="1">
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
        include '../DbSetup.php';
        //var_dump($result_array);
        if($lineasOrden == null)
        {
          //echo "<h2>No se generó la orden</h2>";
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
            //"<a href='../carro/eliminarUno.php?ido=".$id_orden . "' '&ida=".$row['id_articulo'] ."'>Eliminar</a>".
          }
          	echo "<tr>";
            echo "<td colspan='6'>" . "TOTAL" . "</td>";
            echo "<td colspan='2'>" . $total . "</td>";
         
        }
        $lineaOrden_model->eliminarTodo($cedula_usuario)
        //"<a href='../carro/eliminarUno.php?id_a=" . $row['id_articulo'] . "'>Eliminar</a>".
      ?>
    </table>
