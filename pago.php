<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>

    .main-container {
      background-color: #fff;
      padding: 10px; /* Adjust the padding for a more compact layout */
      max-width: 800px; /* Adjust the maximum width as needed */
      margin: 0 auto; /* Center the container horizontally */
      border-radius: 20px;

    }

    .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px; /* Keep the padding for the inner container */
    }

    .text-container {
      flex: 1;
      padding-right: 20px;
    }

    .image-container {
      flex: 1;
      text-align: right;
    }

    img {
      max-width: 100%;
      height: auto;
    }

    .payment-container {
      padding: 10px; /* Adjust the padding for a more compact layout */
      background-color: #fff;
      
    }

    .payment-text {
      text-align: center;
    }

    .methods-payments img {
      max-width: 50px;
      height: auto;
      margin: 5px;
    }
  </style>
</head>

<body>

  <div class="main-container">
    <div class="container">
      <div class="text-container">
        <h2>Todas tus compras son seguras</h2>
        <p align="justify">En Pollo Crunch Chicken, te ofrecemos no solo un delicioso pollo crujiente, sino también una experiencia de servicio excepcional
            una experiencia única, mientras disfrutas de la comodidad y seguridad de pagar 
            con Mercado Pago.</p>
      </div>

      <div class="image-container">
        <img src="img/pago.png" alt="Imagen de ejemplo">
      </div>
    </div>

    <div class="payment-container">
      <div class="payment-text">
        <h2>Mercado pago admite pagos mediante</h2>
        <div class="methods-payments">
          <img src="assets/client/icons/visa-logo.png" alt="">
          <img src="assets/client/icons/mastercard-icon.png" alt="">
          <img src="assets/client/icons/oxxo-icon.png" alt="">
          <img src="assets/client/icons/mercado-credito-icon.jpg" alt="">
        </div>
      </div>
    </div>
  </div>

</body>

</html>
