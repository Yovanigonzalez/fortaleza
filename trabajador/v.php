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

// Obtener el número de folio de la solicitud POST
$numeroFolio = $_POST['numeroFolio'];

// Obtener los datos de la venta de la solicitud POST
$descripcion = $_POST['descripcion'];
$total = $_POST['total'];
// Obtener la mesa de la solicitud POST o establecerla en '0' si no se proporciona
$mesa = isset($_POST['mesa']) ? $_POST['mesa'] : '0';
$preciosProductos = $_POST['preciosProductos']; // Precios individuales de los productos

// Convertir el array de precios a formato JSON para almacenar en la base de datos
$preciosProductosJSON = json_encode($preciosProductos);

// Crear una consulta SQL para insertar la venta en la base de datos
$sqlInsertarVenta = "INSERT INTO ventas (numero_folio, descripcion, total, fecha_hora, mesa, precios_productos) VALUES ('$numeroFolio', '$descripcion', $total, '$fechaHora', '$mesa', '$preciosProductosJSON')";

// Crear una consulta SQL para actualizar el estatus de la mesa a 'ocupado'
$sqlActualizarMesa = "UPDATE mesa SET estatus = 'ocupado' WHERE numero_mesa = '$mesa'";

// Iniciar una transacción para asegurar la integridad de los datos
$conn->begin_transaction();

try {
    // Insertar la venta en la tabla de ventas
    $conn->query($sqlInsertarVenta);

    // Actualizar el estatus de la mesa a 'ocupado'
    $conn->query($sqlActualizarMesa);

    // Confirmar la transacción
    $conn->commit();
} catch (Exception $e) {
    // Revertir la transacción en caso de error
    $conn->rollback();
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
