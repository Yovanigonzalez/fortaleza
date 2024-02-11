<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../config/conexion.php';

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $subtitulo = $_POST["subtitulo"];
    $descripcion = $_POST["descripcion"];
    $precio1 = $_POST["precio1"];
    $precio2 = $_POST["precio2"];
    $precio3 = $_POST["precio3"];
    $categoria = $_POST["categoria"];
    $estatus = $_POST["estatus"]; // New field

    $targetFilePath = "../view/" . basename($_FILES["imagen"]["name"]);
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (empty($subtitulo) || empty($descripcion) || empty($precio1) || empty($precio2) || empty($precio3) || empty($categoria) || empty($estatus)) {
        echo "Todos los campos son obligatorios. Por favor, completa el formulario.";
    } else {
        $allowTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $targetFilePath)) {
                $sql = "INSERT INTO menu (subtitulo, descripcion, precio1, precio2, precio3, categoria, estatus, imagen) VALUES ('$subtitulo', '$descripcion', $precio1, $precio2, $precio3, '$categoria', '$estatus', '$targetFilePath')";

                if ($conn->query($sql) === TRUE) {
                    header("Location: a_menu.php?success=true");
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
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

