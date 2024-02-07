<?php
// Incluir el archivo de conexión a la base de datos
include '../config/conexion.php';

// Verificar si se ha enviado la data del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario mediante POST
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];

    // Validar y sanitizar los datos según sea necesario

    // Actualizar los datos del usuario en la base de datos
    $sql = "UPDATE usuarios SET 
            nombre_usuario = '$nombre', 
            telefono = '$telefono', 
            correo = '$correo', 
            rol = '$rol' 
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Datos actualizados correctamente";
    } else {
        echo "Error al actualizar datos: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
