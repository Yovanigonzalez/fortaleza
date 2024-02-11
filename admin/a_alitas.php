<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Alitas</title>

</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Barra de navegación y sidebar aquí -->
        <!-- Contenido principal -->
        <div class="content-wrapper">
            <section class="content">
                <br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Agregar Alitas</h3>
                                </div>
                                <div class="card-body">
                                <div class="card-body">
                                    <form method="post" action="guardar_sn.php">
                                        <!-- Mensaje de éxito -->
                                        <?php
                                            // Verificar si se debe mostrar un mensaje de éxito o error
                                            if (isset($_GET['success']) && $_GET['success'] === 'true') {
                                                echo '<div class="alert alert-success" role="alert">Los datos se han guardado correctamente.</div>';
                                            } elseif (isset($_GET['success']) && $_GET['success'] === 'false') {
                                                echo '<div class="alert alert-danger" role="alert">Error al guardar los datos: ' . $_GET['error_message'] . '</div>';
                                            }
                                        ?>
                                        <!-- Mensaje de error -->
                                        <div class="form-group">
                                            <label for="cantidad">Cantidad</label>
                                            <select class="form-control" id="cantidad" name="cantidad">
                                                <option value="" disabled selected>Selecciona la cantidad</option>
                                                <option value="6.0">1 Orden 6 Alitas</option>
                                                <option value="12.0">Paquete 12 Alitas</option>
                                                <option value="24.0">Paquete 24 Alitas</option>
                                                <option value="36.0">Paquete Premium 36 Alitas</option>

                                            </select>
                                        </div>



                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <select class="form-control" id="descripcion" name="descripcion">
                                            <option value="" disabled selected>Selecciona la descripcion</option>

                                                <!-- Opciones para Pollo Asado -->
                                                <option value="1 Orden 6 Alitas">1 Orden 6 Alitas</option>

                                                
                                                <!-- Opciones para Pollo Rostizado -->
                                                <option value="Paquete 12 Alitas">Paquete 12 Alitas</option>

      
                                                <!-- Opciones para Pollo Barbacoa -->
                                                <option value="Paquete 24 Alitas">Paquete 24 Alitas</option>


                                                <!-- Opciones para Pollo Broaster -->
                                                <option value="1 Pollo Combos Broaster">Paquete Premium 36 Alitas</option>

                                                

                                            </select>
                                        </div>

                                        
                                        <div class="form-group">
                                            <label for="precio">Precio</label>
                                            <input type="text" class="form-control" id="precio" name="precio" readonly>
                                            <option value="" disabled selected>Campo automatico</option>
                                        </div>

                                        <div class="form-group">
                                            <label for="categoria">Categoría</label>
                                            <select class="form-control" id="categoria" name="categoria">
                                            <option value="" disabled selected>Selecciona la Categoría</option>
                                                <option value="Alitas">Alitas</option>
                                            </select>
                                        </div>


                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


    <script>
$(document).ready(function() {
    // Define a mapping of descripcion values to prices
    var precioMapping = {
        "1 Orden 6 Alitas": 75,

        "Paquete 12 Alitas": 120,

        "Paquete 24 Alitas": 230,

        //POLLOS 2

        "1 Pollo Combos Broaster": 325


    };

    $('#descripcion').on('change', function() {
        var descripcion = $(this).val();
        var precio = precioMapping[descripcion];

        if (precio !== undefined) {
            $('#precio').val(precio.toFixed(2));
        } else {
            $('#precio').val('');
        }
    });
});
</script>


</body>
</html>