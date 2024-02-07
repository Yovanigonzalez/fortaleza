<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fortaleza | Agregar Usuarios</title>
    <link rel="shortcut icon" type="image/x-icon" href="../log/ico.png">
    <meta name="description" content="Descripción de tu sitio web">
    <meta name="keywords" content="fortaleza, sitio web, ejemplo">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-Z2mU9ZckH3vJ8J1l7Z5Mz5l1TZw4E1KecE2lSZ/Kz55Jz1k3T9I71bIAsj9gPzR5" crossorigin="anonymous">

</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container-fluid">
                <br>

                <!-- Formulario de Agregar Usuario -->
                <div class="card">
                    <div class="card-body">
                    <?php
                        // Verifica si hay un mensaje en la URL
                        if (isset($_GET['mensaje'])) {
                            $mensaje = $_GET['mensaje'];

                            if ($mensaje === 'exito') {
                                echo '<p style="color: green;">Usuario agregado exitosamente.</p>';
                            } elseif ($mensaje === 'error') {
                                // Verifica si hay un detalle de error en la URL
                                $detalle = isset($_GET['detalle']) ? $_GET['detalle'] : 'Error desconocido.';
                                echo '<p style="color: red;">Error al agregar el usuario. Detalle: ' . $detalle . '</p>';
                            } elseif ($mensaje === 'duplicado') {
                                echo '<p style="color: red;">Error: Ya existe un usuario con el mismo correo electrónico.</p>';
                            }
                        } else {
                            // Si no hay un mensaje en la URL, muestra un mensaje predeterminado o redirige según sea necesario
                            echo '<p></p>';
                        }
                        ?>

                        <form action="procesar_formulario.php" method="post">
                            <h1 align="center">Agregar Usuarios</h1>
                            <br>
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono:</label>
                                <input type="text" class="form-control" id="telefono" name="telefono">
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo:</label>
                                <input type="email" class="form-control" id="correo" name="correo">
                            </div>
                            <div class="form-group">
                                <label for="contrasena">Contraseña:</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="contrasena" name="contrasena">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="showPasswordToggle" onclick="togglePassword()">Mostrar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="rol">Rol:</label>
                                <select class="form-control" id="rol" name="rol">
                                    <option>Selecciona el rol</option>
                                    <option value="admin">Administrador</option>
                                    <option value="super">Superusuario</option>
                                    <option value="job">Trabajador</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success" style="background-color: #2196F3; border-color: #2196F3;">Guardar</button>
                        </form>
                    </div>
                </div>

                <br>
                <!-- Enlaces a jQuery, Popper.js y Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                <script>
                    function togglePassword() {
                        var passwordField = document.getElementById("contrasena");
                        var showPasswordToggle = document.getElementById("showPasswordToggle");

                        if (passwordField.type === "password") {
                            passwordField.type = "text";
                            showPasswordToggle.textContent = "Ocultar";
                        } else {
                            passwordField.type = "password";
                            showPasswordToggle.textContent = "Mostrar";
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</body>
</html>
