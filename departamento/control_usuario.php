<?php

	$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';
	if($tipo == a){
		return header("Location: ../departamento/menu.php");
	}else{
		return header("Location: ../shared/mensaje_control.php");
	}

?>