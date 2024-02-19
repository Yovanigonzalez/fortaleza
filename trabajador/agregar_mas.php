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

                                    // Recuperar precios de productos del formulario POST
                                    $precios_productos = array();
                                    for ($i = 0; isset($_POST['precio_producto_' . $i]); $i++) {
                                        $precio = $_POST['precio_producto_' . $i];
                                        $precios_productos[] = $precio;
                                    }
                                    // Convertir el array de precios a formato JSON
                                    $precios_json = json_encode($precios_productos);
                                ?>

                                <div class="container">
                                    <h6 align="center">Información del Pedido</h6>
                                    <br>
                                    <p>Mesa: <?php echo $mesa; ?></p>
                                    <p>Pedido: <?php echo $descripcion; ?></p>
                                    <p>Precios de Productos: <?php echo implode(", ", $precios_productos); ?></p>
                                    <p>Total: <?php echo $total; ?></p>
                                </div>

                                <?php
                                    $conn->close();
                                }
                                ?>


                                    <!-- Add "Agregar mas comida" button -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarMasModal">
                                        Agregar mas comida
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="agregarMasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Agregar mas comida</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Real-time search input -->

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
                                        <br>
                                        <!-- Agrega esto donde desees mostrar el contenido del carrito -->
                                        <h6 align="center">Carrito</h6>
                                        <div id="carrito-container"></div>

                                        <br>

                                        <br>

                                        <!-- Campo para mostrar la suma total pero no editable con estilos de Bootstrap -->
                                        <div class="form-group">
                                            <label for="sumaTotal" class="h6">Subtotal:</label>
                                            <input type="text" class="form-control" id="sumaTotal" readonly>
                                        </div>

                                        <!-- Mostrar el total nuevamente en el modal -->
                                        <div class="form-group">
                                            <label for="sumaTotalModal" class="h6">Total anterior:</label>
                                            <input type="text" class="form-control" id="sumaTotalModal" value="<?php echo $total; ?>" readonly>
                                        </div>

                                        <!-- Nuevo campo para mostrar el nuevo total -->
                                        <div class="form-group">
                                            <label for="nuevoTotal" class="h6">Nuevo Total:</label>
                                            <input type="text" class="form-control" id="nuevoTotal" readonly>
                                        </div>



                                                    <!-- Display search results here -->
                                                    <div id="searchResults"></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <!-- Botón "Agregar Nueva Orden" -->
                                                    <button type="button" class="btn btn-success" onclick="agregarNuevaOrden()">Agregar Nueva Orden</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    var carrito = []; // Variable global para almacenar productos en el carrito

    function agregarAlCarrito(id, descripcion, precio, cantidad, categoria) {
        var producto = {
            id: id,
            descripcion: descripcion,
            precio: precio,
            cantidad: cantidad,
            categoria: categoria
        };

        carrito.push(producto);
        actualizarInterfazCarrito(); // Llama a la función para actualizar la interfaz del carrito
        console.log("Producto agregado al carrito:", producto);

        // Limpia el campo de búsqueda
        document.getElementById("searchProductos").value = "";

        // Oculta la lista de productos
        document.getElementById("productosList").style.display = "none";
    }
</script>


<script>
    
function agregarNuevaOrden() {
    // Obtener el valor del campo de entrada 'Nuevo Total'
    var nuevoTotal = document.getElementById("nuevoTotal").value;

    // Obtener la descripción de productos del carrito y los precios de productos del carrito como antes
    var descripcionProductos = carrito.map(function(producto) {
        return producto.descripcion;
    }).join(', ');

    var precios_productos = carrito.map(function(producto) {
        return producto.precio;
    });

    // Realizar la solicitud AJAX con el dato adicional 'nuevoTotal'
    $.ajax({
        type: 'POST',
        url: 'guardar_orden.php', // Reemplaza con la ruta correcta a tu script PHP
        data: {
            id: <?php echo $id; ?>,
            numero_folio: <?php echo $numero_folio; ?>,
            descripcion: descripcionProductos,
            fecha_hora: '<?php echo $fecha_hora; ?>',
            mesa: <?php echo $mesa; ?>,
            precios_productos: precios_productos,
            nuevoTotal: nuevoTotal  // Incluye nuevoTotal en la carga de datos
        },
        success: function(response) {
            alert(response); // Muestra un mensaje de éxito o error
            // Puedes realizar más acciones aquí después de actualizar la orden
        },
        error: function(error) {
            console.error('Error al actualizar la orden:', error);
        }
    });
}

</script>




<!-- Actualización de la función actualizarInterfazCarrito() -->
<script>
function actualizarInterfazCarrito() {
    var carritoContainer = document.getElementById("carrito-container");
    carritoContainer.innerHTML = ""; // Limpia el contenido actual del contenedor del carrito

    var totalCarrito = 0; // Inicializa la suma total

    // Recorre el carrito y agrega cada producto al contenedor
    carrito.forEach(function (producto) {
        totalCarrito += producto.precio; // Suma el precio del producto al total

        var productoHTML = document.createElement("div");
        productoHTML.innerHTML = `<p>${producto.descripcion} - ${producto.cantidad} x $${producto.precio.toFixed(2)}</p>`;
        carritoContainer.appendChild(productoHTML);
    });

    // Muestra la nueva suma total en el elemento con id "sumaTotal"
    var sumaTotalElemento = document.getElementById("sumaTotal");
    sumaTotalElemento.value = totalCarrito.toFixed(2); // Asigna el valor al campo de texto

    // Obtiene el total anterior del elemento con id "sumaTotalModal"
    var totalAnterior = parseFloat(document.getElementById("sumaTotalModal").value);

    // Calcula el nuevo total sumando el total anterior y la nueva suma del carrito
    var nuevoTotal = totalAnterior + totalCarrito;

    // Muestra el nuevo total en el campo de texto con id "nuevoTotal"
    var nuevoTotalElemento = document.getElementById("nuevoTotal");
    nuevoTotalElemento.value = nuevoTotal.toFixed(2);
}

</script>


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
<script>
    // JavaScript for real-time search
    $(document).ready(function () {
        $('#realTimeSearch').on('input', function () {
            var searchQuery = $(this).val();
            // Perform AJAX search and update #searchResults
            // You'll need to implement this part based on your backend logic
            // Example: $.ajax({ url: 'search.php', data: { query: searchQuery }, success: function(data) { $('#searchResults').html(data); } });
        });
    });
</script>
</body>
</html>
