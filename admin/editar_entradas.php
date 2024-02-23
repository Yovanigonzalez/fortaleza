<?php

include '../config/conexion.php';

// Verifica si se proporciona el parámetro ID en la URL
if (isset($_GET['id'])) {
    $id_entrada = $_GET['id'];

    // Use prepared statement to prevent SQL injection
    $consulta = "SELECT * FROM entradas WHERE id = ?";
    $statement = $conn->prepare($consulta);
    $statement->bind_param("i", $id_entrada);
    $statement->execute();
    $resultado = $statement->get_result();

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();

        // Procesa el envío del formulario si este ha sido enviado
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Recupera los datos actualizados desde el formulario
            $nueva_categoria = htmlspecialchars($_POST['categoria']); // Sanitize input
            $nuevo_producto = htmlspecialchars($_POST['producto']);
            $nuevo_stock = intval($_POST['stock']); // Ensure $nuevo_stock is an integer

            // Use prepared statement to prevent SQL injection
            $consulta_actualizar = "UPDATE entradas SET categoria = ?, producto = ?, stock = ? WHERE id = ?";
            $statement_actualizar = $conn->prepare($consulta_actualizar);
            $statement_actualizar->bind_param("ssii", $nueva_categoria, $nuevo_producto, $nuevo_stock, $id_entrada);

            if ($statement_actualizar->execute()) {
                // Establece un mensaje de éxito
                $success_message = "Entrada actualizada exitosamente.";
            } else {
                // Establece un mensaje de error si la actualización falla
                $error_message = "Error al actualizar la entrada: " . $conn->error;
            }
        }

        // Cierra el conjunto de resultados
        $resultado->close();
    } else {
        // Establece un mensaje de error si no se encuentra la entrada con el ID especificado
        $error_message = "Entrada no encontrada.";
    }
} else {
    // Establece un mensaje de error si no se proporciona el parámetro ID en la URL
    $error_message = "Solicitud inválida.";
}

// Cierra la conexión a la base de datos
$conn->close();
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
                                <div class="card-header">
                                    <h3 class="card-title">Editar Entrada</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Muestra mensajes de error, si los hay -->
                                    <?php if (isset($error_message)): ?>
                            <div class="alert alert-danger"><?php echo $error_message; ?></div>
                        <?php endif; ?>
                        <?php if (isset($success_message)): ?>
                            <div class="alert alert-success"><?php echo $success_message; ?></div>
                        <?php endif; ?>
                        
                                    <!-- Formulario para editar la entrada -->
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="categoria">Categoría:</label>
                                            <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo $fila['categoria']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="producto">Producto:</label>
                                            <input type="text" class="form-control" id="producto" name="producto" value="<?php echo $fila['producto']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="stock">Stock:</label>
                                            <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $fila['stock']; ?>" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Actualizar Entrada</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

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