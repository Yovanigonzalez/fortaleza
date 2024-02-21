<?php
// Incluir el archivo de conexión
include '../config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se proporciona el parámetro 'id' en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Obtener el ID del producto a eliminar
    $productoId = $_GET['id'];

    // Consulta para eliminar el producto
    $deleteQuery = "DELETE FROM producto WHERE id = $productoId";

    if ($conn->query($deleteQuery) === TRUE) {
        // Éxito: redirigir con un mensaje de éxito
        session_start();
        $_SESSION['success_message'] = "Producto eliminado exitosamente.";
        header("Location: crud_comida.php"); // Cambia 'crud_comida.php' al nombre de tu archivo principal
        exit();
    } else {
        // Error: redirigir con un mensaje de error
        session_start();
        $_SESSION['error_message'] = "Error al eliminar el producto: " . $conn->error;
        header("Location: crud_comida.php"); // Cambia 'crud_comida.php' al nombre de tu archivo principal
        exit();
    }
} else {
    // Error: redirigir con un mensaje de error si no se proporciona el parámetro 'id'
    session_start();
    $_SESSION['error_message'] = "Error: ID de producto no válido.";
    header("Location: crud_comida.php"); // Cambia 'crud_comida.php' al nombre de tu archivo principal
    exit();
}

// Cerrar la conexión
$conn->close();
?>
