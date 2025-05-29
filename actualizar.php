<?php
include("db.php");

$conexion->query("UPDATE productos SET 
  codigo='{$_POST['codigo']}',
  nombre='{$_POST['nombre']}',
  categoria='{$_POST['categoria']}',
  stock={$_POST['stock']},
  precio={$_POST['precio']}
WHERE id_producto={$_POST['id']}");

header("Location: index.php");
?>
