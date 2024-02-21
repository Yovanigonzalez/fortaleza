<?php include 'menu.php' ?>

<?php
include '../config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener datos de la tabla 'ventas'
$sql = "SELECT * FROM ventas WHERE mesa <> 0";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Punto de Venta</title>
    <link rel="shortcut icon" type="image/x-icon" href="../log/log.png">

    <style>
        .producto-item {
            margin-bottom: 1.0rem;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <br>
                <div class="container-fluid">
                    <div class="row">

                        <?php
                        // Iterar sobre los resultados de la consulta
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            $numero_folio = $row['numero_folio'];
                            $descripcion = $row['descripcion'];
                            $total = $row['total'];
                            $fecha_hora = $row['fecha_hora'];
                            $mesa = $row['mesa'];
                            $precios_productos = $row['precios_productos']; // Asegúrate de que el nombre de la columna sea correcto

                        ?>
                        <!-- Columna del Punto de Venta -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Mesa <?php echo $mesa; ?></h3>
                                </div>
                                <div class="card-body">
                                    <!-- Código del punto de venta -->
                                    <p>Numero de venta: <?php echo $numero_folio; ?></p>
                                    <p>Descripción: <?php echo $descripcion; ?></p>
                                                                           <!-- Decodificar y mostrar los precios de productos -->
                                                                           <?php
                                            $precios_array = json_decode($precios_productos);
                                            if ($precios_array !== null) {
                                                echo "<p>Precios de productos: " . implode(", ", $precios_array) . "</p>";
                                            } else {
                                                echo "<p>Error al decodificar los precios de productos.</p>";
                                            }
                                        ?>
                                    <p>Total: <?php echo $total; ?></p>
                                </div>
                                <div class="card-footer">
                                    <!-- Botón "Agregar Más" -->
                                    <!-- Botón "Agregar Más" -->
                                    <form action="cobrar.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="numero_folio" value="<?php echo $numero_folio; ?>">
                                        <input type="hidden" name="descripcion" value="<?php echo $descripcion; ?>">
                                        <input type="hidden" name="total" value="<?php echo $total; ?>">
                                        <input type="hidden" name="fecha_hora" value="<?php echo $fecha_hora; ?>">
                                        <input type="hidden" name="mesa" value="<?php echo $mesa; ?>">
                                           <!-- Agrega los precios como un campo oculto -->
                                        <input type="hidden" name="precios_productos" value="<?php echo htmlspecialchars($precios_productos); ?>">
                                        <button type="submit" class="btn btn-primary">Cobrar Mesa</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Cerrar la conexión después de usarla
$conn->close();
?>
