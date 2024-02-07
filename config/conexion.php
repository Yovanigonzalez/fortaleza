<?php
// Establecer conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crunch";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
