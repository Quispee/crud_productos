<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar Producto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-image: url('https://www.cloudcenterandalucia.es/wp-content/uploads/2022/01/Hacker-vs-Cracker_Cloud-Center-Andaluc%C3%ADa_Principal.png');
      background-size: cover;
      background-attachment: fixed;
      background-position: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .container {
      margin-top: 60px;
      background-color: rgba(0, 0, 0, 0.75);
      color: #ffffff;
      padding: 30px;
      border-radius: 12px;
      max-width: 600px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.5);
    }
    label {
      font-weight: bold;
    }
    .form-control {
      background-color: #f8f9fa;
    }
    h2 {
      color: #0dcaf0;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="text-center mb-4">➕ Agregar Nuevo Producto</h2>
    <form action="guardar.php" method="POST">
      <div class="mb-3">
        <label class="form-label">Código:</label>
        <input name="codigo" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Nombre:</label>
        <input name="nombre" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Categoría:</label>
        <input name="categoria" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Stock:</label>
        <input name="stock" type="number" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Precio:</label>
        <input name="precio" type="number" step="0.01" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-info w-100">Guardar Producto</button>
    </form>
    <div class="text-center mt-3">
      <a href="index.php" class="btn btn-light">⬅ Volver al listado</a>
    </div>
  </div>
</body>
</html>
