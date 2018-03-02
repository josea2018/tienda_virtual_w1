<?php

session_start();
if (!isset($_SESSION['usuario_cedula']) || empty($_SESSION['usuario_cedula'])) {
  return header("Location: /seguridad/login.php");

}
