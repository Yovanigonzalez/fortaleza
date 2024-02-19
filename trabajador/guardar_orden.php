<?php
include '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario POST
    $id = $_POST['id'];
    $numero_folio = $_POST['numero_folio'];
    $descripcion_nueva = $_POST['descripcion'];
    $total_nuevo = $_POST['nuevoTotal'];  // Modificado para obtener 'nuevoTotal' en lugar de 'total'
    $fecha_hora = $_POST['fecha_hora'];
    $mesa = $_POST['mesa'];

    // Recuperar precios de productos del formulario POST
    $precios_productos_nuevos = $_POST['precios_productos'];

    // Obtener la descripción actual y los precios actuales de la base de datos
    $selectDescripcionSQL = "SELECT descripcion, total, precios_productos FROM ventas WHERE id = '$id'";
    $resultDescripcion = $conn->query($selectDescripcionSQL);

    if ($resultDescripcion->num_rows > 0) {
        $rowDescripcion = $resultDescripcion->fetch_assoc();

        // Obtener la descripción actual, el total actual y los precios actuales
        $descripcion_actual = $rowDescripcion['descripcion'];
        $precios_productos_actuales = json_decode($rowDescripcion['precios_productos'], true);

        // Agregar la nueva descripción solo si hay una descripción actual
        if (!empty($descripcion_actual)) {
            $descripcion_nueva = $descripcion_actual . ', ' . $descripcion_nueva;
        }

        // Combinar los precios actuales con los nuevos precios
        $precios_productos_combinados = array_merge($precios_productos_actuales, $precios_productos_nuevos);

        // Codificar el nuevo conjunto de precios
        $precios_productos_combinados_json = json_encode($precios_productos_combinados);
    } else {
        // Si no hay datos actuales, simplemente usar los nuevos
        $descripcion_actual = $descripcion_nueva;
        $precios_productos_combinados_json = json_encode($precios_productos_nuevos);
    }

    // Actualizar total, descripción y precios en la base de datos
    $updateOrdenSQL = "UPDATE ventas SET total = '$total_nuevo', descripcion = '$descripcion_nueva', precios_productos = '$precios_productos_combinados_json' WHERE id = '$id'";

    if ($conn->query($updateOrdenSQL) === TRUE) {
        // Éxito al actualizar la orden en la base de datos
        echo "Orden actualizada con éxito. Nuevo total: $total_nuevo";
    } else {
        // Error al actualizar la orden
        echo "Error al actualizar la orden: " . $conn->error;
    }

    // Cierra la conexión
    $conn->close();
}
?>
