<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Pollo</title>

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
                                    <h3 class="card-title">Agregar Pollo</h3>
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
                                                <option value="0.5">1/2 Pollo</option>
                                                <option value="1.0">1 Pollo</option>
                                                <option value="2.0">2 Pollos</option>
                                            </select>
                                        </div>



                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <select class="form-control" id="descripcion" name="descripcion">
                                            <option value="" disabled selected>Selecciona la descripcion</option>

                                                <!-- Opciones para Pollo Asado -->
                                                <option value="1/2 Pollo Asado">1/2 Pollo Asado</option>
                                                <option value="1 Pollo Asado">1 Pollo Asado</option>
                                                <option value="2 Pollo Asado">2 Pollos Asado</option>

                                                
                                                <!-- Opciones para Pollo Rostizado -->
                                                <option value="1/2 Pollo Rostizado">1/2 Pollo Rostizado</option>
                                                <option value="1 Pollo Rostizado">1 Pollo Rostizado</option>
                                                <option value="2 Pollo Rostizado">2 Pollos Rostizado</option>

      
                                                <!-- Opciones para Pollo Barbacoa -->
                                                <option value="1/2 Pollo Barbacoa">1/2 Pollo Barbacoa</option>
                                                <option value="1 Pollo Barbacoa">1 Pollo Barbacoa</option>
                                                <option value="2 Pollo Barbacoa">2 Pollos Barbacoa</option>


                                                <!-- Opciones para Pollo Broaster -->
                                                <option value="1/2 Pollo Broaster">1/2 Pollo Broaster</option>
                                                <option value="1 Pollo Broaster">1 Pollo Broaster</option>
                                                <option value="2 Pollo Broaster">2 Pollos Broaster</option>


                                                <!-- Opciones para Pollo BBQ -->
                                                <option value="1/2 Pollo BBQ">1/2 Pollo BBQ</option>
                                                <option value="1 Pollo BBQ">1 Pollo BBQ</option>
                                                <option value="2 Pollo BBQ">2 Pollos BBQ</option>

                                                
                                                <!-- Opciones para Pollo Encacahuatado -->
                                                <option value="1/2 Pollo Encacahuatado">1/2 Pollo Encacahuatado</option>
                                                <option value="1 Pollo Encacahuatado">1 Pollo Encacahuatado</option>
                                                <option value="2 Pollo Encacahuatado">2 Pollos Encacahuatado</option>

                                                
                                                <!-- Opciones para Pollo Chilpetin -->
                                                <option value="1/2 Pollo Chilpetin">1/2 Pollo Chilpetin</option>
                                                <option value="1 Pollo Chilpetin">1 Pollo Chilpetin</option>
                                                <option value="2 Pollo Chilpetin">2 Pollos Chilpetin</option>

                                                
                                                <!-- Opciones para Pollo Tamarindo -->
                                                <option value="1/2 Pollo Tamarindo">1/2 Pollo Tamarindo</option>
                                                <option value="1 Pollo Tamarindo">1 Pollo Tamarindo</option>
                                                <option value="2 Pollo Tamarindo">2 Pollos Tamarindo</option>

                                                
                                                <!-- Opciones para Pollo Mango Habanero -->
                                                <option value="1/2 Pollo Mango Habanero">1/2 Pollo Mango Habanero</option>
                                                <option value="1 Pollo Mango Habanero">1 Pollo Mango Habanero</option>
                                                <option value="2 Pollo Mango Habanero">2 Pollos Mango Habanero</option>

                                                
                                                <!-- Opciones para Pollo Hormiga Limon -->
                                                <option value="1/2 Pollo Hormiga Limon">1/2 Pollo Hormiga Limon</option>
                                                <option value="1 Pollo Hormiga Limon">1 Pollo Hormiga Limon</option>
                                                <option value="2 Pollo Hormiga Limon">2 Pollo Hormiga Limon</option>
                                                
                                                
                                                <!-- Opciones para Pollo A la Diabla -->
                                                <option value="1/2 Pollo A la Diabla">1/2 Pollo A la Diabla</option>
                                                <option value="1 Pollo A la Diabla">1 Pollo A la Diabla</option>
                                                <option value="2 Pollo A la Diabla">2 Pollo A la Diabla</option>                                              <option value="2 Pollo Mango Habanero">2 Pollos Mango Habanero</option>
                                                
                                                <!-- Opciones para Pollo Chipotle -->
                                                <option value="1/2 Pollo Chipotle">1/2 Pollo Chipotle</option>
                                                <option value="1 Pollo Chipotle">1 Pollo Chipotle</option>
                                                <option value="2 Pollo Chipotle">2 Pollos Chipotle</option>                                              <option value="2 Pollo Mango Habanero">2 Pollos Mango Habanero</option>
                                                
                                                <!-- Opciones para Pollo Adobado -->
                                                <option value="1/2 Pollo Adobado">1/2 Pollo Adobado</option>
                                                <option value="1 Pollo Adobado">1 Pollo Adobado</option>
                                                <option value="2 Pollo Adobado">2 Pollos Adobado</option>  
                                                
                        


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
                                                <option value="Pollo">Pollo</option>
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
        "1/2 Pollo Asado": 95,
        "1 Pollo Asado": 175,
        "2 Pollo Asado": 330,

        "1/2 Pollo Rostizado": 95,
        "1 Pollo Rostizado": 175,
        "2 Pollo Rostizado": 330,

        "1/2 Pollo Barbacoa": 95,
        "1 Pollo Barbacoa": 175,
        "2 Pollo Barbacoa": 330,

        //POLLOS 2

        "1/2 Pollo Broaster": 105,
        "1 Pollo Broaster": 190,
        "2 Pollo Broaster": 360,

        "1/2 Pollo BBQ": 105,
        "1 Pollo BBQ": 190,
        "2 Pollo BBQ": 360,

        "1/2 Pollo Encacahuatado": 105,
        "1 Pollo Encacahuatado": 190,
        "2 Pollo Encacahuatado": 360,

        "1/2 Pollo Chilpetin": 105,
        "1 Pollo Chilpetin": 190,
        "2 Pollo Chilpetin": 360,

        "1/2 Pollo Tamarindo": 105,
        "1 Pollo Tamarindo": 190,
        "2 Pollo Tamarindo": 360, 

        "1/2 Pollo Mango Habanero": 105,
        "1 Pollo Mango Habanero": 190,
        "2 Pollo Mango Habanero": 360,

        "1/2 Pollo Hormiga Limon": 105,
        "1 Pollo Hormiga Limon": 190,
        "2 Pollo Hormiga Limon": 360,

        "1/2 Pollo A la Diabla": 105,
        "1 Pollo A la Diabla": 190,
        "2 Pollo A la Diabla": 360,

        "1/2 Pollo Chipotle": 105,
        "1 Pollo Chipotle": 190,
        "2 Pollo Chipotle": 360,

        "1/2 Pollo Adobado": 105,
        "1 Pollo Adobado": 190,
        "2 Pollo Adobado": 360
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