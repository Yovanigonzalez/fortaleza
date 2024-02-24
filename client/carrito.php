<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'agregar') {
        agregarAlCarrito($_POST['titulo'], $_POST['precio']);
    } elseif ($_POST['action'] === 'limpiar') {
        limpiarCarrito();
    }
}

function agregarAlCarrito($titulo, $precio) {
    $_SESSION['carrito'][] = array('titulo' => $titulo, 'precio' => $precio);
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

    <h2>Carrito de Compras</h2>

    <?php
    if (!empty($_SESSION['carrito'])) {
        echo "<ul>";
        $totalCarrito = 0;
        foreach ($_SESSION['carrito'] as $producto) {
            echo "<li>{$producto['titulo']} - $ {$producto['precio']}</li>";
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
