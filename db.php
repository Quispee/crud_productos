<?php
$conexion = new mysqli("localhost", "root", "", "skillyull");

if ($conexion->connect_error) {
  die("Error al conectar: " . $conexion->connect_error);
}
?>
