<?php
    $access_token = 'APP_USR-1284769423586146-080718-c472a8d4d000684be31be6fee54e2737-276472941'; // Reemplaza con tu token de acceso de MercadoPago

// Conexión a la base de datos (ajusta los valores según tu configuración)
include '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se ha enviado un total desde el formulario
    if (isset($_POST["totalAmount"], $_POST["nombre"], $_POST["telefono"], $_POST["direccion"], $_POST["precio"])) {
        // Recoge los datos del formulario
        $customerName = $_POST["nombre"];
        $customerPhoneNumber = $_POST["telefono"];
        $customerAddress = $_POST["direccion"];
        $total = intval($_POST["totalAmount"]);
        $productPrice = floatval($_POST["precio"]); // Asegura que el precio sea un número flotante

        // Inserta los datos en la base de datos
        $sql = "INSERT INTO compras (customer_name, customer_phone_number, customer_address, total_amount, product_price)
                VALUES ('$customerName', '$customerPhoneNumber', '$customerAddress', $total, $productPrice)";

        if ($conn->query($sql) === TRUE) {
            // Crea la preferencia de pago en MercadoPago
            $data = array(
                "items" => array(
                    array(
                        'title' => 'Producto',
                        'quantity' => 1,
                        'currency_id' => 'MXN',
                        'unit_price' => $productPrice
                    )
                ),
                "back_urls" => array(
                    "success" => "URL_DE_EXITO",
                    "failure" => "URL_DE_ERROR",
                    "pending" => "URL_DE_PENDIENTE"
                )
            );

            // Realiza la solicitud a la API de MercadoPago
            $ch = curl_init("https://api.mercadopago.com/checkout/preferences");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . $access_token));
            $response = curl_exec($ch);

            if ($response === false) {
                echo "Error en la solicitud cURL: " . curl_error($ch);
            } else {
                $response_data = json_decode($response, true);
                if (isset($response_data["init_point"])) {
                    // Redirige al usuario a la página de pago de MercadoPago
                    header("Location: " . $response_data["init_point"]);
                    exit;
                } else {
                    echo "Error al crear el enlace de pago de MercadoPago.";
                }
            }

            curl_close($ch);
        } else {
            echo "Error al insertar datos en la base de datos: " . $conn->error;
        }
    } else {
        echo "Faltan parámetros en la solicitud.";
    }
} else {
    echo "Acceso no válido.";
}

// Cierra la conexión a la base de datos al finalizar el script
$conn->close();
?>
