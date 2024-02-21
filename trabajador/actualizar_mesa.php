<!-- Archivo 'actualizar_mesa.php' -->

<?php
include '../config/conexion.php';

// Verificar si se enviaron datos mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idMesa'])) {
    // Recuperar el ID de la mesa desde la solicitud POST
    $idMesa = $_POST['idMesa'];

    // Actualizar el estado de la mesa a 'desocupada' en la tabla 'mesa'
    $sqlActualizarMesa = "UPDATE mesa SET estatus = 'desocupada' WHERE id = $idMesa";

    if ($conn->query($sqlActualizarMesa) === TRUE) {
        // Actualizar el número de mesa a '0' en la tabla 'ventas'
        $sqlActualizarVentas = "UPDATE ventas SET mesa = 0 WHERE mesa = $idMesa";

        if ($conn->query($sqlActualizarVentas) === TRUE) {
            echo "La mesa se marcó como cobrada y se actualizó el número de mesa en las ventas con éxito.";
        } else {
            echo "Error al actualizar el número de mesa en las ventas: " . $conn->error;
        }
    } else {
        echo "Error al marcar la mesa como cobrada: " . $conn->error;
    }
} else {
    echo "Solicitud no válida.";
}

// Cerrar la conexión después de usarla
$conn->close();
?>
