<?php

include '../config/conexion.php'; // Asegúrate de que esta instrucción include apunte al archivo correcto con los detalles de la conexión a la base de datos.

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Utiliza isset() para verificar si las variables POST están definidas y evitar posibles avisos de índice indefinido.
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : null;
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;
        $precio = isset($_POST['precio']) ? $_POST['precio'] : null;
        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;

        // Valida los datos de entrada: asegúrate de realizar la validación de entrada antes de utilizar los datos en las consultas a la base de datos.
        // Puedes agregar más validaciones según tus requisitos.

        // Verifica si ya existe un registro con los mismos valores de cantidad y descripción
        $stmt_verificar = $conn->prepare("SELECT COUNT(*) AS cantidad_registros FROM producto WHERE cantidad = ? AND descripcion = ?");
        $stmt_verificar->bind_param('ss', $cantidad, $descripcion);
        $stmt_verificar->execute();
        $resultado_verificar = $stmt_verificar->get_result()->fetch_assoc();

        if ($resultado_verificar['cantidad_registros'] > 0) {
            // Ya existe un registro con los mismos valores, muestra un mensaje de error y no guarda nuevamente
            header('Location: a_pollo.php?success=false&error_message=Los+datos+ya+existen.');
            exit();
        }

        // Inserta los datos en la tabla de promociones en la base de datos 'pollo'
        $stmt_insertar = $conn->prepare("INSERT INTO producto (cantidad, descripcion, precio, categoria) VALUES (?, ?, ?, ?)");
        $stmt_insertar->bind_param('ssss', $cantidad, $descripcion, $precio, $categoria);
        $stmt_insertar->execute();

        header("Location: a_pollo.php?success=true");
        exit();
    }
} catch (Exception $e) {
    echo "Error al guardar en la base de datos: " . $e->getMessage();
} finally {
    // Cerrar la conexión con la base de datos al final del script
    $conn->close();
}
?>
