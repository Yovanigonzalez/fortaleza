
<?php include 'seccion1.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/comida.css">
    <link rel="stylesheet" href="css/responsivo.css">

    <style>
/* Estilos para el contenedor principal y el botón Comprar */
.menu-item {
    display: flex;
    flex-direction: column;
    align-items: center; /* Centrar horizontalmente */
}

.menu-item-content {
    text-align: center; /* Centrar horizontalmente */
}

.menu-item-content .comprar-button-container {
    margin-top: 15px;
}

.menu-item-content button {
    background-color: #911D1D;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.menu-item-content button:hover {
    background-color: #911D1D;
}


    </style>

<title>Pollos La Fortaleza Chicken | Menú</title>

 
</head>
<body>
<!-- Agregar formulario de filtro por categoría -->

    <h1 align="center">Menú de Comida</h1>

    <div id="menu-container">

    <!-- Pollo -->

    <?php
// Establecer conexión a la base de datos
include 'config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener datos con la condición de categoría 'Pollo'
$query = "SELECT subtitulo, descripcion, precio1, precio2, precio3, categoria, imagen FROM menu WHERE categoria = 'Pollo'";

// Ejecutar la consulta
$result = $conn->query($query);

// Mostrar los resultados
while ($item = $result->fetch_assoc()) {
    // La ruta de la imagen se asume en la carpeta 'view'
    
    $imagenRuta = "view/" . $item['imagen'];

    echo "<div class='menu-item' onclick='showDetails()'>";
    echo "<img src='$imagenRuta' alt='{$item['subtitulo']}'>";
    echo "<div class='menu-item-content'>";
    echo "<h3 align='center'>{$item['subtitulo']}</h3>";
    echo "<p>{$item['descripcion']}</p>";
    echo "<ul>";
    echo "<li>1/2 pollo x $ {$item['precio1']}</li>";
    echo "<li>1 pollo x $ {$item['precio2']}</li>";
    echo "<li>2 pollos x $ {$item['precio3']}</li>";
    echo "</ul>";
    // Agregar el botón "Comprar" y aplicar estilos de centrado
    echo "<div class='comprar-button-container'>";
    echo "<button onclick='redirigirALogin(\"login.php\")'>Comprar</button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>



<!-- Pollo Combos -->


<?php
// Establecer conexión a la base de datos
include 'config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener datos con la condición de categoría 'Pollo Combos'
$query = "SELECT subtitulo, descripcion, precio1, precio2, precio3, categoria, imagen FROM menu WHERE categoria = 'Pollo Combos'";

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
    echo "<li>1 pollo x $ {$item['precio1']}</li>";
    // Si es necesario, puedes agregar aquí más opciones de precios (precio2, precio3, etc.)
    // Agregar el botón "Comprar" y aplicar estilos de centrado
    echo "<div class='comprar-button-container'>";
    echo "<button onclick='redirigirALogin(\"login.php\")'>Comprar</button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

}

// Cerrar la conexión a la base de datos
$conn->close();
?>




<!-- Alitas -->

<?php
// Establecer conexión a la base de datos
include 'config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener datos con la condición de categoría 'Pollo Combos'
$query = "SELECT subtitulo, descripcion, precio1, precio2, precio3, categoria, imagen FROM menu WHERE categoria = 'Alitas'";

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
    echo "<li> $ {$item['precio1']}</li>";
    // Si es necesario, puedes agregar aquí más opciones de precios (precio2, precio3, etc.)
    // Agregar el botón "Comprar" y aplicar estilos de centrado
    echo "<div class='comprar-button-container'>";
    echo "<button onclick='redirigirALogin(\"login.php\")'>Comprar</button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

}

// Cerrar la conexión a la base de datos
$conn->close();
?>



<!-- Tenders -->

<?php
// Establecer conexión a la base de datos
include 'config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener datos con la condición de categoría 'Pollo Combos'
$query = "SELECT subtitulo, descripcion, precio1, precio2, precio3, categoria, imagen FROM menu WHERE categoria = 'Tenders'";

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
    echo "<li> $ {$item['precio1']}</li>";
    // Si es necesario, puedes agregar aquí más opciones de precios (precio2, precio3, etc.)
    // Agregar el botón "Comprar" y aplicar estilos de centrado
    echo "<div class='comprar-button-container'>";
    echo "<button onclick='redirigirALogin(\"login.php\")'>Comprar</button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

}

// Cerrar la conexión a la base de datos
$conn->close();
?>


<!-- Crepas -->


<!-- Tenders -->

<?php
// Establecer conexión a la base de datos
include 'config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener datos con la condición de categoría 'Pollo Combos'
$query = "SELECT subtitulo, descripcion, precio1, precio2, precio3, categoria, imagen FROM menu WHERE categoria = 'Crepas'";

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
    echo "<li> $ {$item['precio1']}</li>";
    // Si es necesario, puedes agregar aquí más opciones de precios (precio2, precio3, etc.)
    // Agregar el botón "Comprar" y aplicar estilos de centrado
    echo "<div class='comprar-button-container'>";
    echo "<button onclick='redirigirALogin(\"login.php\")'>Comprar</button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!-- Hamburgesa -->


<!-- Tenders -->

<?php
// Establecer conexión a la base de datos
include 'config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener datos con la condición de categoría 'Pollo Combos'
$query = "SELECT subtitulo, descripcion, precio1, precio2, precio3, categoria, imagen FROM menu WHERE categoria = 'Hamburgesas'";

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
    echo "<li> $ {$item['precio1']}</li>";
    // Si es necesario, puedes agregar aquí más opciones de precios (precio2, precio3, etc.)
    // Agregar el botón "Comprar" y aplicar estilos de centrado
    echo "<div class='comprar-button-container'>";
    echo "<button onclick='redirigirALogin(\"login.php\")'>Comprar</button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

}

// Cerrar la conexión a la base de datos
$conn->close();
?>


<!-- Costillas  PENDIENTE-->


<!-- Guarniciones PENDIENTE -->

<!-- Bebida PENDIENTE -->

<!-- Mixiotes --> 


<!-- Tenders -->

<?php
// Establecer conexión a la base de datos
include 'config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener datos con la condición de categoría 'Pollo Combos'
$query = "SELECT subtitulo, descripcion, precio1, precio2, precio3, categoria, imagen FROM menu WHERE categoria = 'Mixiotes'";

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
    echo "<li> $ {$item['precio1']}</li>";
    // Si es necesario, puedes agregar aquí más opciones de precios (precio2, precio3, etc.)
    // Agregar el botón "Comprar" y aplicar estilos de centrado
    echo "<div class='comprar-button-container'>";
    echo "<button onclick='redirigirALogin(\"login.php\")'>Comprar</button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

}

// Cerrar la conexión a la base de datos
$conn->close();
?>


    </div>
    <script>
function redirigirALogin(url) {
    window.location.href = url;
}
</script>

</body>
</html>
