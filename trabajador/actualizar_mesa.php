<?php
include '../config/conexion.php';

// Verificar si se envían datos mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario POST
    $mesa = $_POST['mesa'];

    // Realizar la actualización en la base de datos
    $sqlActualizarMesa = "UPDATE mesa SET estatus = 'desocupada' WHERE numero_mesa = '$mesa'";

    if ($conn->query($sqlActualizarMesa) === TRUE) {
        echo "Actualización exitosa";
    } else {
        echo "Error al actualizar la mesa: " . $conn->error;
    }

    $conn->close();
}
?>
