<ul>
  <li>
  	<?php
  		include_once '../DbSetup.php';
  		$datosSession = $usuario_model->buscarNombreActual($_SESSION['usuario_cedula']);
  		$tipoUsuario = $datosSession['tipo'];
      	echo "<a href='../departamento/control_usuario.php?tipo=". $tipoUsuario . "'>Administración de departamentos</a>"
    ?>
  </li>
</ul>
