<?php
include("db.php");
$id = $_GET['id'];
$res = $conexion->query("SELECT * FROM productos WHERE id_producto = $id");
$producto = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Producto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-image: url('https://elperuano.pe/fotografia/thumbnail/2023/09/13/000264766M.jpg');
      background-size: cover;
      background-attachment: fixed;
      background-position: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .container {
      margin-top: 60px;
      background-color: rgba(0, 0, 0, 0.7);
      padding: 35px;
      border-radius: 15px;
      max-width: 600px;
      color: white;
      box-shadow: 0 6px 18px rgba(0,0,0,0.5);
    }
    h2 {
      color: #ffc107;
      text-shadow: 1px 1px 3px black;
    }
    label {
      font-weight: bold;
    }
    .form-control {
      background-color: rgba(255, 255, 255, 0.9);
      border: none;
      box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
    }
    .btn-warning {
      font-weight: bold;
    }
    .btn-secondary {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="text-center mb-4">✏️ Editar Producto</h2>
    <form action="actualizar.php" method="POST">
      <input type="hidden" name="id" value="<?= $producto['id_producto'] ?>">
      <div class="mb-3">
        <label class="form-label">Código:</label>
        <input name="codigo" class="form-control" value="<?= $producto['codigo'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Nombre:</label>
        <input name="nombre" class="form-control" value="<?= $producto['nombre'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Categoría:</label>
        <input name="categoria" class="form-control" value="<?= $producto['categoria'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Stock:</label>
        <input name="stock" type="number" class="form-control" value="<?= $producto['stock'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Precio:</label>
        <input name="precio" type="number" step="0.01" class="form-control" value="<?= $producto['precio'] ?>" required>
      </div>
      <button type="submit" class="btn btn-warning w-100">💾 Actualizar Producto</button>
    </form>
    <div class="text-center">
      <a href="index.php" class="btn btn-secondary">⬅ Volver al listado</a>
    </div>
  </div>
</body>
</html>
