<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .menu-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: flex-start;
    }

    .menu-column {
      width: 287px; /* Ajusta el ancho del menú según tus necesidades */
      height: 542px;
      flex-shrink: 0;
      border-radius: 0px 145px 145px 0px;
      background: #911D1D;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      color: #FFF;
    }

    .menu-item {
      width: 75%;
      height: 42px;
      flex-shrink: 0;
      border-radius: 50px;
      background: #FFF;
      margin-top: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #911D1D;
      text-decoration: none;
    }

    .product-container {
      width: 283px;
      height: 414px;
      flex-shrink: 0;
      border-radius: 10px;
      background: #911D1D;
      margin: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      color: #FFF;
      display: none;
    }

    .active-product {
      display: flex;
    }

    .product-image {
      width: 100%;
      height: auto;
      border-radius: 10px 10px 0 0;
    }

    .product-text {
      text-align: center;
      padding: 10px;
    }

    .buy-button {
      width: 116px;
      height: 33px;
      flex-shrink: 0;
      border-radius: 50px;
      background: #FFF;
      margin-top: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #911D1D;
      text-decoration: none;
    }

    .menu-item:hover,
    .buy-button:hover {
      background: #911D1D;
      color: #FFF;
    }

    .menu-item:active,
    .buy-button:active {
      transform: scale(0.95);
    }

    .menu-container + .menu-container {
      margin-left: 20px;
    }

    #menu-title {
      font-size: 24px;
      margin-bottom: 20px;
      color: #FFF;
    }

    .product-image {
      width: 54%;
      height: auto;
      border-radius: 100px;
      object-fit: cover;
    }

      /* Estilos para pantallas más pequeñas (ejemplo: hasta 600px) */
  @media screen and (max-width: 600px) {
    .menu-container {
      justify-content: center;
    }

    .menu-column {
      width: 100%; /* O ajusta el ancho que prefieras para pantallas más pequeñas */
      border-radius: 0;
      margin-bottom: 20px;
    }

    .menu-container + .menu-container {
      margin-left: 0;
    }

    .product-container,
    .product-image {
      width: 100%;
      border-radius: 0;
    }
  }
  
  </style>
</head>
<body>

<div class="menu-container">
  <div class="menu-column">
    <div id="menu-title">MENÚ</div>
    <a class="menu-item" >Paquetes Clasicos</a>
    <a class="menu-item" >Combos</a>
    <a class="menu-item" >Entradas</a>
    <a class="menu-item" >Postres / Tortas</a>
    <a class="menu-item" >Menú Infantil</a>
    <a class="menu-item" >Bebidas</a>
  </div>


</body>
</html>