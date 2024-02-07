<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include '../config/conexion.php';

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recoge el dato del formulario
    $subtitulo = $_POST["subtitulo"];

    // Verifica que el campo requerido no esté vacío
    if (empty($subtitulo)) {
        echo "El campo 'subtitulo' es obligatorio. Por favor, completa el formulario.";
    } else {
        // Inserta los datos en la base de datos
        $sql = "INSERT INTO digital (subtitulo) VALUES ('$subtitulo')";

        if ($conn->query($sql) === TRUE) {
            // Redirige a a_menu.php si la inserción es exitosa
            header("Location: a_menu_D.php?success=true");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            // Redirige a a_menu.php con mensaje de error
            header("Location: a_menu_D.php?error=" . urlencode("Error: " . $sql . "<br>" . $conn->error));
            exit();
        }
    }

    $conn->close();
} else {
    echo "Acceso denegado.";
}
?>
