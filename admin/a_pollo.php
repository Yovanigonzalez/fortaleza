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

                                                 <!-- Orden de Alitas-->

                                                <option value="6.0">1 Orden de Alitas</option>
                                                <option value="12.0">Paquete 1 Alitas</option>
                                                <option value="24.0">Paquete 2 Alitas</option>
                                                <option value="36.0">Paquete Premium Alitas</option>

                                                <!-- Tenders-->

                                                <option value="4.0">4 Piezas Tenders</option>
                                                <option value="10.0">10 Piezas Tenders</option>
                                                
                                                <!-- Alitas -->
                                                
                                                <option value="4.0">1 Orden Crepas</option>
                                                <option value="8.0">Paquete 1 Crepas</option>
                                                <option value="12.0">Paquete 2 Crepas</option>
                                                <option value="16.0">Paquete Premium Crepas</option>


                                                <!-- Hamburguesa -->
                                                
                                                <option value="1.0">1 Hamburguesa Sencilla/ Doble / Premium</option>

                                                
                                                <!-- El kilo de costilla da 1/2k de mas -->
                                                
                                                <option value="1.50">1 k de Costilla</option>

                                                <!-- 1/2 k Costilla -->
                                                
                                                <option value="0.50">1/2 k de Costilla</option>

                                                <!-- 1/4 k Costilla -->
                                                
                                                <option value="0.25">1/4 k de Costilla</option>
                                                
                                                <!-- Paquete 1 y 2 teiene 5 mixiotes -->

                                                <option value="5.0">Paquete 1 y 2 (5 pz) de Mixiotes</option>
                                                <option value="10.0">Paquete 3 (10 pz) de Mixiotes</option>
                                                <option value="15.0">Paquete 4 (15 pz) de Mixiotes</option>

                                                <!-- Guarniciones -->

                                                <option value="1.0">Guarniciones</option>

                                                <!-- Bebidas -->

                                                <option value="1.0">Bebidas</option>
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
                                                

                                                <!-- Opciones para Pollo Combos -->
                                                <option value="1 Pollo Combos Tradicional Asado">1 Pollo Combos Tradicional Asado</option>                               
                                                <!-- Opciones para Pollo Combos -->
                                                <option value="1 Pollo Combos Tradicional Rostizado">1 Pollo Combos Tradicional Rostizado</option>
                                                <!-- Opciones para Pollo Combos -->
                                                <option value="1 Pollo Combos Tradicional Barbacoa">1 Pollo Combos Tradicional Barbacoa</option>
                                                <!-- Opciones para Pollo Combos -->
                                                <option value="1 Pollo Combos Broaster">1 Pollo Combos Broaster</option>
                                                <!-- Opciones para Pollo Pollo Combos -->
                                                <option value="1 Pollo Combos Gourmet">1 Pollo Combos Gourmet</option>


                                                <!-- Opciones para P1 Orden de Alitas (6 piezas)-->
                                                <option value="1 Orden de Alitas (6 piezas)">1 Orden de Alitas (6 piezas)</option>                               
                                                <!-- Opciones para Paquete 1 (12 piezas) -->
                                                <option value="Paquete 1 (12 piezas) Alitas">Paquete 1 (12 piezas) Alitas</option>
                                                <!-- Opciones para Paquete 2 (24 piezas) -->
                                                <option value="Paquete 2 (24 piezas) Alitas">Paquete 2 (24 piezas) Alitas</option>
                                                <!-- Opciones para Paquete Premium (36 piezas) -->
                                                <option value="Paquete Premium (36 piezas) Alitas">Paquete Premium (36 piezas) Alitas</option>


                                                <!-- Opciones para Tenders -->
                                                <option value="4 piezas Tenders">4 Piezas Tenders</option>
                                                <!-- Opciones para Paquete Premium (36 piezas) -->
                                                <option value="10 Piezas Tenders">10 Piezas Tenders</option>


                                                <!-- Opciones para Tenders -->
                                                <option value="1 Orden Crepas">1 Orden (4 piezas) crepas</option>
                                                <!-- Opciones para Paquete Premium (36 piezas) -->
                                                <option value="Paquete 1 Crepas">Paquete 1 (8 piezas) crepas</option>
                                                <!-- Opciones para Paquete Premium (36 piezas) -->
                                                <option value="Paquete 2 Crepas">Paquete 2 (12 piezas) crepas</option>
                                                <!-- Opciones para Paquete Premium (36 piezas) -->
                                                <option value="Paquete Premium Crepas">Paquete Premium (16 piezas) crepas</option>


                                                <!-- Opciones para Hamburguesa -->

                                                <option value="1 Hamburguesa Sencilla">1 Hamburguesa Sencilla</option>
                                                <!-- Opciones para Paquete Premium (36 piezas) -->
                                                <option value="1 Hamburguesa Doble">1 Hamburguesa Doble</option>
                                                <!-- Opciones para Paquete Premium (36 piezas) -->
                                                <option value="1 Hamburguesa Premium">1 Hamburguesa Premium</option>


                                                <!-- Opciones para Costilla 1-->

                                                <option value="1 Kilo Costilla BBQ">1 Kilo Costilla BBQ</option>
                                                <option value="1 Kilo Costilla Encacahuatado">1 Kilo Costilla Encacahuatado</option>
                                                <option value="1 Kilo Costilla Chilpetin">1 Kilo Costilla Chilpetin</option>
                                                <option value="1 Kilo Costilla Tamarindo">1 Kilo Costilla Tamarindo</option>
                                                <option value="1 Kilo Costilla Mango Habanero">1 Kilo Costilla Mango Habanero</option>
                                                <option value="1 Kilo Costilla Hormiga Limon">1 Kilo Costilla Hormiga Limon</option>
                                                <option value="1 Kilo Costilla A La Diabla">1 Kilo Costilla A La Diabla</option>
                                                <option value="1 Kilo Costilla Chipotle">1 Kilo Costilla Chipotle </option>

                                                <!-- Opciones para Costilla 1/2-->

                                                <option value="1/2 Kilo Costilla BBQ">1/2 Kilo Costilla BBQ</option>
                                                <option value="1/2 Kilo Costilla Encacahuatado">1/2 Kilo Costilla Encacahuatado</option>
                                                <option value="1/2 Kilo Costilla Chilpetin">1/2 Kilo Costilla Chilpetin</option>
                                                <option value="1/2 Kilo Costilla Tamarindo">1/2 Kilo Costilla Tamarindo</option>
                                                <option value="1/2 Kilo Costilla Mango Habanero">1/2 Kilo Costilla Mango Habanero</option>
                                                <option value="1/2 Kilo Costilla Hormiga Limon">1/2 Kilo Costilla Hormiga Limon</option>
                                                <option value="1/2 Kilo Costilla A La Diabla">1/2 Kilo Costilla A La Diabla</option>
                                                <option value="1/2 Kilo Costilla Chipotle">1/2 Kilo Costilla Chipotle </option>

                                                <!-- Opciones para Costilla 1/2-->

                                                <option value="1/4 Kilo Costilla BBQ">1/4 Kilo Costilla BBQ</option>
                                                <option value="1/4 Kilo Costilla Encacahuatado">1/4 Kilo Costilla Encacahuatado</option>
                                                <option value="1/4 Kilo Costilla Chilpetin">1/4 Kilo Costilla Chilpetin</option>
                                                <option value="1/4 Kilo Costilla Tamarindo">1/4 Kilo Costilla Tamarindo</option>
                                                <option value="1/4 Kilo Costilla Mango Habanero">1/4 Kilo Costilla Mango Habanero</option>
                                                <option value="1/4 Kilo Costilla Hormiga Limon">1/4 Kilo Costilla Hormiga Limon</option>
                                                <option value="1/4 Kilo Costilla A La Diabla">1/4 Kilo Costilla A La Diabla</option>
                                                <option value="1/4 Kilo Costilla Chipotle">1/4 Kilo Costilla Chipotle </option>

                                                <!-- Opciones para Mixiotes -->
                                                <option value="Paquete 1 (5 Mixiotes)">Paquete 1 (5 Mixiotes)</option>
                                                <option value="Paquete 2 (5 Mixiotes + Guarnicion Chica)">Paquete 2 (5 Mixiotes + Guarnicion Chica)</option>
                                                <option value="Paquete 3 (10 Mixiotes + Guarnicion Chica)">Paquete 3 (10 Mixiotes + Guarnicion Chica)</option>
                                                <option value="Paquete 4 (15 Mixiotes + Guarnicion Chica)">Paquete 4 (15 Mixiotes + Guarnicion Chica)</option>

                                                <!-- Guarniciones -->
                                                <option value="Nopales">Nopales</option>
                                                <option value="Arroz">Arroz</option>
                                                <option value="Espagueti">Espagueti</option>
                                                <option value="Refritos">Refritos</option>
                                                <option value="Charros">Charros</option>
                                                <option value="Papas Cambray">Papas Cambray</option>
                                                <option value="Papas a la Francesa">Papas a la Francesa</option>
                                                <option value="Papas Gajo">Papas Gajo</option>
                                                <option value="Ensalada Rusa">Ensalada Rusa</option>
                                                <option value="Ensalada Dulce">Ensalda Dulce</option>
                                                <option value="Nuggets">Nuggets</option>
                                                <option value="Totopos">Totopos</option>
                                                <option value="Tortilla 1/2 kilo">Tortilla 1/2 kilo</option>
                                                <option value="Orden 1 kilo Tortilla">Orden 1 kilo Tortilla</option>
                                                <option value="Papitas Fritas (Bolsita)">Papitas Fritas (Bolsita)</option>
                                                <option value="Platanos Fritos">Platanos Fritos</option>

                                                <!-- Bebidas -->

                                                <option value="Agua natural">Agua natural</option>
                                                <option value="Agua mineral">Agua mineral</option>
                                                <option value="Refresco vidrio 355 ml">Refresco vidrio 355 ml</option>
                                                <option value="Refresco vidrio 1 1/4 ml">Refresco vidrio 1 1/4 ml</option>
                                                <option value="Refresco 2L">Refresco 2L</option>
                                                <option value="Refresco 3L">Refresco 3L</option>
                                                <option value="Jugo de lata">Jugo de lata</option>
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
                                                <!--<option value="Combos">Pollos Combos</option>-->
                                                <option value="Alitas">Alitas</option>
                                                <option value="Tenders">Tenders</option>
                                                <option value="Crepas">Crepas</option>
                                                <option value="Hamburguesas">Hamburguesas</option>
                                                <option value="Costillas">Costillas</option>
                                                <option value="Guarniciones">Guarniciones</option>
                                                <option value="Mixiotes">Mixiotes</option>
                                                <option value="Bebidas">Bebidas</option>







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
        "2 Pollo Adobado": 360,

        "1 Pollo Combos Tradicional Asado": 290,
        "1 Pollo Combos Tradicional Rostizado": 290,
        "1 Pollo Combos Tradicional Barbacoa": 290,
        "1 Pollo Combos Broaster": 305,
        "1 Pollo Combos Gourmet": 305,

        "1 Orden de Alitas (6 piezas)": 75,                           
        "Paquete 1 (12 piezas) Alitas": 120,
        "Paquete 2 (24 piezas) Alitas": 230,
        "Paquete Premium (36 piezas) Alitas": 325,

        //Tenders

        "4 piezas Tenders": 135,               
        "10 Piezas Tenders": 220,

        //Alitas

        "1 Orden Crepas": 65,
        "Paquete 1 Crepas": 120,
        "Paquete 2 Crepas": 170, 
        "Paquete Premium Crepas": 210,

        //Hamburgesa

        "1 Hamburguesa Sencilla": 75,
        "1 Hamburguesa Doble": 95,
        "1 Hamburguesa Premium": 105,

        //Costillas 1k

        "1 Kilo Costilla BBQ": 350,
        "1 Kilo Costilla Encacahuatado": 350,
        "1 Kilo Costilla Chilpetin": 350,
        "1 Kilo Costilla Tamarindo": 350,
        "1 Kilo Costilla Mango Habanero": 350,
        "1 Kilo Costilla Hormiga Limon": 350,
        "1 Kilo Costilla A La Diabla": 350,
        "1 Kilo Costilla Chipotle": 350,

        
        "1/2 Kilo Costilla BBQ": 195,
        "1/2 Kilo Costilla Encacahuatado": 195,
        "1/2 Kilo Costilla Chilpetin": 195,
        "1/2 Kilo Costilla Tamarindo": 195,
        "1/2 Kilo Costilla Mango Habanero": 195,
        "1/2 Kilo Costilla Hormiga Limon": 195,
        "1/2 Kilo Costilla A La Diabla": 195,
        "1/2 Kilo Costilla Chipotle": 195,

        
        "1/4 Kilo Costilla BBQ": 105,
        "1/4 Kilo Costilla Encacahuatado": 105,
        "1/4 Kilo Costilla Chilpetin": 105,
        "1/4 Kilo Costilla Tamarindo": 105,
        "1/4 Kilo Costilla Mango Habanero": 105,
        "1/4 Kilo Costilla Hormiga Limon": 105,
        "1/4 Kilo Costilla A La Diabla": 105,
        "1/4 Kilo Costilla Chipotle": 105,


        //Guarniciones

        "Nopales": 35,
        "Arroz": 35,
        "Espagueti": 35,
        "Refritos": 45,
        "Charros": 45,
        "Papas Cambray": 45,
        "Papas a la Francesa": 45,
        "Papas Gajo": 45,
        "Ensalada Rusa": 45,
        "Ensalada Dulce": 45,
        "Nuggets": 45,
        "Totopos": 20,
        "Tortilla 1/2 kilo": 20,
        "Orden 1 kilo Tortilla": 35,
        "Papitas Fritas (Bolsita)": 20,
        "Platanos Fritos": 35,

        //Bebidas

        "Agua natural": 15,
        "Agua mineral": 25,
        "Refresco vidrio 355 ml": 25,
        "Refresco vidrio 1 1/4 ml": 35,
        "Refresco 2L": 45,
        "Refresco 3L": 60,
        "Jugo de lata": 20,


        //Mixiotes
        "Paquete 1 (5 Mixiotes)": 105,
        "Paquete 2 (5 Mixiotes + Guarnicion Chica)": 140,      
        "Paquete 3 (10 Mixiotes + Guarnicion Chica)": 265,
        "Paquete 4 (15 Mixiotes + Guarnicion Chica)": 375
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