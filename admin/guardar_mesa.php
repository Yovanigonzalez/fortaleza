<?php
// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../config/conexion.php';

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $numero_mesa = $_POST['numero_mesa'];
    $estatus = $_POST['estatus']; // Add this line to get the value of "estatus"

    // Validar o sanitizar datos según sea necesario

    // Verificar si ya existe un registro con el mismo número de mesa
    $check_sql = "SELECT * FROM mesa WHERE numero_mesa = '$numero_mesa'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        // Redirigir con un mensaje de error si ya existe un registro
        header("Location: mesa.php?success=false&error_message=" . urlencode("Ya existe una mesa con ese número."));
        exit();
    }

    // Insertar datos en la base de datos
    $insert_sql = "INSERT INTO mesa (numero_mesa, estatus) VALUES ('$numero_mesa', '$estatus')";

    if ($conn->query($insert_sql) === TRUE) {
        // Redirigir de nuevo a la página del formulario con un mensaje de éxito
        header("Location: mesa.php?success=true");
        exit();
    } else {
        // Redirigir de nuevo a la página del formulario con un mensaje de error
        header("Location: mesa.php?success=false&error_message=" . urlencode($conn->error));
        exit();
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si el formulario no ha sido enviado, redirigir a la página del formulario
    header("Location: mesa.php");
    exit();
}
?>
