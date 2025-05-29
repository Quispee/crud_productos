<?php
include("db.php");
$id = $_GET['id'];

// Seguridad básica para evitar inyección SQL
$id = intval($id);

// Ejecutar eliminación y checar resultado
if ($conexion->query("DELETE FROM productos WHERE id_producto = $id")) {
    // Si se eliminó correctamente, mostramos alerta y redirigimos
    echo "<script>
        alert('Producto eliminado correctamente.');
        window.location.href = 'index.php';
    </script>";
} else {
    // Si hubo error, también avisamos
    echo "<script>
        alert('Error al eliminar el producto.');
        window.location.href = 'index.php';
    </script>";
}
?>
