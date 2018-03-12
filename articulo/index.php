<ul>
  <li>
  	<?php
  		include_once '../DbSetup.php';
  		$datosSession = $usuario_model->buscarNombreActual($_SESSION['usuario_cedula']);
  		$tipoUsuario = $datosSession['tipo'];
    	echo "<a href='../articulo/control_usuario.php?tipo=" . $tipoUsuario . "'>Administración de artículos</a>"
    ?>
  </li><br>
  <li>
    <a href="../articulo/lista_articulos.php">Lista por artículo</a>
  </li>
</ul>
