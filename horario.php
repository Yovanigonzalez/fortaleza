<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Sitio</title>
    <style>
        /* Estilos generales */
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .icono {
            flex: 1;
            text-align: center;
        }

        .horario {
            flex: 1;
            color: red;
        }

        /* Estilo adicional para el ícono */
        .icono lord-icon {
            width: 250px;
            height: 250px;
        }

        /* Media query para pantallas más pequeñas */
        @media only screen and (max-width: 768px) {
            .container {
                flex-direction: column-reverse;
                text-align: center;
            }

            .icono lord-icon {
                width: 150px;
                height: 150px;
            }

            .horario {
                margin-top: 20px;
            }
        }
    </style>

</head>
<body>

<div class="container">
    <div class="icono">
        <img id="imagen-contacto" src="img/r.png" alt="Descripción de la imagen">
    </div>
    <div class="horario" id="horario">
        <h2>Horario de Atención</h2>
        <br>
        <p><strong>Lunes a Domingo:</strong> 10:00 am - 6:00 pm</p>
        <p id="estado"></p>
        <p class="cuenta-regresiva" id="cuenta-regresiva"></p>
        <script>
            // Obtiene el día actual
            var diaActual = new Date().getDay();
            // Obtiene la hora actual del sistema
            var horaActual = new Date().getHours();
            var minutosActual = new Date().getMinutes();

            // Define el horario de atención
            var horarioInicio = 10;
            var horarioFin = 18;

            // Compara el día actual y la hora actual con el horario de atención
            if (diaActual >= 1 && diaActual <= 7 && horaActual >= horarioInicio && horaActual < horarioFin) {
                document.getElementById('estado').textContent = 'Abierto';
                document.querySelector('.horario').classList.add('abierto'); // Agrega la clase "abierto"
                document.querySelector('.horario').style.color = '#333'; // Cambia el color del texto a #333
            } else {
                document.getElementById('estado').textContent = 'Por el momento el establecimiento de Pollos la Fortaleza Chicken Tehuacán se encuentra cerrado. Recuerden que ofrecemos servicio a domicilio.';

                // Calcula el tiempo restante para abrir
                var minutosRestantes = ((horarioInicio * 60 + minutosActual) - (horaActual * 60 + minutosActual));
                var segundosRestantes = minutosRestantes * 60;

                // Muestra la cuenta regresiva
                var cuentaRegresivaElement = document.getElementById('cuenta-regresiva');
                cuentaRegresivaElement.textContent = 'Abrirá en: ' + formatarTiempo(segundosRestantes);

                // Inicia el temporizador
                var temporizador = setInterval(function () {
                    segundosRestantes--;
                    cuentaRegresivaElement.textContent = 'Abrirá en: ' + formatarTiempo(segundosRestantes);

                    // Si el tiempo llega a cero, detén el temporizador
                    if (segundosRestantes <= 0) {
                        clearInterval(temporizador);
                        cuentaRegresivaElement.textContent = '';
                    }
                }, 1000);

                // Función para formatear el tiempo en formato HH:MM:SS
                function formatarTiempo(segundos) {
                    var horas = Math.floor(segundos / 3600);
                    var minutos = Math.floor((segundos % 3600) / 60);
                    var segundosRestantes = segundos % 60;

                    return (
                        (horas < 10 ? '0' : '') + horas + ':' +
                        (minutos < 10 ? '0' : '') + minutos + ':' +
                        (segundosRestantes < 10 ? '0' : '') + segundosRestantes
                    );
                }
            }
        </script>
    </div>
</div>

</body>
</html>
