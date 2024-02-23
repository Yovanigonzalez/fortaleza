<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        .container {
            display: flex;
            width: 100%;
        }

        .left-section {
            flex: 1;
            padding: 20px;
            text-align: center;
        }

        .right-section {
            flex: 1;
            display: flex;
            flex-direction: column;  /* Cambio a dirección de columna */
            align-items: center;
            padding: 20px;
        }

        .rectangle {
            width: 351px;
            height: 51px;
            flex-shrink: 0;
            border-radius: 50px;
            background: #911D1D;
            margin-bottom: 10px; /* Espacio entre rectángulos */
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;  /* Color del texto */
        }

                /* Media query para pantallas más pequeñas */
                @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;  /* Cambiar a dirección de columna en pantallas pequeñas */
            }

            .rectangle {
            width: 100%; /* Ancho del 100% en pantallas más pequeñas */
            max-width: 300px; /* O ajusta según tus necesidades */
            margin-right: 0; /* Puedes ajustar el margen derecho según tus necesidades */
            margin-bottom: 10px; /* Espacio entre rectángulos */
        }

            .left-section,
            .right-section {
                flex: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-section">
            <br>
            <p>¿Entrega a domicilio o vienes por él?</p>
        </div>
        <div class="right-section">
            <div class="rectangle"><p>Entrega a Domicilio</p></div>
            <div class="rectangle"><p>Puede recoger en Tienda</p></div>
        </div>
    </div>
</body>
</html>