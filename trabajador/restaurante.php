<?php include 'menu.php' ?>

<?php
include '../config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener el último número de folio utilizado
$sqlUltimoFolio = "SELECT MAX(numero_folio) AS ultimoFolio FROM ventas";
$resultUltimoFolio = $conn->query($sqlUltimoFolio);

if ($resultUltimoFolio->num_rows > 0) {
    $rowUltimoFolio = $resultUltimoFolio->fetch_assoc();
    $ultimoFolio = $rowUltimoFolio['ultimoFolio'];
    // Incrementar el número de folio para la próxima venta
    $numeroFolio = $ultimoFolio + 1;
} else {
    // Si no hay ventas anteriores, comenzar desde el folio 1
    $numeroFolio = 1;
}

// Consulta SQL para obtener todos los productos de la tabla 'productos'
$sqlProductos = "SELECT id, cantidad, descripcion, precio, categoria FROM producto";
$resultProductos = $conn->query($sqlProductos);

// Consulta SQL para obtener las mesas desocupadas de la tabla 'mesa'
$sqlMesas = "SELECT id, numero_mesa FROM mesa WHERE estatus = 'desocupada'";
$resultMesas = $conn->query($sqlMesas);


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Fortaleza | Restaurante</title>

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
                                    <h3 class="card-title">Restaurante</h3>
                                </div>
                                <div class="card-body">
                                    <!-- Código del punto de venta -->
                                    <section>
                                        <!-- Número de folio -->
                                        <span id="folioNumber"><h6>Número de venta: <?php echo $numeroFolio; ?></h6></span>

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


                                    <br>
                                    <section>
                                        <h4>Carrito de Compra</h4>

                                        <!-- Mostrar productos agregados al carrito -->
                                        <ul id="carrito">
                                            <!-- Los elementos del carrito se agregarán aquí dinámicamente -->
                                        </ul>
                                        <p>Total: $<span id="total">0</span></p>

                                        <!-- Nuevo campo para 'Mesa' -->
                                        <!-- Nuevo campo para seleccionar 'Mesa' -->
                                        <label for="mesa">Seleccionar Mesa:</label>
                                        <select id="mesa" name="mesa" class="form-control">
                                            <?php
                                            if ($resultMesas->num_rows > 0) {
                                                while ($rowMesa = $resultMesas->fetch_assoc()) {
                                                    echo '<option value="' . $rowMesa['id'] . '">' . $rowMesa['numero_mesa'] . '</option>';
                                                }
                                            } else {
                                                echo '<option value="" disabled>No hay mesas disponibles</option>';
                                            }
                                            ?>
                                        </select>

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
    
    <!-- Agrega el enlace a jQuery y a Bootstrap.js si no lo has hecho ya -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Agrega este script al final de tu página HTML, antes de cerrar el body -->
<script>
    // Función para obtener la descripción de la venta a partir de los elementos del carrito
    function obtenerDescripcionVenta() {
        var carritoItems = document.getElementById('carrito').getElementsByTagName('li');
        var descripcionVenta = "";

        // Recorrer los elementos del carrito y agregar sus descripciones a la descripción de la venta
        for (var i = 0; i < carritoItems.length; i++) {
            var itemText = carritoItems[i].textContent;
            var descripcionProducto = itemText.split(' - Precio: ')[0];
            descripcionVenta += descripcionProducto + ', ';
        }

        // Eliminar la coma y el espacio extra al final
        if (descripcionVenta.length > 2) {
            descripcionVenta = descripcionVenta.slice(0, -2);
        }

        return descripcionVenta;
    }

    // Función para obtener el total de la venta a partir de los elementos del carrito
    function obtenerTotalVenta() {
        var total = parseFloat(document.getElementById('total').textContent);
        return total;
    }

    function ventas() {
    // Obtener información relevante
    var descripcion = obtenerDescripcionVenta();
    var total = obtenerTotalVenta();
    var fechaHora = obtenerFechaHoraActual();
    var numeroFolio = obtenerNumeroFolio(); // Nueva función para obtener el número de folio

    // Obtener la mesa seleccionada
    var mesaSeleccionada = document.getElementById('mesa').value;

    // Obtener precios individuales de productos del carrito
    var preciosProductos = obtenerPreciosProductos();

    // Realizar una solicitud AJAX para guardar los datos de ventas en la base de datos
    $.ajax({
        url: 'v.php', // Asegúrate de que esta sea la ruta correcta a tu script PHP
        method: 'POST',
        data: {
            descripcion: descripcion,
            total: total,
            fechaHora: fechaHora,
            numeroFolio: numeroFolio, // Agregar el número de folio a los datos
            mesa: mesaSeleccionada, // Agregar la mesa seleccionada a los datos
            preciosProductos: preciosProductos  // Agregar los precios de los productos
        },
        success: function(response) {
            // Los datos de ventas se han registrado con éxito
            alert('Registrado con éxito: ' + response); // Puedes mostrar un mensaje de éxito o redirigir a otra página
        },
        error: function(xhr, status, error) {
            // Hubo un error al registrar los datos de ventas
            alert('Error al registrar: ' + error); // Mostrar el mensaje de error
        }
    });
}

