<?php include 'nav/menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pollo La Fortaleza Chicken | Acerca de</title>
    <script src="assets/client/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        /* Estilo básico para la división de la sección en dos */
        .contenedor {
            display: flex;
            flex-wrap: wrap; /* Añadido para que los elementos se ajusten en dispositivos más pequeños */
            margin-top: 20px; /* Ajusta el margen superior para reducir el espacio */
        }

        .izquierda, .derecha {
            flex: 1;
            padding: 20px; /* Ajusta el espaciado interno */
        }

        /* Estilo para la imagen principal */
        .imagen-principal {
            width: 100%;
            height: auto;
        }

        /* Center the image in the left section */
        .izquierda {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Remove the margin-right for the image in the left section */
        .izquierda img {
            margin-right: 0;
        }

        /* Estilo opcional para que la imagen no exceda el ancho del contenedor */
        .izquierda img, .derecha img {
            height: auto;
            padding: 20px;
            width: 150px;
        }

        /* Center-align text in the right section */
        .derecha {
            text-align: center;
        }

    .container {
      display: flex;
    }

    #izquierda {
      flex: 1;
      padding: 20px;
      background-color: #fff;
    }

    #derecha {
      flex: 1;
      padding: 20px;
      background-color: #fff;
    }

    #compromiso {
      padding: 20px;
      background-color: #fff;
    }

            /* Center the image in the left section */
            .imagen {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Remove the margin-right for the image in the left section */
        .imagen img {
            margin-right: 0;
        }

/* Media query para dispositivos más pequeños */
@media screen and (max-width: 768px) {
    .izquierda, .derecha {
        flex: 100%; /* Cambia a una sola columna en dispositivos más pequeños */
        padding: 10px; /* Ajusta el espaciado interno en dispositivos más pequeños */
    }

    .imagen-principal {
        max-width: 100%; /* Hace que la imagen principal sea completamente receptiva */
    }

    /* Estilo opcional para que la imagen no exceda el ancho del contenedor en dispositivos más pequeños */
    .izquierda img, .derecha img {
        max-width: 100%;
        height: auto;
    }

    .imagen img {
        max-width: 100%;
        height: auto;
    }

    /* Ajuste para la sección con la clase .container en dispositivos más pequeños */
    .container {
        flex-direction: column; /* Cambia la dirección del contenedor a columna */
    }

    #izquierda, #derecha {
        flex: 100%; /* Ocupa el 100% del ancho en dispositivos más pequeños */
        padding: 10px; /* Ajusta el espaciado interno en dispositivos más pequeños */
    }
}


  </style>

</head>
<body>

    <!-- Imagen principal -->
    <img class="imagen-principal" src="img/tehua.jpg" alt="Descripción de la imagen principal">

    <!-- Sección dividida en dos -->
    <div class="contenedor">
        <!-- Parte izquierda con imagen -->
        <div class="izquierda">
            <img src="img/logo.png" alt="Descripción de la imagen izquierda">
        </div>
        <!-- Parte derecha con información -->
        <div class="derecha">
            <h2 align="center">¿Quiénes Somos?</h2>
            <p align="center">Somos apasionados por la creación de experiencias gastronómicas inolvidables. En el corazón de Tehuacán, nos enorgullece ser los creadores del Crunch Chicken, un lugar donde la calidad, la pasión y la conveniencia se unen para ofrecer momentos deliciosos a nuestros clientes. Desde nuestro humilde comienzo hasta convertirnos en un destino gastronómico querido, hemos cultivado un compromiso inquebrantable con la frescura de los ingredientes, la artesanía en cada preparación y la satisfacción de nuestros clientes.</p>
        </div>
    </div>

    <div class="container">
  <div id="izquierda">
    <!-- Contenido de la sección izquierda -->
    <h2 align="center">Misión</h2>
    <p align="center">Ser la elección preferida de los amantes del Crunch Chicken en Tehuacán, ofreciendo no solo un delicioso pollo crujiente, sino también una experiencia de servicio excepcional. Nos esforzamos por satisfacer los paladares más exigentes, proporcionando opciones de recogida en el establecimiento y entrega a domicilio, garantizando la frescura y calidad de nuestros productos.</p>
  </div>

  <div id="derecha">
    <!-- Contenido de la sección derecha -->
    <h2 align="center">Visión</h2>
    <p align="center">Convertirnos en el referente indiscutible de Crunch Chicken en Tehuacán, destacando por la innovación en nuestro menú y la excelencia en el servicio. Aspiramos a ser reconocidos como el lugar donde la pasión por el pollo crujiente se encuentra con la comodidad, brindando alegría a nuestros clientes en cada bocado.</p>
  </div>
</div>

<div id="compromiso">
  <!-- Contenido del nuevo contenedor -->
  <h2 align="center">Compromiso con la Calidad</h2>
  <p align="center">En Crunch Chicken, nuestra obsesión por la calidad es evidente en cada etapa, desde la selección de los ingredientes frescos hasta la preparación de cada plato. Nos comprometemos a brindar a nuestros clientes una experiencia gastronómica que destaque por su sabor auténtico y la integridad de los ingredientes.</p>
</div>

<div class="imagen">
<img src="ico/logo.png" alt="Crunch Chicken">
</div>

<?php include 'footer.php';?>

</body>
</html>
