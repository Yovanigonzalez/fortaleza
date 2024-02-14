<?php
include '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar valores del formulario
    $email = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];

    // Consultar la base de datos para obtener el usuario por correo
    $sql_buscar_usuario = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt_buscar_usuario = $conn->prepare($sql_buscar_usuario);
    $stmt_buscar_usuario->bind_param("s", $email);
    $stmt_buscar_usuario->execute();
    $result_buscar_usuario = $stmt_buscar_usuario->get_result();

    if ($result_buscar_usuario->num_rows > 0) {
        // El usuario existe, verificar la contraseña
        $row = $result_buscar_usuario->fetch_assoc();
        $hashed_password = $row['contrasena'];

        if (password_verify($password, $hashed_password)) {
            // Contraseña correcta, iniciar sesión
            session_start();
            $_SESSION['usuario_id'] = $row['id_usuario'];
            $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
            $_SESSION['rol'] = $row['rol'];

            // Redirigir según el rol
            if ($row['rol'] === 'admin') {
                header("Location: ../admin/inicio.php");
                exit();
            } elseif ($row['rol'] === 'job') {
                header("Location: ../trabajador/venta.php");
                exit();
            } elseif ($row['rol'] === 'super') {
                header("Location: ../super/inicio.php");
                exit();
            } else {
                header("Location: error.php");
                exit();
            }
        } else {
            // Contraseña incorrecta
            header("Location: login.php?status=error&message=Contraseña incorrecta");
            exit();
        }
    } else {
        // El usuario no existe
        header("Location: login.php?status=error&message=Usuario no encontrado");
        exit();
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
