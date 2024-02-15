<?php
// Conexión a la base de datos (reemplaza con tus propios valores)
include '../config/conexion.php';

// Establecer la zona horaria a GMT-6 (Hora Central de México)
date_default_timezone_set('America/Mexico_City');

// Obtener la fecha y hora actual en formato deseado
$fechaHora = date('Y-m-d H:i:s'); // Formato: Año-Mes-Día Hora:Minutos:Segundos

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos de la venta de la solicitud POST
$numeroFolio = $_POST['numeroFolio'];
$descripcion = $_POST['descripcion'];
$total = $_POST['total'];
$mesa = $_POST['mesa']; // Agrega el campo 'mesa' a los datos obtenidos de la solicitud POST

// Crear una consulta SQL para insertar la venta en la base de datos
$sql = "INSERT INTO ventas (numero_folio, descripcion, total, fecha_hora, mesa) VALUES ('$numeroFolio', '$descripcion', $total, '$fechaHora', '$mesa')";

if ($conn->query($sql) === TRUE) {
    echo "Venta registrada con éxito.";
} else {
    echo "Error al registrar la venta: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
