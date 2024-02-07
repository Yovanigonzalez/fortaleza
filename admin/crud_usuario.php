<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fortaleza | CRUD Usuarios</title>
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
                <div class="card">
                    <div class="card-body">
                    <?php
                        // Mostrar mensaje de éxito o error
                        if (isset($_GET['success'])) {
                            echo '<div class="alert alert-success" role="alert">' . $_GET['success'] . '</div>';
                        } elseif (isset($_GET['error'])) {
                            echo '<div class="alert alert-danger" role="alert">' . $_GET['error'] . '</div>';
                        }
                        ?>
                        
                        <h4 align="center">Lista de Usuarios (Trabajadores/Admin/Super Admin)</h4>

                        <?php

include '../config/conexion.php';

                        // Verificar la conexión
                        if ($conn->connect_error) {
                            die("Conexión fallida: " . $conn->connect_error);
                        }

                        // Consulta para obtener datos de la tabla 'usuarios'
                        $sql = "SELECT * FROM usuarios";
                        $result = $conn->query($sql);

                        // Mostrar los datos en una tabla
                        echo "<div class='table-responsive'>
                                <table class='table table-bordered'>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre de Usuario</th>
                                            <th>Teléfono</th>
                                            <th>Correo</th>
                                            <th>Rol</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>";

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['nombre_usuario']}</td>
                                    <td>{$row['telefono']}</td>
                                    <td>{$row['correo']}</td>
                                    <td>{$row['rol']}</td>
                                    <td>
                                        <a href='editar.php?id={$row['id']}' class='btn btn-primary btn-sm'>Editar</a>
                                        <a href='eliminar.php?id={$row['id']}' class='btn btn-danger btn-sm'>Eliminar</a>
                                    </td>
                                </tr>";
                        }

                        echo "</tbody></table></div>";

                        // Cerrar conexión
                        $conn->close();
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enlaces a jQuery, Popper.js y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
