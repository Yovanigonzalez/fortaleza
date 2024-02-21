<?php
include '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el id de la mesa de manera segura
    $idMesa = mysqli_real_escape_string($conn, $_POST['idMesa']);

    // Actualizar el estatus de la mesa a 'desocupada'
    $sqlActualizarMesa = "UPDATE `mesa` SET `estatus` = 'desocupada' WHERE `id` = '$idMesa'";
    
    if ($conn->query($sqlActualizarMesa) === TRUE) {
        echo 'success';
    } else {
        echo 'error: ' . $conn->error;
    }

    $conn->close();
}
?>
