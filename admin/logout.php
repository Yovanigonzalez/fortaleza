<?php
session_start();
session_destroy();
header("Location: ../job/login.php"); // Puedes redirigir a la página de inicio o a cualquier otra página después de cerrar sesión
exit();
?>
