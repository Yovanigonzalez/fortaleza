<?php

include 'menu.php';

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'agregar') {
        agregarAlCarrito($_POST['id'], $_POST['titulo'], $_POST['precio'], $_POST['descripcion'], $_POST['subtitulo']);
        echo '¡Éxito! Fue agregado a su carrito.';
    } elseif ($_POST['action'] === 'limpiar') {
        limpiarCarrito();
    }
}

function agregarAlCarrito($id, $titulo, $precio, $descripcion, $subtitulo) {
    $_SESSION['carrito'][] = array('id' => $id, 'titulo' => $titulo, 'precio' => $precio, 'descripcion' => $descripcion, 'subtitulo' => $subtitulo);
}

function limpiarCarrito() {
    $_SESSION['carrito'] = array();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>

</head>
<body>

    <h2 align="center">Carrito de Compras</h2>

    <?php
    if (!empty($_SESSION['carrito'])) {
        echo "<ul>";
        $totalCarrito = 0;
        foreach ($_SESSION['carrito'] as $producto) {
            echo "<li> Producto: {$producto['subtitulo']} - Descripción: {$producto['descripcion']} - Precio: $ {$producto['precio']}</li>";
            $totalCarrito += $producto['precio'];
        }
        echo "</ul>";
        echo "<p>Total: $ {$totalCarrito}</p>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='action' value='limpiar'>";
        echo "<button type='submit'>Limpiar Carrito</button>";
        echo "</form>";
    } else {
        echo "<p>El carrito está vacío.</p>";
    }
    ?>

    <a href="tienda.php">Volver a la Tienda</a>

</body>
</html>
