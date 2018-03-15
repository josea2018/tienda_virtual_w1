<div class="container" align="center" style="padding-top: 2%";>
  <ul>
    <li>
    	<?php
    		include_once '../DbSetup.php';
    		$datosSession = $usuario_model->buscarNombreActual($_SESSION['usuario_cedula']);
    		$tipoUsuario = $datosSession['tipo'];
      	echo "<a style='font-size: 25px;' href='../articulo/control_usuario.php?tipo=" . $tipoUsuario . "'>Administración de artículos</a>"
      ?>
    </li><br>
    <li>
      <a style="font-size: 25px;" href="../articulo/lista_articulos.php">Lista por artículo</a>
    </li>
  </ul>
</div>