<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/client/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Enlace a Bootstrap Icons CDN -->

    <title>Pollo La Fortaleza Chicken | Contacto</title>

    <style>

        body {
            font-family: 'Montserrat', sans-serif;
            background: #fff;
        }

        /* Estilos para el contenedor principal */
        .container {
            display: flex;
            justify-content: center; /* Centra horizontalmente el contenido */
            align-items: center; /* Centra verticalmente el contenido */
            flex-wrap: wrap;
            text-align: center; /* Alinea el texto al centro */
            background:#fff;
        }
        

        /* Estilos para la imagen principal */
        .main-image {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Estilos para el SVG */
        svg {
            width: 100%;
            height: auto;
            margin: 0;
            margin-top: -143px;
        }

        /* Estilos para la sección con fondo de color */
        .color-section {
            background-color: #fff;
            padding: 20px; /* Puedes ajustar el relleno según tus necesidades */
            color: #ffffff; /* Color de texto dentro de la sección */
            margin-top: -5px;
        }

        /* Estilos para las columnas */
        .column {
            width: 100%; /* Ocupa todo el ancho disponible */
            max-width: 600px; /* Establece un ancho máximo para las columnas */
            margin: 0 auto; /* Centra las columnas horizontalmente */
            margin-bottom: 20px; /* Espacio inferior entre las columnas */
            padding: 20px;
        }

        /* Estilos para el texto dentro de la columna en la sección color-section */
.color-section .column p {
    color: #fff; /* Cambia el color del texto a blanco (#fff) */
}

        /* Estilos para el círculo blanco */
        .circle-container {
            width: 250px;
            height: 250px;
            background-color: #fff;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto;
        }

        /* Estilos para la imagen dentro del círculo */
        .circle-container img {
            width: 75%;
            height: auto;
        }

        /* Estilos para la nueva sección con el segundo SVG */
        #second-svg {
            text-align: center;
            margin-top: -1px; /* Ajusta el margen superior según tus necesidades */
        }


        /* Seccion 3 */

    /* Estilos para la nueva sección dividida en dos columnas */
    .new-section-two-columns {
        display: flex;
        flex-direction: column; /* Cambia la dirección del diseño a columna en pantallas pequeñas */
        margin-top: -41px;
    }

    /* Estilos para las columnas dentro de la nueva sección */
    .new-section-two-columns .column {
        width: 100%; /* Ocupa todo el ancho disponible */
        margin-bottom: 20px; /* Espacio inferior entre las columnas */
    }

    /* Estilos para la imagen con identificador 'imagen-contacto' */
    #imagen-contacto {
        width: 100%; /* Ajusta el ancho de la imagen según el ancho de su contenedor */
        height: auto;
        /*display: block;*/
        border-radius: 50px; /* Añade bordes redondeados si lo deseas */
        padding: 20px;
        
    }

    #fullWidthImage {
    width: 100%;
    height: auto;
    display: block;
}

/* Estilos para el botón "Explorar Menú" */
.explore-menu-button {
    display: inline-block;
    background-color: #911D1D;
    color: #ffffff;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

/* Cambio de color al pasar el mouse sobre el botón */
.explore-menu-button:hover {
    background-color: #690f0f;
}


    /* Estilos responsivos para pantallas más pequeñas */
    @media (min-width: 768px) {
        .new-section-two-columns {
            flex-direction: row; /* Vuelve a la dirección de fila en pantallas más grandes */
        }

        .new-section-two-columns .column {
            width: 48%; /* Ajusta el ancho de las columnas según tus necesidades */
        }
        

    }


    </style>
</head>
<body>


<!-- Nueva sección dividida en dos -->
<div class="new-section-two-columns-2 container">
    <!-- Columna izquierda con texto -->
    <div class="column">
    <img id="imagen-contacto" src="lugar/1.jpg" alt="Descripción de la imagen">

</div>

<!-- Columna derecha con imagen -->
<div class="column">
    <h2>Nuestras instalaciones</h2><br>
    <p align="justify">Descubre el auténtico arte del sabor en Tehuacán con Pollos la Fortaleza Chicken: ¡Sumérgete en el placer crujiente y saborea la delicia de nuestro pollo perfectamente dorado hasta el último bocado! 🍗✨ #FortalezaChickenExperience</p><br>
    <p align="justify">Sumérgete en un ambiente acogedor y moderno en Pollos la Fortaleza Chicken Tehuacán. Nuestras instalaciones te invitan a disfrutar de una experiencia gastronómica única, donde la frescura y la calidad se fusionan con el estilo. ¡Ven y vive la magia de Pollos la Fortaleza Chicken en cada rincón!</p><br>
    <p align="justify">Explora nuestro menú variado, desde piezas de pollo crujientes hasta deliciosos acompañamientos. En Pollos la Fortaleza Chicken, cada plato está preparado con pasión y cuidado, garantizando una experiencia culinaria inolvidable para ti y tus seres queridos.</p><br>
    
    <!-- Botón "Explorar Menú" -->
    <a href="menu.php" class="explore-menu-button">Explorar Menú</a>
</div>
</div>

<br>

<!-- Nueva sección dividida en dos -->
<div class="new-section-two-columns-2 container">
    <!-- Columna izquierda con texto -->
    <div class="column">
        <h2>Nuestro equipo de trabajo</h2><br>
        <p align="justify">En Pollos la Fortaleza Chicken, nuestro equipo está dedicado a brindarte un servicio excepcional. Desde el momento en que entras por la puerta, nuestro personal amable y profesional se esfuerza por crear una experiencia agradable y memorable para cada cliente.</p><br>
        <p align="justify">Nuestros chefs expertos y el equipo de atención al cliente trabajan de la mano para garantizar que cada platillo cumpla con los más altos estándares de calidad y sabor. Estamos comprometidos a superar tus expectativas y hacer de tu visita a Pollos la Fortaleza Chicken una experiencia gastronómica única.</p>
    </div>

    <!-- Columna derecha con imagen -->
    <div class="column">
        <img id="imagen-contacto" src="lugar/4.jpg" alt="Descripción de la imagen">
    </div>
</div>

<!-- Nueva sección dividida en dos -->
<div class="new-section-two-columns-2 container">
    <!-- Columna izquierda con texto -->
    <div class="column">
        <img id="imagen-contacto" src="lugar/3.jpg" alt="Descripción de la imagen">
    </div>

    <!-- Columna derecha con imagen -->
    <div class="column">
        <h2>¿Puedes con una mordida?</h2><br>
        <p align="justify">Explora el universo de sabores con Pollos la Fortaleza Chicken, donde el pollo crujiente se convierte en poesía gastronómica. Sumérgete en la magia de nuestras recetas exclusivas, fusionando calidad y sabor en cada pedazo dorado. Descubre la excelencia en cada bocado, una experiencia que va más allá de lo ordinario. ¡Ven y haz de tus momentos una celebración de crujiente placer! 🍗✨ #FortalezaChickenExperience</p><br>
        <p align="justify">Sabor crujiente que enamora, Pollos la Fortaleza Chicken te invita a descubrir el placer de cada bocado dorado. Con pollo de calidad y un toque de magia en cada fritura, ¡te esperamos para que vivas una experiencia deliciosa! 🍗✨ #FortalezaChickenDelight</p>
    </div>
</div>


</body>
</html>
<?php  include 'footer.php'?>