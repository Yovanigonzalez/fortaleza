<?php
session_start();
include '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar el registro de la base de datos
    $deleteQuery = "DELETE FROM menu WHERE id = $id";

    if ($conn->query($deleteQuery) === TRUE) {
        // Set success message
        $_SESSION['success_message'] = "Registro eliminado correctamente.";
    } else {
        // Set error message
        $_SESSION['error_message'] = "Error al eliminar el registro: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();

// Redireccionar a la página principal después de eliminar
header("Location: crud_menu.php");
exit();
?>
