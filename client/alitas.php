<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/alitas.css">
    <title>Tienda de Mixiotes</title>
</head>
<body>

    <div class="productos-container">
        <?php
        include '../config/conexion.php';

        $categoria = "Alitas";
        $sql = "SELECT id, titulo, subtitulo, descripcion, precio1, categoria, estatus, imagen FROM menu WHERE categoria = '$categoria' AND estatus <> 'agotado'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='producto'>";
                echo "<img src='" . $row['imagen'] . "' alt='" . $row['titulo'] . "'>";
                echo "<div class='producto-info'>";
                echo "<h3>" . $row['titulo'] . "</h3>";
                echo "<p>" . $row['subtitulo'] . "</p>";
                echo "<p>" . $row['descripcion'] . "</p>";
                echo "<p>Precio: $" . $row['precio1'] . "</p>";
                echo "<button onclick='abrirModal(\"" . $row['descripcion'] . "\", \"" . $row['subtitulo'] . "\", " . $row['precio1'] . ", \"" . $row['titulo'] . "\", " . $row['id'] . ")'>Comprar</button>";
                echo "<button onclick='agregarAlCarrito(" . $row['id'] . ", \"" . $row['titulo'] . "\", " . $row['precio1'] . ", \"" . $row['descripcion'] . "\", \"" . $row['subtitulo'] . "\")'>Agregar al carrito</button>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>No hay resultados para la categoría 'Mixiotes'</p>";
        }

        $conn->close();
        ?>
    </div>

    <script>
        function abrirModal(descripcion, subtitulo, precio, titulo, id) {
            var modal = document.getElementById('modal');
            modal.style.display = 'block';

            document.getElementById('modal-descripcion').innerText = "Descripción: " + descripcion;
            document.getElementById('modal-subtitulo').innerText = "Producto: " + subtitulo;
            document.getElementById('modal-precio').innerText = "Precio: " + precio;

            document.getElementById('precio').value = precio;
            document.getElementsByName('totalAmount')[0].value = precio;

            document.getElementById('titulo').value = titulo;
            document.getElementById('descripcion').value = descripcion;
            document.getElementById('producto-id').value = id;
        }

        function agregarAlCarrito(id, titulo, precio, descripcion, subtitulo) {
            var params = 'action=agregar&id=' + encodeURIComponent(id) + '&titulo=' + encodeURIComponent(titulo) + '&precio=' + encodeURIComponent(precio) + '&descripcion=' + encodeURIComponent(descripcion) + '&subtitulo=' + encodeURIComponent(subtitulo);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'carrito.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    console.log(xhr.responseText);
                    alert('¡Éxito! Fue agregado a su carrito.');
                }
            };

            xhr.send(params);
        }

        function cerrarModal() {
            var modal = document.getElementById('modal');
            modal.style.display = 'none';
        }

        function realizarCompra() {
            var totalAmount = document.getElementById('modal-precio').innerText;
            var subtitulo = document.getElementById('modal-subtitulo').innerText;
            var descripcion = document.getElementById('modal-descripcion').innerText;

            document.getElementsByName('totalAmount')[0].innerText = totalAmount;

            alert('Subtítulo: ' + subtitulo + '\nDescripción: ' + descripcion + '\nTotal: ' + totalAmount);

            document.forms[0].submit();
        }
    </script>

    <div id="modal">
        <div id="modal-overlay">
            <div id="modal-content">
                <span id="modal-close" onclick="cerrarModal()">&times;</span>
                <h2 align="center">Formulario de Compra</h2>
                <p align="center">Recuerda que debes enviar una foto o el comprobante de pago para procesar tu pedido.</p>
                <br>

                <form action="procesar_compra.php" method="post">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>

                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" required>

                    <label for="direccion">Dirección de Envío:</label>
                    <input id="direccion" name="direccion" rows="4" required></input>

                    <input type="hidden" id="precio" name="precio" value="">
                    <input type="hidden" id="totalAmount" name="totalAmount" value="">
                    <input type="hidden" id="producto-id" name="producto_id" value="">

                    <p id="modal-subtitulo"></p>
                    <p id="modal-precio"></p>
                    <p id="modal-descripcion"></p>

                    <button type="button" onclick="realizarCompra()">Realizar Compra</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
