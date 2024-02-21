<?php
include '../config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se proporciona un ID de producto
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Consultar la base de datos para obtener los detalles del producto
    $query = "SELECT * FROM producto WHERE id = $product_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $product_data = $result->fetch_assoc();
    } else {
        echo "Producto no encontrado";
        exit;
    }
} else {
    echo "ID de producto no proporcionado";
    exit;
}

// Procesar el formulario de actualización si se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar datos del formulario
    $new_cantidad = $_POST['new_cantidad'];
    $new_descripcion = $_POST['new_descripcion'];
    $new_precio = $_POST['new_precio'];
    $new_categoria = $_POST['new_categoria'];

    // Actualizar la base de datos con los nuevos valores
    $update_query = "UPDATE producto SET cantidad = '$new_cantidad', descripcion = '$new_descripcion', precio = '$new_precio', categoria = '$new_categoria' WHERE id = $product_id";

    if ($conn->query($update_query) === TRUE) {
        $success_message = "Producto actualizado con éxito";
    } else {
        $error_message = "Error al actualizar el producto: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fortaleza | CRUD Usuarios</title>
    <link rel="shortcut icon" type="image/x-icon" href="../log/ico.png">
    <meta name="description" content="Descripción de tu sitio web">
    <meta name="keywords" content="fortaleza, sitio web, ejemplo">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-Z2mU9ZckH3vJ8J1l7Z5Mz5l1TZw4E1KecE2lSZ/Kz55Jz1k3T9I71bIAsj9gPzR5" crossorigin="anonymous">
    <style>
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
    </style>
</head>

<?php include 'menu.php'; ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container-fluid">
                <br>
                <div class="card">
                    <div class="card-body">
                        <h2 class="mb-4">Editar Producto</h2>

                        <?php
                        // Mostrar mensaje de éxito si está establecido
                        if (isset($success_message)) {
                            echo '<div class="alert alert-success">' . $success_message . '</div>';
                        }

                        // Mostrar mensaje de error si está establecido
                        if (isset($error_message)) {
                            echo '<div class="alert alert-danger">' . $error_message . '</div>';
                        }
                        ?>

                        <form method="post">
                            <div class="form-group">
                                <label for="new_cantidad">Nueva Cantidad:</label>
                                <input type="text" class="form-control" name="new_cantidad" value="<?php echo $product_data['cantidad']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="new_descripcion">Nueva Descripción:</label>
                                <input type="text" class="form-control" name="new_descripcion" value="<?php echo $product_data['descripcion']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="new_precio">Nuevo Precio:</label>
                                <input type="text" class="form-control" name="new_precio" value="<?php echo $product_data['precio']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="new_categoria">Nueva Categoría:</label>
                                <input type="text" class="form-control" name="new_categoria" value="<?php echo $product_data['categoria']; ?>" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enlaces a jQuery, Popper.js y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
