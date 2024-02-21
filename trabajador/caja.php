<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Fortaleza | Corte de caja</title>
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

                        <!-- Columna del Ticket de Compra -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Corte de caja</h3>
                                </div>

                                <div class="card-body">
                                    <section id="contentToPrint"> <!-- Agregamos un ID para identificar el contenido a imprimir -->
                                        <h6 align="center">Corte de Caja</h6>
                                        <img src="../svg/log.svg" alt="Descripción de la imagen" style="max-width: 100%; height: auto;">

                                        <?php
                                            // Conexión a la base de datos
                                            include '../config/conexion.php';

                                            // Verificar la conexión
                                            if ($conn->connect_error) {
                                                die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
                                            }

                                            // Consulta SQL para obtener el total de ventas en todas las fechas
                                            $sql = "SELECT SUM(total) AS total_ventas FROM ventas";

                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                // Obtenemos el total de ventas
                                                $row = $result->fetch_assoc();
                                                $totalVentas = $row["total_ventas"];

                                                // Aquí puedes calcular la ganancia (por ejemplo, restando los costos si los tienes)
                                                $ganancia = $totalVentas;

                                                // Mostrar el corte de caja y la ganancia
                                                echo "<p>Total de ventas: $totalVentas</p>";
                                                echo "<p>Ganancia: $ganancia</p>";
                                            } else {
                                                echo "No se encontraron ventas.";
                                            }

                                            // Cerrar la conexión
                                            $conn->close();
                                        ?>
                                        <br>
                                        <img src="../svg/caja.svg" alt="Descripción de la imagen" style="max-width: 100%; height: auto;">
                                        <br><br><br>
                                    </section>
                                    <button class="btn btn-sm btn-primary" onclick="imprimirGanancia()">Imprimir Ganancia</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>

    <script>
        function imprimirGanancia() {
            var ganancia = "<?php echo $ganancia; ?>";
            var fechaActual = new Date().toLocaleDateString();
            
            // Crear una ventana emergente con el contenido a imprimir
            var printWindow = window.open('', '', 'width=600,height=600');
            printWindow.document.write('<html><head><title>Informe de Ganancia</title></head><body>');
            
            
            // Obtener el contenido a imprimir por su ID
            var contentToPrint = document.getElementById('contentToPrint').innerHTML;
            printWindow.document.write(contentToPrint);
            
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            
            // Imprimir y cerrar la ventana emergente
            printWindow.print();
            printWindow.close();
        }
    </script>
</body>
</html>
