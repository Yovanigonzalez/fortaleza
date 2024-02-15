<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Mesa</title>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Barra de navegación y sidebar aquí -->
        <!-- Contenido principal -->
        <div class="content-wrapper">
            <section class="content">
                <br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Agregar Mesas</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="guardar_mesa.php">
                                        <!-- Mensaje de éxito y error -->
                                        <?php
                                            if (isset($_GET['success']) && $_GET['success'] === 'true') {
                                                echo '<div class="alert alert-success" role="alert">Los datos se han guardado correctamente.</div>';
                                            } elseif (isset($_GET['success']) && $_GET['success'] === 'false') {
                                                echo '<div class="alert alert-danger" role="alert">Error al guardar los datos: ' . htmlspecialchars($_GET['error_message']) . '</div>';
                                            }
                                        ?>

                                        <div class="form-group">
                                            <label for="numero_mesa">Número de Mesa</label>
                                            <input type="number" class="form-control" id="numero_mesa" name="numero_mesa" placeholder="Ingrese el número de mesa" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="estatus">Estatus</label>
                                            <select class="form-control" id="estatus" name="estatus" required>
                                                <option value="desocupada">Desocupada</option>
                                                <option value="ocupada">Ocupada</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
