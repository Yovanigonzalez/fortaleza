<?php include 'menu.php' ?>


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
    </style>

    <title>Punto de Venta</title>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <br>
                <div class="container-fluid">
                    <div class="row">
                        <!-- Columna del Punto de Venta -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Punto de Venta</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Código del punto de venta -->
                                    <section>
                                        <h2>Productos</h2>
                                        <!-- Campo de búsqueda para productos de la tabla 'productos' -->
                                        <input type="text" id="searchProductos" class="form-control" onkeyup="searchProductos()" placeholder="Buscar productos...">
                                        <!-- Lista de productos de la tabla 'productos' (inicialmente oculta) -->
                                        <br>
                                        <ul id="productosList" style="display: none;">
                                            <?php
                                            if ($resultProductos->num_rows > 0) {
                                                while ($rowProductos = $resultProductos->fetch_assoc()) {
                                                    echo '<li class="producto-item">' . $rowProductos['descripcion'] . ' <button class="btn btn-sm btn-primary" onclick="agregarAlCarrito(' . $rowProductos['id'] . ', \'' . $rowProductos['descripcion'] . '\', ' . $rowProductos['precio'] . ', \'' . $rowProductos['cantidad'] . '\', \'' . $rowProductos['categoria'] . '\')">Agregar</button></li>';
                                                }
                                            } else {
                                                echo "No se encontraron productos en la tabla 'productos'.";
                                            }
                                            ?>
                                        </ul>
                                    </section>


                                </div>
                            </div>
                        </div>
                        <!-- Columna del Ticket de Compra -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Ticket de Compra</h3>
                                </div>

                                <div class="card-body">
                                    <!-- Contenido del ticket de compra -->
                                    <pre id="ticketContent"></pre>

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
