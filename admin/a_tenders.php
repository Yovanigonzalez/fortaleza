<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Tenders</title>

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
                                    <h3 class="card-title">Agregar 'Tenders'</h3>
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
                                                <option value="1.0">1 Pollo</option>
                                            </select>
                                        </div>



                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <select class="form-control" id="descripcion" name="descripcion">
                                            <option value="" disabled selected>Selecciona la descripcion</option>

                                                <!-- Opciones para Pollo Asado -->
                                                <option value="1 Pollo Combos Tradicional Asado">1 Pollo Combos Tradicional Asado</option>

                                                
                                                <!-- Opciones para Pollo Rostizado -->
                                                <option value="1 Pollo Combos Tradicional Rostizado">1 Pollo Combos Tradicional Rostizado</option>

      
                                                <!-- Opciones para Pollo Barbacoa -->
                                                <option value="1 Pollo Combos Tradicional Barbacoa">1 Pollo Combos Tradicional Barbacoa</option>


                                                <!-- Opciones para Pollo Broaster -->
                                                <option value="1 Pollo Combos Broaster">1 Pollo Combos Broaster</option>


                                                <!-- Opciones para Pollo BBQ -->
                                                <option value="1 Pollo Combos Gourmet">1 Pollo Combos Gourmet</option>

                                                

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
                                                <option value="Pollo">Pollos Combos</option>
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
        "1 Pollo Combos Tradicional Asado": 290,

        "1 Pollo Combos Tradicional Rostizado": 290,

        "1 Pollo Combos Tradicional Barbacoa": 290,

        //POLLOS 2

        "1 Pollo Combos Broaster": 305,

        "1 Pollo Combos Gourmet": 305

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