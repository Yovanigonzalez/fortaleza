<?php
// Establecer conexión a la base de datos

include '../config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del elemento a editar desde la URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta a la base de datos para obtener los detalles del elemento a editar
    $query = "SELECT * FROM menu WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Aquí puedes mostrar un formulario prellenado con los detalles actuales y permitir la edición
    } else {
        echo "Elemento no encontrado.";
    }
} else {
    echo "ID no proporcionado.";
}

// Verificar si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nuevoSubtitulo = $_POST['nuevoSubtitulo'];
    $nuevaDescripcion = $_POST['nuevaDescripcion'];
    $nuevoPrecio1 = $_POST['nuevoPrecio1'];
    $nuevoPrecio2 = $_POST['nuevoPrecio2'];
    $nuevoPrecio3 = $_POST['nuevoPrecio3'];
    $nuevaCategoria = $_POST['nuevaCategoria'];
    $nuevoEstatus = $_POST['nuevoEstatus'];

    // Actualizar la base de datos con los nuevos datos
    $updateQuery = "UPDATE menu SET subtitulo = '$nuevoSubtitulo', descripcion = '$nuevaDescripcion', precio1 = '$nuevoPrecio1', precio2 = '$nuevoPrecio2', precio3 = '$nuevoPrecio3', categoria = '$nuevaCategoria', estatus = '$nuevoEstatus' WHERE id = $id";

    if ($conn->query($updateQuery) === TRUE) {
        $successMessage = "Registro actualizado correctamente.";
    } else {
        $errorMessage = "Error al actualizar el registro: " . $conn->error;
    }
}

// Cerrar la conexión
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
                    <div class="card-body">


                    <h2>Editar Elemento</h2>
        
                    <br>
                    <?php
                            if (isset($successMessage)) {
                                echo '<div class="alert alert-success" role="alert">' . $successMessage . '</div>';
                            } elseif (isset($errorMessage)) {
                                echo '<div class="alert alert-danger" role="alert">' . $errorMessage . '</div>';
                            }
                        ?>
                        <br>
        <!-- Formulario para editar -->
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id; ?>">
            <div class="form-group">
                <label for="nuevoSubtitulo">Nuevo Subtítulo:</label>
                <input type="text" class="form-control" id="nuevoSubtitulo" name="nuevoSubtitulo" value="<?php echo $row['subtitulo']; ?>">
            </div>
            <div class="form-group">
                <label for="nuevaDescripcion">Nueva Descripción:</label>
                <textarea class="form-control" id="nuevaDescripcion" name="nuevaDescripcion"><?php echo $row['descripcion']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="nuevoPrecio1">Nuevo Precio 1:</label>
                <input type="text" class="form-control" id="nuevoPrecio1" name="nuevoPrecio1" value="<?php echo $row['precio1']; ?>">
            </div>
            <div class="form-group">
                <label for="nuevoPrecio2">Nuevo Precio 2:</label>
                <input type="text" class="form-control" id="nuevoPrecio2" name="nuevoPrecio2" value="<?php echo $row['precio2']; ?>">
            </div>
            <div class="form-group">
                <label for="nuevoPrecio3">Nuevo Precio 3:</label>
                <input type="text" class="form-control" id="nuevoPrecio3" name="nuevoPrecio3" value="<?php echo $row['precio3']; ?>">
            </div>
            <div class="form-group">
                <label for="nuevaCategoria">Nueva Categoría:</label>
                <input type="text" class="form-control" id="nuevaCategoria" name="nuevaCategoria" value="<?php echo $row['categoria']; ?>">
            </div>

            <div class="form-group">
                <label for="nuevoEstatus">Nuevo Estatus:</label>
                <select class="form-control" id="nuevoEstatus" name="nuevoEstatus">
                    <option value="activo" <?php echo ($row['estatus'] == 'activo') ? 'selected' : ''; ?>>Activo</option>
                    <option value="agotado" <?php echo ($row['estatus'] == 'agotado') ? 'selected' : ''; ?>>Agotado</option>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
    



                    </div>
                </div>
                <br><br>
            </div>
        </div>
    </div>
    

    <!-- Enlaces a jQuery, Popper.js y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
