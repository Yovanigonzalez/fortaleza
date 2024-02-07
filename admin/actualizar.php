<?php
// Obtener datos del formulario de edición
$id = $_POST['id'];
$nombre_usuario = $_POST['nombre_usuario'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$rol = $_POST['rol'];
// Agrega más campos según tus necesidades

include '../config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Actualizar los datos en la base de datos
$sql = "UPDATE usuarios SET
        nombre_usuario='$nombre_usuario',
        telefono='$telefono',
        correo='$correo',
        rol='$rol'
        WHERE id=$id";
// Agrega más actualizaciones según tus necesidades

if ($conn->query($sql) === TRUE) {
    // Redirigir a editar.php con mensaje de éxito
    header("Location: editar.php?id=$id&success=Usuario actualizado correctamente");
    exit();
} else {
    // Redirigir a editar.php con mensaje de error
    header("Location: editar.php?id=$id&error=Error al actualizar usuario: " . $conn->error);
    exit();
}

// Cerrar conexión
$conn->close();
?>
