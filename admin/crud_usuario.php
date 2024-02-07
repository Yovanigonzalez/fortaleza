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
                        <h4 align="center">Lista de Usuarios (Trabajadores/Admin/Super Admin)</h4>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Correo</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include '../config/conexion.php';

                                        $sql = "SELECT * FROM usuarios";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                        <td>{$row['id']}</td>
                                                        <td>{$row['nombre_usuario']}</td>
                                                        <td>{$row['telefono']}</td>
                                                        <td>{$row['correo']}</td>
                                                        <td>{$row['rol']}</td>
                                                        <td>
                                                            <a href='#' class='btn btn-info btn-sm editar-btn' data-toggle='modal' data-target='#editarUsuarioModal' data-id='{$row['id']}' data-nombre='{$row['nombre_usuario']}' data-telefono='{$row['telefono']}' data-correo='{$row['correo']}' data-rol='{$row['rol']}'><i class='fas fa-edit'></i> Editar</a>
                                                            <a href='#' class='btn btn-danger btn-sm eliminar-btn' data-toggle='modal' data-target='#eliminarUsuarioModal' data-id='{$row['id']}' data-nombre='{$row['nombre_usuario']}'><i class='fas fa-trash'></i> Eliminar</a>
                                                        </td>
                                                    </tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='6'>No hay usuarios</td></tr>";
                                        }

                                        $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Edición -->
    <div class="modal fade" id="editarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarUsuarioModalLabel">Editar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formEditarUsuario">
                        <div class="form-group">
                            <label for="editNombreUsuario">Nombre:</label>
                            <input type="text" class="form-control" id="editNombreUsuario" name="editNombreUsuario" required>
                        </div>
                        <div class="form-group">
                            <label for="editTelefono">Teléfono:</label>
                            <input type="text" class="form-control" id="editTelefono" name="editTelefono" required>
                        </div>
                        <div class="form-group">
                            <label for="editCorreo">Correo:</label>
                            <input type="email" class="form-control" id="editCorreo" name="editCorreo" required>
                        </div>
                        <div class="form-group">
                            <label for="editRol">Rol:</label>
                            <input type="text" class="form-control" id="editRol" name="editRol" required>
                        </div>
                        <input type="hidden" id="editUserID" name="editUserID">
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Eliminación -->
    <div class="modal fade" id="eliminarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="eliminarUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminarUsuarioModalLabel">Eliminar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar al usuario <span id="eliminarUserName"></span>?</p>
                    <input type="hidden" id="eliminarUserID" name="eliminarUserID">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" onclick="eliminarUsuario()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Enlaces a jQuery, Popper.js y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script para manejar la edición y eliminación -->
    <script>
        $(document).ready(function(){
            $('.editar-btn').click(function() {
                var id = $(this).data('id');
                var nombre = $(this).data('nombre');
                var telefono = $(this).data('telefono');
                var correo = $(this).data('correo');
                var rol = $(this).data('rol');

                $('#editUserID').val(id);
                $('#editNombreUsuario').val(nombre);
                $('#editTelefono').val(telefono);
                $('#editCorreo').val(correo);
                $('#editRol').val(rol);
            });

            $('.eliminar-btn').click(function() {
                var id = $(this).data('id');
                var nombre = $(this).data('nombre');

                $('#eliminarUserID').val(id);
                $('#eliminarUserName').text(nombre);
            });

            // Función para manejar el envío del formulario de edición
            $('#formEditarUsuario').submit(function(e) {
                e.preventDefault();
                // Aquí puedes agregar lógica para enviar el formulario por AJAX o realizar una petición al servidor para actualizar los datos
                // Después de la actualización, cierra el modal
                $('#editarUsuarioModal').modal('hide');
            });

            function eliminarUsuario() {
                var userID = $('#eliminarUserID').val();
                // Aquí puedes agregar lógica para enviar una solicitud al servidor para eliminar al usuario con el ID especificado
                // Después de la eliminación, cierra el modal
                $('#eliminarUsuarioModal').modal('hide');
            }
        });
    </script>
    
</body>
</html>
