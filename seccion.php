<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/client/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Enlace a Bootstrap Icons CDN -->

    <title>Pollos La Fortaleza | Contacto</title>

    <style>
        /* Estilos para el contenedor principal */
        .contenedor-principal {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            text-align: center;
        }

        /* Estilos para la imagen principal */
        .imagen-principal {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Estilos para el SVG */
        .svg-personalizado {
            width: 100%;
            height: auto;
            margin: 0;
            margin-top: -143px;
        }

        /* Estilos para la sección con fondo de color */
        .seccion-colorida {
            background-color: #fff;
            padding: 20px;
            color: #ffffff;
            margin-top: -5px;
        }

        /* Estilos para las columnas */
        .columna-personalizada {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            margin-bottom: 20px;
        }

        /* Estilos para el texto dentro de la sección colorida */
        .seccion-colorida .columna-personalizada p {
            color: #fff;
        }

        /* Estilos para la imagen dentro del contenedor circular */
        .contenedor-circular img {
            width: 100%;
            height: auto;
        }

        /* Estilos para la nueva sección con el segundo SVG */
        #segundo-svg-personalizado {
            text-align: center;
            margin-top: -1px;
        }

        /* Sección 3 */

        /* Estilos para la nueva sección dividida en dos columnas */
        .nueva-seccion-dos-columnas {
            display: flex;
            flex-direction: column;
            margin-top: -41px;
        }

        /* Estilos para las columnas dentro de la nueva sección */
        .nueva-seccion-dos-columnas .columna-personalizada {
            width: 100%;
            margin-bottom: 20px;
        }

        /* Estilos para la imagen con el identificador 'imagen-contacto-personalizada' */
        #imagen-contacto-personalizada {
            width: 65%;
            height: auto;
            border-radius: 10px;
        }

        #fullWidthImage {
            width: 100%;
            height: auto;
            display: block;
        }

        /* Estilos responsivos para pantallas más pequeñas */
        @media (min-width: 768px) {
            .nueva-seccion-dos-columnas {
                flex-direction: row;
            }

            .nueva-seccion-dos-columnas .columna-personalizada {
                width: 48%;
            }
        }
    </style>
</head>
<body>

<!-- Sección con fondo de color y columnas -->
<div class="seccion-colorida contenedor-principal">
    <!-- Columna izquierda con texto -->
    <div class="columna-personalizada">
        <p align="justify" style="color:#333;">¡Bienvenidos a Pollos La Fortaleza, donde la magia de nuestro Crunch transforma cada bocado en una explosión de sabor que no podrás olvidar! En el corazón de Tehuacán, Puebla, somos los creadores de una experiencia gastronómica única que fusiona la pasión por la calidad con la comodidad de lo delicioso.</p>
        <br>
        <p align="justify" style="color:#333;">Descubre el auténtico arte del sabor en Tehuacán con Pollos La Fortaleza: ¡Sumérgete en el placer crujiente y saborea la delicia de nuestro pollo perfectamente dorado hasta el último bocado! 🍗✨ #ExperienciaPolloFortaleza</p>
    </div>
    <!-- Columna derecha con un círculo blanco y la imagen -->
    <div class="columna-personalizada">
        <div class="contenedor-circular">
            <img src="ico/logo.png" alt="Descripción de la imagen">
        </div>
    </div>
</div>

</body>
</html>
