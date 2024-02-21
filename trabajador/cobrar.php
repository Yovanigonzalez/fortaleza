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
                                        <h6 align="center">Información del Pedido</h6>
                                        <p id="mesa">Mesa: <?php echo $mesa; ?></p>
                                        <p id="folio">Venta:<?php echo $numero_folio; ?></p>
                                        <p id="pedido"><?php echo $descripcion; ?></p>
                                        <p id="total">Total: $ <?php echo $total; ?></p>
                                        <!-- Agrega el botón "Imprimir" aquí -->
                                        <?php
                                        // Verificar si se enviaron precios de productos
                                        if (isset($_POST['precios_productos'])) {
                                            $precios_productos = json_decode($_POST['precios_productos']);
                                            if ($precios_productos !== null) {
                                                echo "<p id='precios_productos' style='display: none;'>" . implode(", ", $precios_productos) . "</p>";
                                                // Agregamos un elemento oculto con los precios de productos para que se pueda acceder en el script de impresión
                                            } else {
                                                echo "<p>Error al decodificar los precios de productos.</p>";
                                            }
                                        }
                                        ?>
                                        <button type="button" class="btn btn-primary" onclick="imprimirPedido()">Imprimir</button>

                                    </div>
                                    <?php
                                        $conn->close();
                                    }
                                    ?>
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
function imprimirPedido() {
    // Obtener la fecha y hora actual
    var fechaHora = new Date();
    var fechaHoraFormato = fechaHora.toLocaleString();

    // Obtener el contenido del pedido
    var descripcion = document.getElementById('pedido').innerHTML;
    var total = document.getElementById('total').innerHTML;

    // Obtener los precios de productos
    var preciosProductos = document.getElementById('precios_productos').innerHTML;
    var preciosArray = preciosProductos.split(','); // Convertir la cadena de precios a un array

    // Dividir la descripción por comas y crear una fila para cada elemento
    var productos = descripcion.split(',');

    // Crear una ventana emergente para imprimir el contenido del pedido con fecha y hora
    var popupWin = window.open('', '_blank', 'width=600,height=600');
    popupWin.document.open();
    popupWin.document.write('<html><head><title>Información del Pedido</title>');

    // Estilos de la ventana de impresión
    popupWin.document.write('<style>');
    popupWin.document.write('body { font-family: Arial, sans-serif; font-size: 14px; color: #000; }');
    popupWin.document.write('table { width: 100%; border-collapse: collapse; margin-top: 10px; }');
    popupWin.document.write('th, td { border: 1px solid #dddddd; text-align: left; padding: 4px; font-size: 14px; font-family: Arial, sans-serif; }');
    popupWin.document.write('th { background-color: #f2f2f2; }');
    popupWin.document.write('ul { list-style-type: none; padding: 0; margin: 0; }');
    popupWin.document.write('li { margin-bottom: 2px; font-size: 14px; }');
    popupWin.document.write('h6 { font-size: 14px; }');
    popupWin.document.write('img { display: block; margin: 0 auto; width: 180px; height: auto; margin-top: 10px; }');
    popupWin.document.write('</style>');

    popupWin.document.write('</head><body>');

    // Agregar el encabezado con la imagen y la información adicional
    popupWin.document.write('<div>');
    popupWin.document.write('<img src="../ico/logo.png" alt="Logo" />');
    popupWin.document.write('<p><strong>Ubicanos en:</strong> Calle Dr Manuel Pereyra Mejía 433, Ignacio Zaragoza, 75770 Tehuacán, Pue</p>');
    popupWin.document.write('<p align="center"><strong>Teléfono:</strong> 238 127 4286</p>');
    popupWin.document.write('<p align="center"><strong>WhatsApp:</strong> 238 289 7997</p>');
    popupWin.document.write('<p align="center"><strong>Número de venta:</strong> ' + document.getElementById('folio').textContent + '</p>');
    popupWin.document.write('<p align="center"><strong>Mesa:</strong> ' + document.getElementById('mesa').textContent + '</p>');
    popupWin.document.write('<p align="center"><strong>Fecha:</strong> <br> ' + fechaHoraFormato + '</p>');
    popupWin.document.write('<br>');
    popupWin.document.write('</div>');
    popupWin.document.write('<p align="center"><strong>Detalles de su compra:</strong></p>');

    // Crear una tabla responsiva para organizar la información
    popupWin.document.write('<div style="overflow-x:auto;">');
    popupWin.document.write('<table>');

    // Fila de encabezados de columna
    popupWin.document.write('<tr>');
    popupWin.document.write('<th>Descripción</th>');
    popupWin.document.write('<th>Precio</th>');
    popupWin.document.write('</tr>');

    // Iterar sobre productos y precios para agregar filas a la tabla
    for (var i = 0; i < productos.length; i++) {
        popupWin.document.write('<tr>');
        popupWin.document.write('<td>' + productos[i] + '</td>');
        popupWin.document.write('<td>' + preciosArray[i] + '</td>');
        popupWin.document.write('</tr>');
    }

    popupWin.document.write('</table>');
    popupWin.document.write('</div>');

    // Mostrar el total debajo de la tabla
    popupWin.document.write('<p>' + total + '</p>');

    popupWin.document.write('</body></html>');
    popupWin.document.close();

    // Imprimir el contenido del pedido
    popupWin.print();
    popupWin.close();
}
</script>




</body>
</html>

