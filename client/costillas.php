<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/alitas.css">
    <title>Tienda de Costillas</title>
</head>
<body>

    <div class="productos-container">
        <?php
        // Configura la conexión a la base de datos (reemplaza los valores según tu configuración)
        include '../config/conexion.php';
        // Verifica la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consulta para seleccionar los datos de la tabla "menu" solo para la categoría 'Alitas'
// Consulta para seleccionar los datos de la tabla "menu" solo para la categoría 'Alitas' y con estatus diferente a 'agotado'
$categoria = "Costillas";
$sql = "SELECT id, titulo, subtitulo, descripcion, precio1, categoria, estatus, imagen FROM menu WHERE categoria = '$categoria' AND estatus <> 'agotado'";
$result = $conn->query($sql);


        // Verifica si hay resultados
        if ($result->num_rows > 0) {
            // Muestra los datos en cuadros
            while($row = $result->fetch_assoc()) {
                echo "<div class='producto'>";
                echo "<img src='" . $row['imagen'] . "' alt='" . $row['titulo'] . "'>";
                echo "<div class='producto-info'>";
                echo "<h3>" . $row['titulo'] . "</h3>";
                echo "<p>" . $row['subtitulo'] . "</p>";
                echo "<p>" . $row['descripcion'] . "</p>";
                echo "<p>Precio: $" . $row['precio1'] . "</p>";
                // Modificación en el botón "Comprar" para pasar descripción y precio como parámetros
                echo "<button onclick='abrirModal(\"" . $row['descripcion'] . "\", \"" . $row['subtitulo'] . "\", " . $row['precio1'] . ", \"" . $row['titulo'] . "\")'>Comprar</button>";
                echo "<button>Agregar al carrito</button>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>No hay resultados para la categoría 'Alitas'</p>";
        }

        // Cierra la conexión
        $conn->close();
        ?>
    </div>

    <script>
        // Función para abrir el modal y mostrar descripción y precio
        function abrirModal(descripcion, subtitulo, precio, titulo) {
    var modal = document.getElementById('modal');
    modal.style.display = 'block';

    // Mostrar la descripción, el subtitulo y el precio en el modal
    document.getElementById('modal-descripcion').innerText = "Descripción: " + descripcion;
    document.getElementById('modal-subtitulo').innerText = "Producto: " + subtitulo;
    document.getElementById('modal-precio').innerText = "Precio: " + precio;

    // Asegúrate de actualizar tanto el valor del campo "precio" como el de "totalAmount"
    document.getElementById('precio').value = precio;
    document.getElementsByName('totalAmount')[0].value = precio;

    document.getElementById('titulo').value = titulo; // Llenar el campo de título en el formulario
    document.getElementById('descripcion').value = descripcion; // Llenar el campo de descripción en el formulario
}


        // Función para cerrar el modal
        function cerrarModal() {
            var modal = document.getElementById('modal');
            modal.style.display = 'none';
        }

        // Función para realizar la compra
        function realizarCompra() {
            // Obtener los datos necesarios del modal
            var totalAmount = document.getElementById('modal-precio').innerText;
            var subtitulo = document.getElementById('modal-subtitulo').innerText;
            var descripcion = document.getElementById('modal-descripcion').innerText;

            // Asignar el total al campo totalAmount del formulario
            document.getElementsByName('totalAmount')[0].innerText = totalAmount;

            // Mostrar los datos en el formulario (opcional)
            alert('Subtítulo: ' + subtitulo + '\nDescripción: ' + descripcion + '\nTotal: ' + totalAmount);

            // Enviar el formulario
            document.forms[0].submit();
        }
    </script>

    <!-- Modal -->
    <div id="modal">
        <div id="modal-overlay">
            <div id="modal-content">
                <span id="modal-close" onclick="cerrarModal()">&times;</span>
                <h2 align="center">Formulario de Compra</h2>
                <p align="center">Recuerda que debes enviar una foto o el comprobante de pago para procesar tu pedido.</p>
                <br>

                <!-- Formulario de compra -->
<!-- Formulario de compra -->
<form action="procesar_compra.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="telefono">Teléfono:</label>
    <input type="tel" id="telefono" name="telefono" required>

    <label for="direccion">Dirección de Envío:</label>
    <input id="direccion" name="direccion" rows="4" required></input>

    <!-- Corrección: Cambia el id y el name de este campo a "precio" -->
    <input type="hidden" id="precio" name="precio" value="">

    <input type="hidden" id="totalAmount" name="totalAmount" value=""> <!-- Asegúrate de incluir este campo oculto -->

    <p id="modal-subtitulo"></p>
    <p id="modal-precio"></p>
    <p id="modal-descripcion"></p>

    <!-- Campo oculto para el total -->
    <p id="totalAmount" name="totalAmount" style="display: none;"></p>

    <!-- Botón de enviar -->
    <button type="button" onclick="realizarCompra()">Realizar Compra</button>
</form>

            </div>
        </div>
    </div>

</body>
</html>
