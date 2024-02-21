<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/exito.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Inventario</title>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php // Puedes incluir otras partes necesarias de tu estructura de página aquí, por ejemplo, el encabezado y la barra lateral ?>

        <div class="content-wrapper">
            <section class="content">
                <br>
                <div class="container-fluid">
                    <div class="row">
                        <!-- Columna del Ticket de Compra -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Inventario</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Formulario de Registro de Gastos con estilos de Bootstrap -->
                                    <form action="procesar_gasto.php" method="post">
                                        <div class="form-group">
                                            <label for="descripcion">Descripción:</label>
                                            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="monto">Monto:</label>
                                            <input type="number" class="form-control" id="monto" name="monto" step="0.01" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="fecha">Fecha:</label>
                                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Registrar Gasto</button>
                                    </form>
                                    <!-- Fin del Formulario de Registro de Gastos con estilos de Bootstrap -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Agrega Bootstrap JavaScript y archivos Popper.js aquí si es necesario -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
