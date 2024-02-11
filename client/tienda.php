<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crunch Chicken | Menu</title>
  <link rel="stylesheet" href="../css/banner.css">

  <style>
    .contenedor {
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      margin: 0;
      background: #911D1D;
      height: 288px;
    }

    .circle-container {
      width: 200px;
      height: 200px;
      overflow: hidden;
      border-radius: 50%;
      background-color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 20px;
    }

    .imagen {
      max-width: 70%;
      max-height: 100%;
      border-radius: 50%;
    }

    .texto {
      max-width: 500px;
      margin-left: 20px;
      color: #fff;
    }

    h1 {
      color: #fff;
      text-align: center;
      font-family: 'Montserrat', sans-serif;
      font-size: 30px;
      font-weight: 700;
      margin: 0;
    }

    h4 {
      color: #fff;
      text-align: center;
      font-family: 'Montserrat', sans-serif;
      font-size: 17px;
      font-weight: 400;
      line-height: normal;
      margin: 0;
    }

    /* Estilos del SVG */
    svg {
      width: 100%;
      height: auto;
      margin-top: -30px;
    }

    @media screen and (max-width: 768px) {
      .contenedor {
        flex-direction: column;
        height: auto;
      }

      .circle-container {
        width: 100%;
        max-width: 200px;
        margin: 0 auto 20px;
      }

      .texto {
        margin: 20px 0;
      }

      .banner {
        flex-direction: column;
      }

      .banner img {
        max-width: 100%;
      }

            /* Estilos del SVG para responsivo */
            svg {
        width: 100%;
        height: auto;
        margin-top: -5px;
      }

    }

    
  </style>

</head>
<body>

<div class="contenedor">
    <div class="texto">
        <h1>CRUNCH CHICKEN<br> TEHUACAN </h1>
        <br>
        <h4>Queridos amantes del Crunch Chicken en Tehuacán,
            Si realizan pagos o transferencias, les pedimos amablemente subir una foto del comprobante. De esta manera, podremos enviarles su delicioso pollo crujiente. En caso de que prefieran recogerlo personalmente, les solicitamos traer su comprobante al establecimiento.
        </h4>
    </div>

    <div class="circle-container">
        <img class="imagen" src="../ico/logo.png" alt="Logo de Distribuidora">
    </div>
</div>


<!-- SVG sin estilos en línea -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 965 125" fill="none">
  <path fill-rule="evenodd" clip-rule="evenodd" d="M0 83.3333L40.2083 74.0741C80.4167 64.8148 160.833 46.2963 241.25 53.2407C321.667 60.1852 402.083 92.5926 482.5 99.537C562.917 106.481 643.333 87.963 723.75 87.963C804.167 87.963 884.583 106.481 924.792 115.741L965 125V0H924.792C884.583 0 804.167 0 723.75 0C643.333 0 562.917 0 482.5 0C402.083 0 321.667 0 241.25 0C160.833 0 80.4167 0 40.2083 0H0V83.3333Z" fill="#911D1D"/>
</svg>

<?php include '../cosa.php'; ?>

<?php include 'botones.php'; ?>
</body>
</html>
