<div class="container" align="center" style="padding-top: 3%";>
	<ul>
	  <li style="list-style:none;">
	  	<?php
	  		include_once '../DbSetup.php';
	  		$datosSession = $usuario_model->buscarNombreActual($_SESSION['usuario_cedula']);
	  		$tipoUsuario = $datosSession['tipo'];
	      	echo "<a style='font-size: 25px;' href='../departamento/control_usuario.php?tipo=". $tipoUsuario . "'>Administración de departamentos</a>"
	    ?>
	  </li>
	</ul>
</div>

