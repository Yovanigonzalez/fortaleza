<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fortaleza | Agregar Menú</title>
    <link rel="shortcut icon" type="image/x-icon" href="../log/ico.png">
    <meta name="description" content="Descripción de tu sitio web">
    <meta name="keywords" content="fortaleza, sitio web, ejemplo">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-Z2mU9ZckH3vJ8J1l7Z5Mz5l1TZw4E1KecE2lSZ/Kz55Jz1k3T9I71bIAsj9gPzR5" crossorigin="anonymous">
<style>
    body{background-color: #f3f3f3;}
</style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container-fluid">
                <br>
                <div class="card">
                    <div class="card-body">
                        
                        <form action="procesar_menu.php" method="post" enctype="multipart/form-data">
                        <?php
                            // a_menu.php

                            if (isset($_GET['success']) && $_GET['success'] == 'true') {
                                echo '<div class="alert-success" style="color: #155724; background-color: #d4edda; border-color: #c3e6cb; padding: 10px; margin: 10px 0;">¡Éxito! Los datos se han insertado correctamente.</div>';
                            } elseif (isset($_GET['error'])) {
                                echo '<div class="alert-danger" style="color: #721c24; background-color: #f8d7da; border-color: #f5c6cb; padding: 10px; margin: 10px 0;">Error: ' . urldecode($_GET['error']) . '</div>';
                            }
                            ?>


                            <h4 class="text-center mb-4">Agregar Menú Pollo</h4>

                            <div class="form-group">
                                <label for="imagen">Imagen:</label>
                                <input type="file" class="form-control-file" id="imagen" name="imagen" accept="image/*">
                            </div>


                            <!-- ... (código existente) ... -->

                            <div class="form-group">
                                <label for="subtitulo">Titulo:</label>
                                <input type="text" class="form-control" id="subtitulo" name="subtitulo">
                            </div>


                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                            </div>


                            <div class="form-group">
                                <label for="precio1">Precio 1:</label>
                                <input type="number" class="form-control" id="precio1" name="precio1" step="0.01" placeholder="Ingrese el Precio 1">
                            </div>

                            <div class="form-group">
                                <label for="precio2">Precio 2:</label>
                                <input type="number" class="form-control" id="precio2" name="precio2" step="0.01" placeholder="Ingrese el Precio 2">
                            </div>

                            <div class="form-group">
                                <label for="precio3">Precio 3:</label>
                                <input type="number" class="form-control" id="precio3" name="precio3" step="0.01" placeholder="Ingrese el Precio 3">
                            </div>


                            <div class="form-group">
                                <label for="categoria">Categoría:</label>
                                <select class="form-control" id="categoria" name="categoria">
                                    <option value="Pollo">Pollo</option>
                                    <option value="Pollo Combos">Pollos Combos</option>
                                    <option value="Alitas">Alitas</option>
                                    <option value="Tenders">Tenders</option>
                                    <option value="Crepas">Crepas</option>
                                    <option value="Hamburgesas">Hamburgesas</option>
                                    <option value="Costillas">Costillas</option>
                                    <option value="Guarniciones">Guarniciones</option>
                                    <option value="Bebidas">Bebidas</option>
                                    <option value="Mixiotes">Mixiotes</option>



                                    <!-- Agrega más opciones según sea necesario -->
                                </select>
                            </div>


                            <!-- ... (existing form elements) ... -->

<div class="form-group">
    <label for="estatus">Estatus:</label>
    <select class="form-control" id="estatus" name="estatus">
        <option value="activo">Activo</option>
        <option value="agotado">Agotado</option>
    </select>
</div>

<!-- ... (existing form elements) ... -->


                            <!-- ... (código existente) ... -->


                            <div class="text-center">
                                <button type="submit" class="btn btn-success" style="background-color: #2196F3; border-color: #2196F3;">Guardar</button>
                            </div>
</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<br>

                <!-- Enlaces a jQuery, Popper.js y Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>



