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

    <style>
        .alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
}
    </style>
</head>

<?php include 'menu.php'; ?>

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

                        <h4 align="center">Editar Usuario</h4>

                        <?php
 
 include '../config/conexion.php';

                        // Verificar la conexión
                        if ($conn->connect_error) {
                            die("Conexión fallida: " . $conn->connect_error);
                        }

                        // Obtener el ID del usuario a editar
                        $id = $_GET['id'];

                        // Consulta para obtener los datos del usuario específico
                        $sql = "SELECT * FROM usuarios WHERE id = $id";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Mostrar el formulario de edición con los datos existentes
                            $row = $result->fetch_assoc();
                            ?>
                            <form action="actualizar.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                
                                <div class="form-group">
                                    <label for="nombre_usuario">Nombre de Usuario:</label>
                                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" value="<?php echo $row['nombre_usuario']; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="telefono">Teléfono:</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $row['telefono']; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="correo">Correo:</label>
                                    <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $row['correo']; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="rol">Rol:</label>
                                    <select class="form-control" id="rol" name="rol">
                                    <option>Selecciona un rol</option>
                                        <option value="admin" <?php echo ($row['rol'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                        <option value="super" <?php echo ($row['rol'] == 'super') ? 'selected' : ''; ?>>Super</option>
                                        <option value="job" <?php echo ($row['rol'] == 'job') ? 'selected' : ''; ?>>Job</option>
                                    </select>
                                </div>
                                
                                <!-- Agrega más campos según tus necesidades -->
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </form>
                            <?php
                        } else {
                            echo "Usuario no encontrado.";
                        }

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
