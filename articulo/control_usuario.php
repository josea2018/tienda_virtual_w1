<?php
  
	$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';
	if($tipo == a){
		return header("Location: ../articulo/menu.php");
	}else{
		return header("Location: ../shared/mensaje_control.php");
	}

?>