function obtenerPreciosProductos() {
    var precios = [];
    var carritoItems = document.getElementById('carrito').getElementsByTagName('li');

    for (var i = 0; i < carritoItems.length; i++) {
        var itemText = carritoItems[i].textContent;
        var precio = parseFloat(itemText.split(' - Precio: $')[1]);
        precios.push(precio);
    }

    return precios;
}



// Nueva función para obtener el número de folio
function obtenerNumeroFolio() {
    // Puedes obtener el número de folio de algún elemento en tu página HTML
    // o calcularlo de acuerdo a tu lógica específica
    return <?php echo $numeroFolio; ?>; // Aquí obtienes el número de folio PHP y lo insertas en el script JavaScript
}

</script>


    <script>
    function registrarVenta() {
        // Obtener información relevante
        var descripcion = obtenerDescripcionVenta(); // Debes implementar esta función
        var total = parseFloat(document.getElementById('total').textContent);
        var fechaHora = obtenerFechaHoraActual(); // Debes implementar esta función

        // Realizar una solicitud AJAX para registrar la venta
        $.ajax({
            url: 'guardar_venta.php',
            method: 'POST',
            data: {
                descripcion: descripcion,
                total: total,
                fechaHora: fechaHora
            },
            success: function(response) {
                // La venta se ha registrado con éxito
                alert(response); // Puedes mostrar un mensaje de éxito o redirigir a otra página
            },
            error: function(error) {
                // Hubo un error al registrar la venta
                alert('Error al registrar la venta: ' + error);
            }
        });
    }

    function obtenerDescripcionVenta() {
        var carritoItems = document.getElementById('carrito').getElementsByTagName('li');
        var descripcionVenta = "";

        // Recorrer los elementos del carrito y agregar sus descripciones a la descripción de la venta
        for (var i = 0; i < carritoItems.length; i++) {
            var itemText = carritoItems[i].textContent;
            var descripcionProducto = itemText.split(' - Precio: ')[0];
            descripcionVenta += descripcionProducto + ', ';
        }

        // Eliminar la coma y el espacio extra al final
        if (descripcionVenta.length > 2) {
            descripcionVenta = descripcionVenta.slice(0, -2);
        }

        return descripcionVenta;
    }


    // Función para obtener la fecha y hora actual (debes implementarla)
    function obtenerFechaHoraActual() {
        var fechaHora = new Date();
        return fechaHora.toISOString(); // Devuelve la fecha y hora en formato ISO
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


function agregarAlCarrito(id, descripcion, precio, cantidad, categoria) {
    console.log('Ejecutando agregarAlCarrito');
    console.log('ID:', id);
    console.log('Descripción:', descripcion);
    console.log('Precio:', precio);
    console.log('Cantidad:', cantidad);
    console.log('Categoría:', categoria);

    // Realiza la actualización del stock en la base de datos
    actualizarStockEnBaseDeDatos(categoria, cantidad)
        .then(() => {
            // El stock se ha actualizado correctamente en la base de datos.
            console.log('Stock actualizado correctamente en la base de datos.');

            // Crea un nuevo elemento de lista para el carrito
            var carrito = document.getElementById('carrito');
            var nuevoItem = document.createElement('li');
            nuevoItem.textContent = descripcion + ' - Precio: $' + precio;

            // Calcula el total y actualiza la cantidad
            var totalElement = document.getElementById('total');
            var total = parseFloat(totalElement.textContent) + precio;
            totalElement.textContent = total.toFixed(2);

            // Agrega el elemento al carrito
            carrito.appendChild(nuevoItem);

            // Limpia el campo de búsqueda
            document.getElementById('searchProductos').value = '';

            // Oculta la lista de resultados
            var ul = document.getElementById('productosList');
            ul.style.display = 'none';
        })
        .catch((error) => {
            // Hubo un error al actualizar el stock en la base de datos.
            // Puedes manejar el error aquí.
            console.error('Error al actualizar el stock en la base de datos: ' + error.message);
        });
}


        function actualizarStockEnBaseDeDatos(categoria, cantidad) {
            return new Promise((resolve, reject) => {
                // Realiza una llamada AJAX o una solicitud HTTP a tu servidor
                // para actualizar el stock en la base de datos.

                // Por ejemplo, puedes usar jQuery para realizar una solicitud POST.
                $.ajax({
                    url: 'actualizar_stock.php', // URL de tu script PHP para actualizar el stock
                    method: 'POST',
                    data: {
                        categoria: categoria,
                        cantidad: cantidad
                    },
                    success: function (response) {
                        // El stock se ha actualizado correctamente en la base de datos.
                        resolve(response);
                    },
                    error: function (error) {
                        // Hubo un error al actualizar el stock en la base de datos.
                        reject(error);
                    }
                });
            });
        }


// Cerrar la conexión a la base de datos
<?php $conn->close(); ?>
    </script>
</body>
</html>