<?php
// Verificar si el formulario se envió correctamente
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recuperar datos del formulario
    $descripcion = $_POST["descripcion"];
    $monto = $_POST["monto"];
    $fecha = $_POST["fecha"];

    include '../config/conexion.php';

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    // Preparar la consulta SQL para insertar datos en tu tabla de gastos (reemplaza con tu propia estructura de base de datos)
    $sql = "INSERT INTO gastos (descripcion, monto, fecha) VALUES ('$descripcion', $monto, '$fecha')";

    if ($conn->query($sql) === TRUE) {
        // Cerrar la conexión a la base de datos
        $conn->close();

        // Redirigir a gastos.php con mensaje de éxito
        header("Location: gastos.php?exito=1");
        exit();
    } else {
        echo "Error al registrar el gasto: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si el formulario no se envió correctamente, redirige o muestra un mensaje de error según tu necesidad
    echo "Error en el envío del formulario.";
}
?>
