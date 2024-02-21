<?php
include '../config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

?>

<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Logo -->
    <link rel="shortcut icon" type="image/x-icon" href="../log/log.png">

    <style>
        /* Agrega un espacio de 1.5 unidades (por ejemplo, 1.5rem) entre los elementos de la lista */
        .producto-item {
            margin-bottom: 1.0rem;
        }

        /* Estilo para ajustar el tamaño de la imagen */
        .imagen-producto {
            max-width: 100px; /* Ajusta el ancho máximo según tus necesidades */
            max-height: 100px; /* Ajusta el alto máximo según tus necesidades */
        }
    </style>

    <title>Fortaleza | Crud</title>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Crud</h3>
                                </div>
                                <div class="card-body">

                                    <!-- Filtrar por Categoría -->
                                    <form method="post">
                                        <div class="form-group">
                                            <?php
                                            // Mostrar mensaje de éxito si está establecido
                                            if (isset($_SESSION['success_message'])) {
                                                echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
                                                unset($_SESSION['success_message']); // Limpiar el mensaje para evitar mostrarlo al recargar la página
                                            }

                                            // Mostrar mensaje de error si está establecido
                                            if (isset($_SESSION['error_message'])) {
                                                echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
                                                unset($_SESSION['error_message']); // Limpiar el mensaje para evitar mostrarlo al recargar la página
                                            }
                                            ?>

                                            <label for="categoryFilter">Filtrar por Categoría:</label>
                                            <select class="form-control" id="categoryFilter" name="categoryFilter">
                                                <option value="">Todas las categorías</option>
                                                <?php
                                                // Consulta para obtener las categorías desde la base de datos
                                                $categoriesQuery = "SELECT DISTINCT categoria FROM menu";
                                                $categoriesResult = $conn->query($categoriesQuery);

                                                // Mostrar las categorías en el dropdown
                                                while ($categoryRow = $categoriesResult->fetch_assoc()) {
                                                    echo '<option value="' . $categoryRow['categoria'] . '">' . $categoryRow['categoria'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Buscar</button>
                                    </form>

                                    <!-- Mostrar resultados filtrados -->
                                    <?php
                                    // Consulta a la base de datos con filtro por categoría
                                    $categoryFilter = isset($_POST['categoryFilter']) ? $_POST['categoryFilter'] : '';
                                    $query = "SELECT * FROM menu";

                                    // Aplicar filtro de categoría si está seleccionado
                                    if (!empty($categoryFilter)) {
                                        $query .= " WHERE categoria = '$categoryFilter'";
                                    }

                                    $result = $conn->query($query);

                                    if ($result->num_rows > 0) {
                                        // Mostrar la tabla con los datos de la base de datos
                                        echo '<div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Subtítulo</th>
                                                            <th>Descripción</th>
                                                            <th>Precio 1</th>
                                                            <th>Precio 2</th>
                                                            <th>Precio 3</th>
                                                            <th>Categoría</th>
                                                            <th>Estatus</th>
                                                            <th>Imagen</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>';

                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr>
                                                    <td>' . $row['subtitulo'] . '</td>
                                                    <td>' . $row['descripcion'] . '</td>
                                                    <td>' . $row['precio1'] . '</td>
                                                    <td>' . $row['precio2'] . '</td>
                                                    <td>' . $row['precio3'] . '</td>
                                                    <td>' . $row['categoria'] . '</td>
                                                    <td>' . $row['estatus'] . '</td>
                                                    <td><img class="imagen-producto" src="../view/' . $row['imagen'] . '" alt="Imagen"></td>
                                                    <td>
                                                        <a href="editar_menu.php?id=' . $row['id'] . '" class="btn btn-warning">Editar</a>
                                                        <a href="eliminar_menu.php?id=' . $row['id'] . '" class="btn btn-danger" onclick="return confirm(\'¿Estás seguro de que quieres eliminar este registro?\')">Eliminar</a>
                                                    </td>
                                                </tr>';
                                        }
                                        echo '</tbody></table></div>';
                                    } else {
                                        echo "No hay registros en la base de datos.";
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- Agrega el enlace a jQuery y a Bootstrap.js si no lo has hecho ya -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Agrega este script al final de tu página HTML, antes de cerrar el body -->
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
