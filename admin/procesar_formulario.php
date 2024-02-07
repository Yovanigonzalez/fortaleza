<?php

// Incluir el archivo de conexión a la base de datos
include '../config/conexion.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $rol = $_POST["rol"];

    // Encriptar la contraseña usando password_hash()
    $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    // Verificar si ya existe un usuario con el mismo correo electrónico
    $sql_verificacion = "SELECT COUNT(*) AS total FROM usuarios WHERE correo = ?";
    $stmt_verificacion = $conn->prepare($sql_verificacion);
    $stmt_verificacion->bind_param("s", $correo);
    $stmt_verificacion->execute();
    $stmt_verificacion->bind_result($total);
    $stmt_verificacion->fetch();
    $stmt_verificacion->close();

    if ($total > 0) {
        // Usuario con el mismo correo electrónico ya existe
        header("Location: a_usuario.php?mensaje=duplicado");
        exit();
    }

    // Preparar y ejecutar la consulta SQL para insertar datos en la tabla 'usuarios'
    $sql = "INSERT INTO usuarios (nombre_usuario, telefono, correo, contrasena, rol) VALUES (?, ?, ?, ?, ?)";
    $declaracion = $conn->prepare($sql);
    $declaracion->bind_param("sssss", $nombre, $telefono, $correo, $contrasena_encriptada, $rol);
    
    if ($declaracion->execute()) {
        // Inserción de datos exitosa
        header("Location: a_usuario.php?mensaje=exito");
        exit();
    } else {
        // Error en la inserción de datos
        header("Location: a_usuario.php?mensaje=error&detalle=" . $declaracion->error);
        exit();
    }

    // Cerrar la declaración
    $declaracion->close();
} else {
    // Si el formulario no ha sido enviado, redirigir al usuario a la página del formulario
    header("Location: agregar_usuario.php");
    exit();
}

// Cerrar la conexión a la base de datos
$conn->close();

?>
