<?php
include '../config/conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID del usuario a eliminar
$id = $_GET['id'];

// Mostrar una confirmación con JavaScript
echo "<script>
        var confirmacion = confirm('¿Estás seguro de que deseas eliminar este usuario?');
        if (confirmacion) {
            // Si el usuario confirma, redirigir y eliminar
            window.location.href = 'eliminar_confirmado.php?id=$id';
        } else {
            // Si el usuario cancela, regresar a editar.php
            window.location.href = 'crud_usuario.php';
        }
      </script>";

// No es necesario cerrar la conexión aquí, ya que no se llega a ejecutar el código PHP después de la redirección
?>
