<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include '../config/conexion.php';

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recoge los datos del formulario
    $subtitulo = $_POST["subtitulo"];
    $descripcion = $_POST["descripcion"];
    $precio1 = $_POST["precio1"];
    $precio2 = $_POST["precio2"];
    $precio3 = $_POST["precio3"];
    $categoria = $_POST["categoria"];

    // Ruta completa del archivo de imagen
    $targetFilePath = "../view/" . basename($_FILES["imagen"]["name"]);
    // Extensión del archivo
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Verifica que los campos requeridos no estén vacíos
    if (empty($subtitulo) || empty($descripcion) || empty($precio1) || empty($precio2) || empty($precio3) || empty($categoria)) {
        echo "Todos los campos son obligatorios. Por favor, completa el formulario.";
    } else {
        // Verifica si el archivo es una imagen
        $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileType, $allowTypes)) {
            // Sube la imagen al servidor
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $targetFilePath)) {
                // Inserta los datos en la base de datos
                $sql = "INSERT INTO menu (subtitulo, descripcion, precio1, precio2, precio3, categoria, imagen) VALUES ('$subtitulo', '$descripcion', $precio1, $precio2, $precio3, '$categoria', '$targetFilePath')";

                if ($conn->query($sql) === TRUE) {
                    // Redirige a a_menu.php si la inserción es exitosa
                    header("Location: a_menu.php?success=true");
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    // Redirige a a_menu.php con mensaje de error
                    header("Location: a_menu.php?error=" . urlencode("Error: " . $sql . "<br>" . $conn->error));
                    exit();
                }
            } else {
                echo "Error al subir la imagen.";
            }
        } else {
            echo "Solo se permiten archivos de imagen (JPG, JPEG, PNG, GIF).";
        }
    }

    $conn->close();
} else {
    echo "Acceso denegado.";
}
?>
