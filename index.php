
<?php include("db.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Listado de Productos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap');

    body {
      background-image: url('https://www.cloudcenterandalucia.es/wp-content/uploads/2022/01/Hacker-vs-Cracker_Cloud-Center-Andaluc%C3%ADa_Principal.png');
      background-size: cover;
      background-attachment: fixed;
      font-family: 'Roboto Mono', monospace;
      margin: 0; padding: 0;
      color: #eee;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 40px 20px;
    }

    .container {
      background: rgba(10, 10, 10, 0.75);
      backdrop-filter: blur(8px);
      border-radius: 16px;
      box-shadow: 0 8px 30px rgba(0, 255, 255, 0.3);
      max-width: 1000px;
      width: 100%;
      padding: 40px;
    }

    h2 {
      text-align: center;
      font-size: 2.8rem;
      margin-bottom: 20px;
      color: #0ff;
      text-shadow:
        0 0 5px #0ff,
        0 0 10px #0ff,
        0 0 20px #0ff,
        0 0 40px #0ff;
      letter-spacing: 3px;
      font-weight: 900;
      user-select: none;
    }

    /* Search input */
    #searchBox {
      display: block;
      width: 100%;
      max-width: 300px;
      margin: 0 auto 30px auto;
      padding: 10px 15px;
      font-size: 1rem;
      border-radius: 30px;
      border: none;
      outline: none;
      box-shadow: 0 0 10px #0ff44d;
      background-color: #111;
      color: #0ff;
      transition: box-shadow 0.3s ease;
    }
    #searchBox::placeholder {
      color: #0ff8;
    }
    #searchBox:focus {
      box-shadow: 0 0 20px #0ff;
    }

    /* Table styling */
    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 10px;
      background: #222;
      border-radius: 12px;
      overflow: hidden;
    }

    thead tr {
      background-color: #000c12;
      color: #0ff;
      font-weight: 700;
      font-size: 1rem;
      letter-spacing: 0.1em;
    }

    thead th {
      padding: 12px 15px;
    }

    tbody tr {
      background: #111c22;
      cursor: pointer;
      transition: background-color 0.3s ease;
      border-radius: 12px;
      box-shadow: inset 0 0 10px #0ff1;
    }

    tbody tr:hover {
      background-color: #0ff1;
      color: #000;
      box-shadow:
        0 0 15px #0ff, 
        inset 0 0 20px #0ff8;
      transform: translateX(5px);
      font-weight: 700;
    }

    tbody td {
      padding: 12px 15px;
      vertical-align: middle;
      border-bottom: 1px solid transparent;
    }

    /* Buttons */
    a.btn {
      border-radius: 50px;
      padding: 6px 14px;
      font-weight: 700;
      box-shadow: 0 0 8px transparent;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 0.9rem;
      user-select: none;
    }
    a.btn-info {
      background: linear-gradient(90deg, #00bfff, #00e5ff);
      color: #000;
      box-shadow: 0 0 8px #00e5ffaa;
    }
    a.btn-info:hover {
      background: linear-gradient(90deg, #00e5ff, #00bfff);
      box-shadow: 0 0 14px #00e5ffee;
      color: #000;
    }
    a.btn-warning {
      background: linear-gradient(90deg, #ffbf00, #ffdc00);
      color: #000;
      box-shadow: 0 0 8px #ffd700aa;
    }
    a.btn-warning:hover {
      background: linear-gradient(90deg, #ffdc00, #ffbf00);
      box-shadow: 0 0 14px #ffd700ee;
      color: #000;
    }
    a.btn-danger {
      background: linear-gradient(90deg, #ff3300, #ff5511);
      color: #fff;
      box-shadow: 0 0 8px #ff3300aa;
    }
    a.btn-danger:hover {
      background: linear-gradient(90deg, #ff5511, #ff3300);
      box-shadow: 0 0 14px #ff3300ee;
      color: #fff;
    }

    /* Icon spacing */
    .btn svg, .btn span.emoji {
      font-size: 1.1rem;
      line-height: 1;
    }

  </style>
</head>
<body>
  <div class="container" role="main">
    <h2>📦 LISTADO DE PRODUCTOS</h2>

    <input type="text" id="searchBox" placeholder="🔍Skill te dice que Busques producto por nombre, código o categoría...">

    <a href="agregar.php" class="btn btn-info mb-4 w-100" aria-label="Agregar nuevo producto">
      <span class="emoji">➕</span> Agregar nuevo producto
    </a>

    <table aria-describedby="Listado de productos disponibles" role="table" id="productosTable">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Código</th>
          <th scope="col">Nombre</th>
          <th scope="col">Categoría</th>
          <th scope="col">Stock</th>
          <th scope="col">Precio</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $resultado = $conexion->query("SELECT * FROM productos");
        while ($fila = $resultado->fetch_assoc()) {
          $id = htmlspecialchars($fila['id_producto']);
          $codigo = htmlspecialchars($fila['codigo']);
          $nombre = htmlspecialchars($fila['nombre']);
          $categoria = htmlspecialchars($fila['categoria']);
          $stock = htmlspecialchars($fila['stock']);
          $precio = htmlspecialchars($fila['precio']);
          echo "<tr>
                  <td>{$id}</td>
                  <td>{$codigo}</td>
                  <td>{$nombre}</td>
                  <td>{$categoria}</td>
                  <td>{$stock}</td>
                  <td>\${$precio}</td>
                  <td>
                    <a href='editar.php?id={$id}' class='btn btn-warning btn-sm' aria-label='Editar producto {$nombre}'>✏️ Editar</a> 
                    <a href='eliminar.php?id={$id}' class='btn btn-danger btn-sm' aria-label='Eliminar producto {$nombre}'>🗑️ Eliminar</a>
                  </td>
                </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <script>
    // Funcionalidad de filtro en la tabla (buscador en tiempo real)
    const searchBox = document.getElementById('searchBox');
    const table = document.getElementById('productosTable');
    const rows = table.tBodies[0].rows;

    searchBox.addEventListener('input', () => {
      const filter = searchBox.value.toLowerCase();

      for (const row of rows) {
        // Busca en codigo, nombre, categoria
        const codigo = row.cells[1].textContent.toLowerCase();
        const nombre = row.cells[2].textContent.toLowerCase();
        const categoria = row.cells[3].textContent.toLowerCase();

        if (codigo.includes(filter) || nombre.includes(filter) || categoria.includes(filter)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      }
    });
  </script>
</body>
</html>
