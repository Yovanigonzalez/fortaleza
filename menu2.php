<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .menu-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: flex-start;
    }

    .menu-column {
      width: 300px; /* Ajusta el ancho del menú según tus necesidades */
      height: 730px;
      flex-shrink: 0;
      border-radius: 0px 145px 145px 0px;
      background: #911D1D;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      color: #FFF;
    }

    .menu-item {
      width: 75%;
      height: 42px;
      flex-shrink: 0;
      border-radius: 50px;
      background: #FFF;
      margin-top: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #911D1D;
      text-decoration: none;
    }

    .product-container {
      width: 283px;
      height: 414px;
      flex-shrink: 0;
      border-radius: 10px;
      background: #911D1D;
      margin: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      color: #FFF;
      display: none;
    }

    .active-product {
      display: flex;
    }

    .product-image {
      width: 100%;
      height: auto;
      border-radius: 10px 10px 0 0;
    }

    .product-text {
      text-align: center;
      padding: 10px;
    }

    .buy-button {
      width: 116px;
      height: 33px;
      flex-shrink: 0;
      border-radius: 50px;
      background: #FFF;
      margin-top: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #911D1D;
      text-decoration: none;
    }

    .menu-item:hover,
    .buy-button:hover {
      background: #911D1D;
      color: #FFF;
    }

    .menu-item:active,
    .buy-button:active {
      transform: scale(0.95);
    }

    .menu-container + .menu-container {
      margin-left: 20px;
    }

    #menu-title {
      font-size: 24px;
      margin-bottom: 20px;
      color: #FFF;
    }

    .product-image {
      width: 54%;
      height: auto;
      border-radius: 100px;
      object-fit: cover;
    }

      /* Estilos para pantallas más pequeñas (ejemplo: hasta 600px) */
  @media screen and (max-width: 600px) {
    .menu-container {
      justify-content: center;
    }

    .menu-column {
      width: 100%; /* O ajusta el ancho que prefieras para pantallas más pequeñas */
      border-radius: 0;
      margin-bottom: 20px;
    }

    .menu-container + .menu-container {
      margin-left: 0;
    }

    .product-container,
    .product-image {
      width: 100%;
      border-radius: 0;
    }
  }
  
  </style>
</head>
<body>

<div class="menu-container">
  <div class="menu-column">
    <div id="menu-title">MENÚ</div>

    <?php
      // Conexión a la base de datos (reemplaza con tus propios detalles)
      include 'config/conexion.php';

      // Verificación de la conexión
      if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
      }

      // Consulta para obtener los datos de la tabla 'digital'
      $sql = "SELECT id, subtitulo FROM digital";
      $result = $conn->query($sql);

      // Generar enlaces del menú dinámicamente
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo '<a class="menu-item" href="categoria.php?id=' . $row["id"] . '">' . $row["subtitulo"] . '</a>';
        }
      } else {
        echo "0 resultados";
      }

      // Cerrar la conexión a la base de datos
      $conn->close();
    ?>
  </div>
</div>

</body>
</html>
