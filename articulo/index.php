<div class="container" align="center" style="padding-top: 2%";>
  <ul>
    <li style="list-style:none;">
    	<?php
    		include_once '../DbSetup.php';
    		$datosSession = $usuario_model->buscarNombreActual($_SESSION['usuario_cedula']);
    		$tipoUsuario = $datosSession['tipo'];
      	echo "<a style='font-size: 25px;' href='../articulo/control_usuario.php?tipo=" . $tipoUsuario . "'>Administración de artículos</a>"
      ?>
    </li><hr width="33%" /><br>
    <li style="list-style:none;">
      <a style="font-size: 25px;" href="../articulo/lista_articulos.php">Lista por artículo</a>
    </li>
  </ul>
  <hr width="28%" />
</div>