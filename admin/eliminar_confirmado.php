<?php
include '../config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del usuario a eliminar
$id = $_GET['id'];

// Eliminar el usuario de la base de datos
$sql = "DELETE FROM usuarios WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    // Redirigir a crud_usuarios.php con mensaje de éxito
    header("Location: crud_usuario.php?success=Usuario eliminado correctamente");
    exit();
} else {
    // Redirigir a crud_usuarios.php con mensaje de error
    header("Location: crud_usuario.php?error=Error al eliminar usuario: " . $conn->error);
    exit();
}

// Cerrar conexión
$conn->close();
?>
