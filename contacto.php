<?php include 'nav/menu.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/client/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Enlace a Bootstrap Icons CDN -->

    <title>Pollos La Fortaleza Chicken | Contacto</title>

    <style>
        /* Estilos para el contenedor principal */
        .container {
            display: flex;
            justify-content: center; /* Centra horizontalmente el contenido */
            align-items: center; /* Centra verticalmente el contenido */
            flex-wrap: wrap;
            text-align: center; /* Alinea el texto al centro */
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
            background-color: #911D1D;
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
            width: 100%;
            height: auto;
            margin-top: 50px;
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
        width: 65%; /* Ajusta el ancho de la imagen según el ancho de su contenedor */
        height: auto;
        /*display: block;*/
        border-radius: 10px; /* Añade bordes redondeados si lo deseas */
    }

    #fullWidthImage {
    width: 100%;
    height: auto;
    display: block;
}

.enlace-personalizado {
            text-decoration: none;
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

<div>
    <img id="fullWidthImage" src="lugar/4.jpg" alt="Descripción de la imagen">
</div>
    <!-- SVG -->
    <svg xmlns="http://www.w3.org/2000/svg" width="900" height="111" viewBox="0 0 900 111" fill="none">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0L37.5 11.5625C75 23.125 150 46.25 225 60.125C300 74 375 78.625 450 76.3125C525 74 600 64.75 675 55.5C750 46.25 825 37 862.5 32.375L900 27.75V111H862.5C825 111 750 111 675 111C600 111 525 111 450 111C375 111 300 111 225 111C150 111 75 111 37.5 111H0V0Z" fill="#911D1D"/>
    </svg>

<!-- Sección con fondo de color y columnas -->
<div class="color-section container">
    <!-- Columna izquierda con texto -->
    <div class="column">
        <p>¡Bienvenidos a La Fortaleza Chicken, donde la magia de nuestro Crunch transforma cada bocado en una explosión de sabor que no podrás olvidar! En el corazón de Tehuacán, Puebla, somos los creadores de una experiencia gastronómica única que fusiona la pasión por la calidad con la comodidad de lo delicioso.</p>
        <br>
        <p>Imagina pollo crujiente, dorado a la perfección, con un toque secreto que hace que cada mordisco sea una fiesta en tu paladar. En La Fortaleza Chicken, nos esforzamos por elevar el estándar de lo que conoces sobre la comida rápida. Nuestros platillos no solo son una deliciosa indulgencia, ¡son un viaje emocionante para tus sentidos!</p>
    </div>
    <!-- Columna derecha con círculo blanco y la imagen -->
    <div class="column">
        <div class="circle-container">
            <img src="ico/logo.png" alt="Descripción de la imagen">
        </div>
    </div>
</div>


    <!-- Nueva sección con el segundo SVG y un identificador -->
    <div id="second-svg">
        <svg xmlns="http://www.w3.org/2000/svg" id="second-svg" width="900" height="139" viewBox="0 0 900 139" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 139L37.5 126.13C75 113.259 150 87.5185 225 87.5185C300 87.5185 375 113.259 450 102.963C525 92.6667 600 46.3333 675 30.8889C750 15.4444 825 30.8889 862.5 38.6111L900 46.3333V0H862.5C825 0 750 0 675 0C600 0 525 0 450 0C375 0 300 0 225 0C150 0 75 0 37.5 0H0V139Z" fill="#911D1D"/>
        </svg>
    </div>

<!-- Nueva sección dividida en dos -->
<div class="new-section-two-columns container">
    <!-- Columna izquierda con texto -->
    <div class="column">
    <h2>Contacto</h2>
<p>¡Bienvenidos a La Fortaleza Chicken, donde la magia de nuestro Crunch transforma cada bocado en una explosión de sabor que no podrás olvidar! En el corazón de Tehuacán, Puebla, somos los creadores de una experiencia gastronómica única que fusiona la pasión por la calidad con la comodidad de lo delicioso.</p>
<p><strong>¿Quieres saber más o hacer un pedido?</strong></p>
<p>No dudes en contactarnos para cualquier consulta, pedido o información adicional. Estamos aquí para atenderte.</p>
    <p>Dirección: <a class="enlace-personalizado" href="https://maps.app.goo.gl/uxxLGL4ZJ4dgZHaP6" style="color: #000;"> Calle Dr Manuel Pereyra Mejía 433, Ignacio Zaragoza, 75770 Tehuacán, Pue</p>
    <p>Teléfono: <a class="enlace-personalizado" href="tel:2381667070" style="color: #000;"><i class="bi bi-phone"></i> 2381667070</a></p>
    <p>WhatsApp: <a class="enlace-personalizado" href="https://wa.me/2381667070?text=Hola%20Pollos la Fortaleza Chicken,%20quiero%20obtener%20información" style="color: #000;"><i class="bi bi-whatsapp"></i> 2381667070</a></p>
    <p>Correo Electrónico: <a class="enlace-personalizado" href="mailto:asadoslafortaleza2381274286@gmail.com" style="color: #000;"><i class="bi bi-envelope"></i> asadoslafortaleza2381274286@gmail.com</a></p>
    <p>¡En Pollos la Fortaleza Chicken, cada contacto es una oportunidad para compartir la delicia!</p>
</div>




    <!-- Columna derecha con imagen -->
    <div class="column">
        <img id="imagen-contacto" src="img/c.png" alt="Descripción de la imagen">
    </div>
</div>

<br><br>

<?php include 'horario.php'; ?>

<?php include 'ubicacion.php'; ?>

<?php include('footer.php')?>


</body>
</html>
