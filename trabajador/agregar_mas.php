<?php include 'menu.php'; ?>

<?php
include '../config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}



// Consulta SQL para obtener todos los productos de la tabla 'productos'
$sqlProductos = "SELECT id, cantidad, descripcion, precio, categoria FROM producto";
$resultProductos = $conn->query($sqlProductos);



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

                        <!-- Columna del Punto de Venta -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Mesa</h3>
                                </div>

                                <!-- Agregar el contenido de agregar_mas.php aquí -->
                                <div class="card-body">
                                    <?php
                                    include '../config/conexion.php';

                                    // Verificar si se envían datos mediante el método POST
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        // Recuperar datos del formulario POST
                                        $id = $_POST['id'];
                                        $numero_folio = $_POST['numero_folio'];
                                        $descripcion = $_POST['descripcion'];
                                        $total = $_POST['total'];
                                        $fecha_hora = $_POST['fecha_hora'];
                                        $mesa = $_POST['mesa'];
                                    ?>
                                    <div class="container">
                                        <h2>Información del Pedido</h2>
                                        <p>Mesa: <?php echo $mesa; ?></p>
                                        <p>Pedido: <?php echo $descripcion; ?></p>
                                        <p>Total: <?php echo $total; ?></p>
                                        <!-- Se puede agregar contenido HTML adicional o acciones aquí -->
                                    </div>
                                    <?php
                                        // Tu código aquí para procesar los datos o realizar acciones adicionales

                                        // Cerrar la conexión a la base de datos después de usarla
                                        $conn->close();
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <!-- Nueva Columna con Motor de Búsqueda -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Buscar</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Simple form for search -->
  
                                    <section>

                                        <h4>Buscar Productos</h4>
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

                                    <section>
                                        <h4>Carrito de Compra</h4>

                                        <!-- Mostrar productos agregados al carrito -->
                                        <ul id="carrito">
                                            <!-- Los elementos del carrito se agregarán aquí dinámicamente -->
                                        </ul>
                                        <p>Total: $<span id="total">0</span></p>

                                        <br>
                                        <!-- Botón para realizar el pago e imprimir el ticket -->
                                        <button class="btn btn-primary" onclick="ventas()">Solo registrar venta</button>

                                    </section>
                                    <!-- Fin del código del punto de venta -->


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
              function searchProductos() {
            var input = document.getElementById("searchProductos");
            var ul = document.getElementById("productosList");
            var lis = ul.getElementsByTagName("li");

            // Oculta la lista si el campo de búsqueda está vacío
            if (input.value.trim() === "") {
                ul.style.display = "none";
                return;
            }

            // Obtiene el texto ingresado en el campo de búsqueda
            var searchTerm = input.value.trim().toLowerCase();

            // Recorre los elementos de la lista y muestra/oculta según la búsqueda
            for (var i = 0; i < lis.length; i++) {
                var li = lis[i];
                var productoText = li.textContent || li.innerText;

                // Compara el texto del producto con el término de búsqueda
                if (productoText.toLowerCase().indexOf(searchTerm) > -1) {
                    li.style.display = "block"; // Muestra el elemento si coincide
                } else {
                    li.style.display = "none"; // Oculta el elemento si no coincide
                }
            }

            // Muestra la lista (aunque estén ocultos algunos elementos)
            ul.style.display = "block";
        }

    </script>
</body>
</html>
