<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>10 Cuadros</title>
  <style>
    /* Estilo básico para los cuadros */
    body {
      text-align: center;
    }

    .cuadro {
      width: 220px; /* Ancho fijo para todos los cuadros */
      padding: 10px;
      margin: 10px;
      border: 1px solid #ddd;
      text-align: center;
      display: inline-block;
    }

    /* Estilo para la imagen */
    .cuadro img {
      width: 200px; /* Ancho fijo para todas las imágenes */
      height: 150px; /* Altura fija para todas las imágenes, ajusta según sea necesario */
      object-fit: cover; /* Ajusta el comportamiento de la imagen para mantener la proporción */
      display: block; /* Elimina espacios debajo de la imagen */
      margin: auto; /* Centra la imagen horizontalmente */
    }

    /* Estilo para el botón */
/* Estilo para el botón modificado */
.comprar-btn {
  background-color: #911D1D;
  color: #fff;
  padding: 10px 20px; 
  text-decoration: none;
  display: inline-block;
  margin-top: 10px;
  border-radius: 20px;
}

  </style>
</head>
<body>
    
  <!-- Creación de los 10 cuadros con imagen, descripción y botón "comprar" -->
  <div class="cuadro">
  <img class="imagen" src="../food/pollo.jpg">
    <p>Pollos</p>
    <a href="pollo.php" class="comprar-btn">¡Ordénalo ahora!</a>
  </div>

  <div class="cuadro">
  <img class="imagen" src="../food/pollo.jpg">
    <p>Pollos Especiales</p>
    <a href="pollos_especiales.php" class="comprar-btn">¡Ordénalo ahora!</a>
  </div>

  <div class="cuadro">
  <img class="imagen" src="../food/pollo combo.jpeg">
    <p>Pollos Combos</p>
    <a href="pollos_combos.php" class="comprar-btn">¡Ordénalo ahora!</a>
  </div>

  <div class="cuadro">
  <img class="imagen" src="../food/alitas.jpg">
    <p>Alitas</p>
    <a href="alitas.php" class="comprar-btn">¡Ordénalo ahora!</a>
  </div>

  <div class="cuadro">
  <img class="imagen" src="../food/tenders.jpg">
    <p>Tenders</p>
    <a href="tenders.php" class="comprar-btn">¡Ordénalo ahora!</a>
  </div>

  <div class="cuadro">
  <img class="imagen" src="../food/crepas.jpg">
    <p>Crepas</p>
    <a href="crepas.php" class="comprar-btn">¡Ordénalo ahora!</a>
  </div>

  <div class="cuadro">
  <img class="imagen" src="../food/HAMBUERGESA.jpg">
    <p>Hamburgesas</p>
    <a href="hamburgesas.php" class="comprar-btn">¡Ordénalo ahora!</a>
  </div>

  <div class="cuadro">
  <img class="imagen" src="../food/COSTILLA.jpg">
    <p>Costillas</p>
    <a href="costillas.php" class="comprar-btn">¡Ordénalo ahora!</a>
  </div>

  <div class="cuadro">
  <img class="imagen" src="../food/MIXIOTES.jpg">
    <p>Mixiotes</p>
    <a href="mixiotes.php" class="comprar-btn">¡Ordénalo ahora!</a>
  </div>

  <div class="cuadro">
  <img class="imagen" src="../food/guarniciones.jpg">
    <p>Guarniciones</p>
    <a href="guarniciones.php" class="comprar-btn">¡Ordénalo ahora!</a>
  </div>

  <div class="cuadro">
  <img class="imagen" src="../food/bebidas.jpeg">
    <p>Bebida</p>
    <a href="bebidas.php" class="comprar-btn">¡Ordénalo ahora!</a>
  </div>


</body>
</html>
