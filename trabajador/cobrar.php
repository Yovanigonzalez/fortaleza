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
    <p id="mesa">Mesa: <?php echo $mesa; ?></p>
    <p id="pedido">Pedido: <?php echo $descripcion; ?></p>
    <p id="total">Total: <?php echo $total; ?></p>
    <!-- Agrega el botón "Imprimir" aquí -->
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
    var mesa = document.getElementById('mesa').innerHTML;
    var descripcion = document.getElementById('pedido').innerHTML;
    var total = document.getElementById('total').innerHTML;

    // Crear una ventana emergente para imprimir el contenido del pedido con fecha y hora
    var popupWin = window.open('', '_blank', 'width=600,height=600');
    popupWin.document.open();
    popupWin.document.write('<html><head><title>Información del Pedido</title>');

    // Estilos de la ventana de impresión
    popupWin.document.write('<style>');
    popupWin.document.write('body { font-family: Arial, sans-serif; }');
    popupWin.document.write('table { width: 100%; border-collapse: collapse; }');
    popupWin.document.write('th, td { border: 1px solid #dddddd; text-align: left; padding: 4px; font-size: 10px; }');
    popupWin.document.write('th { background-color: #f2f2f2; }');
    popupWin.document.write('ul { list-style-type: none; padding: 0; margin: 0; }');
    popupWin.document.write('li { margin-bottom: 2px; font-size: 10px; }');
    popupWin.document.write('</style>');

    popupWin.document.write('</head><body>');
    popupWin.document.write('<h2>Información del Pedido</h2>');

    // Crear una tabla responsiva para organizar la información
    popupWin.document.write('<div style="overflow-x:auto;">');
    popupWin.document.write('<table>');

    // Fila de encabezados de columna
    popupWin.document.write('<tr>');
    popupWin.document.write('<th>Mesa</th>');
    popupWin.document.write('<th>Descripción</th>');
    popupWin.document.write('<th>Total</th>');
    popupWin.document.write('</tr>');

    // Fila con valores responsivos
    popupWin.document.write('<tr>');
    popupWin.document.write('<td>' + mesa + '</td>');

    // Dividir la descripción por comas y crear una fila para cada elemento
    var productos = descripcion.split(',');
    popupWin.document.write('<td><ul>');
    for (var i = 0; i < productos.length; i++) {
        popupWin.document.write('<li>' + productos[i] + '</li>');
    }
    popupWin.document.write('</ul></td>');

    popupWin.document.write('<td>' + total + '</td>');
    popupWin.document.write('</tr>');

    popupWin.document.write('</table>');
    popupWin.document.write('</div>');

    popupWin.document.write('<p>Fecha y Hora: ' + fechaHoraFormato + '</p>');
    popupWin.document.write('</body></html>');
    popupWin.document.close();

    // Imprimir el contenido del pedido
    popupWin.print();
    popupWin.close();
}
</script>



</body>
</html>

