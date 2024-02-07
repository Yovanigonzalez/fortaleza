
<?php include 'seccion1.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/comida.css">

    <title>Pollos La Fortaleza Chicken | Menú</title>

</head>
<body>
<!-- Agregar formulario de búsqueda -->
<form method="GET" action="">
    <label for="busqueda">Buscar:</label>
    <input type="text" id="busqueda" name="busqueda">
    <input type="submit" value="Buscar">
</form>


    <h1 align="center">Menú de Comida</h1>

    <div id="menu-container">

        <?php
                // Establecer conexión a la base de datos
        include 'config/conexion.php';

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Query para obtener datos
        $query = "SELECT subtitulo, descripcion, precio1, precio2, precio3, categoria, imagen FROM menu";

        // Obtener el valor de búsqueda del formulario
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

// Modificar la consulta SQL para incluir el filtro de búsqueda
$query = "SELECT subtitulo, descripcion, precio1, precio2, precio3, categoria, imagen FROM menu 
          WHERE subtitulo LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%'";


        // Ejecutar la consulta
        $result = $conn->query($query);

        // Mostrar los resultados
        while ($item = $result->fetch_assoc()) {
            // La ruta de la imagen es asumida en la carpeta 'view'
            
            $imagenRuta = "view/" . $item['imagen'];

            echo "<div class='menu-item' onclick='showDetails()'>";
            echo "<img src='$imagenRuta' alt='{$item['subtitulo']}'>";
            echo "<div class='menu-item-content'>";
            echo "<h3 align='center'>{$item['subtitulo']}</h3>";
            echo "<p>{$item['descripcion']}</p>";
            echo "<ul>";
            echo "<li>1/2 pollo x {$item['precio1']}</li>";
            echo "<li>1 pollo x {$item['precio2']}</li>";
            echo "<li>2 pollos x {$item['precio3']}</li>";
            echo "</ul>";
            echo "</div>";
            echo "</div>";
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
        ?>

    </div>

</body>
</html>
