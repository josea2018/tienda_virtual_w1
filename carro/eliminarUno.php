<?php
  include '../seguridad/verificar_session.php';
  include '../DbSetup.php';

  $ido = isset($_GET['ido']) ? $_GET['ido'] : '';
  $ido = rtrim ($ido);
  //echo 'id_orden:: ' . $ido . "<br>";
  
  $ida = isset($_GET['ida']) ? $_GET['ida'] : '';
  $ida = rtrim ($ida);
  //echo 'id_articulo:: ' . $ida . "<br>";
  
  $id_usuario = isset($_GET['usuario']) ? $_GET['usuario'] : '';
  $id_usuario = rtrim ($id_usuario);
  //echo 'usuario: ' . $id_usuario . "<br>";
  
  //$lineaOrden_model->eliminarUno($id_usuario, $ido, $ida);
  $lineaOrden_model->eliminarUno($id_usuario, $ido, $ida);

  //$id_o = isset($_GET['id_o']) ? $_GET['id_o'] : '';
  //echo "id_orden:: " . $id_o;
  return header("Location: ../carro/menu.php");
  
?>
