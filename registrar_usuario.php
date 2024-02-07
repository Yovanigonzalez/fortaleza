<?php
include 'config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar valores del formulario
    $username = $_POST['registerUsername'];
    $phone = $_POST['registerPhone'];
    $email = $_POST['registerEmail'];
    $password = password_hash($_POST['registerPassword'], PASSWORD_DEFAULT);

    // Verificar si el usuario ya existe en la base de datos
    $sql_verificar = "SELECT * FROM usuarios WHERE correo = '$email'";
    $result_verificar = $conn->query($sql_verificar);

    if ($result_verificar->num_rows > 0) {
        // Redirigir a login.php con mensaje de error
        header("Location: login.php?status=error&message=El usuario ya está registrado");
        exit();
    }

    // Insertar datos en la base de datos con rol 'cliente'
    $sql_insertar = "INSERT INTO usuarios (nombre_usuario, telefono, correo, contrasena, rol) VALUES ('$username', '$phone', '$email', '$password', 'cliente')";

    if ($conn->query($sql_insertar) === TRUE) {
        // Redirigir a login.php con mensaje de éxito
        header("Location: login.php?status=success&message=Usuario registrado con éxito, ahora inicia sesión");
        exit();
    } else {
        // Redirigir a login.php con mensaje de error
        header("Location: login.php?status=error&message=Error al registrar el usuario: " . $conn->error);
        exit();
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Redirigir a login.php si el método de solicitud no es válido
    header("Location: login.php?status=error&message=Método de solicitud no válido");
    exit();
}
?>


