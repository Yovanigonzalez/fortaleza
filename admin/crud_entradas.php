<?php
include '../config/conexion.php';

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

    <title>Fortaleza | CRUD</title>
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
                                    <h3 class="card-title">CRUD</h3>
                                </div>
                                <div class="card-body">

                                    <!-- Filtrar por Categoría -->
                                    <form method="post">
                                        <div class="form-group">
                                            <?php
                                            if (isset($_SESSION['success_message'])) {
                                                echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
                                                unset($_SESSION['success_message']);
                                            }

                                            if (isset($_SESSION['error_message'])) {
                                                echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
                                                unset($_SESSION['error_message']);
                                            }
                                            ?>

                                            <label for="categoryFilter">Filtrar por Categoría:</label>
                                            <select class="form-control" id="categoryFilter" name="categoryFilter">
                                                <option value="">Todas las categorías</option>
                                                <?php
                                                $categoriesQuery = "SELECT DISTINCT categoria FROM entradas";
                                                $categoriesResult = $conn->query($categoriesQuery);

                                                while ($categoryRow = $categoriesResult->fetch_assoc()) {
                                                    echo '<option value="' . $categoryRow['categoria'] . '">' . $categoryRow['categoria'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Buscar</button>
                                    </form>

                                    <br>
                                    <!-- Mostrar resultados filtrados -->
                                    <?php
                                    $categoryFilter = isset($_POST['categoryFilter']) ? $_POST['categoryFilter'] : '';
                                    $query = "SELECT * FROM entradas";

                                    if (!empty($categoryFilter)) {
                                        $query .= " WHERE categoria = '$categoryFilter'";
                                    }

                                    $result = $conn->query($query);

                                    if ($result->num_rows > 0) {
                                        echo '<div class="table-responsive">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Categoría</th>
                                                            <th>Producto</th>
                                                            <th>Stock</th>
                                                            <th>Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>';

                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr>
                                                    <td>' . $row['id'] . '</td>
                                                    <td>' . $row['categoria'] . '</td>
                                                    <td>' . $row['producto'] . '</td>
                                                    <td>' . $row['stock'] . '</td>
                                                    <td>
                                                        <a href="editar_entradas.php?id=' . $row['id'] . '" class="btn btn-warning">Editar</a>
                                                        <!-- <a href="eliminar_entradas.php?id=' . $row['id'] . '" class="btn btn-danger" onclick="return confirm(\'¿Estás seguro de que quieres eliminar este registro?\')">Eliminar</a>-->
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

    <!-- Agregar el enlace a jQuery y a Bootstrap.js si no lo has hecho ya -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Agregar este script al final de tu página HTML, antes de cerrar el body -->
</body>

</html>

<?php
$conn->close();
?>
