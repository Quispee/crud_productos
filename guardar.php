<?php
include("db.php");

$conexion->query("INSERT INTO productos (codigo, nombre, categoria, stock, precio)
VALUES ('{$_POST['codigo']}', '{$_POST['nombre']}', '{$_POST['categoria']}', '{$_POST['stock']}', '{$_POST['precio']}')");

header("Location: index.php");
?>
