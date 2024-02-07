<?php include 'nav/menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Pollos La Fortaleza Chicken | Tehuacan, Puebla</title>
  <style>

    .color{
      background: linear-gradient(180deg, rgba(145, 29, 29, 0.00) 0%, #911D1D 41.6%) no-repeat;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    .carousel {
      width: 80%;
      margin: auto;
      overflow: hidden;
      position: relative;
    }

    .carousel-inner {
      display: flex;
      transition: transform 0.5s ease-in-out;
    }

    .carousel-item {
      min-width: 100%;
    }

    .carousel img {
      width: 100%;
      height: 94%;
      object-fit: cover;
      border-radius: 40px;
      margin-top: 8px;
    }

    .prev, .next {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 24px;
      cursor: pointer;
      color: #333;
      background-color: white;
      border-radius: 50%;
      padding: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .prev {
      left: 10px;
    }

    .next {
      right: 10px;
    }

    /* Media Query para pantallas más pequeñas, por ejemplo, menores o iguales a 768px */
@media only screen and (max-width: 768px) {
  body {
    justify-content: normal; /* Restablece la propiedad justify-content */
  }

  .carousel {
    width: 100%; /* Hace que el carrusel ocupe el 100% del ancho en pantallas más pequeñas */
  }
}
  </style>
</head>
<body>

<div class="color">
<div class="carousel">
  <div class="carousel-inner">
    <div class="carousel-item"><img src="banner/c0.jpg" alt="Imagen 1"></div>



    <!-- Agrega más imágenes según sea necesario -->
  </div>

  <div class="prev" onclick="prevSlide()">◄</div>
  <div class="next" onclick="nextSlide()">►</div>
</div>
</div>

<script>
  let currentIndex = 0;
  const totalSlides = document.querySelectorAll('.carousel-item').length;

  function showSlide(index) {
    const carouselInner = document.querySelector('.carousel-inner');
    const slideWidth = document.querySelector('.carousel-item').clientWidth;

    if (index >= totalSlides) {
      currentIndex = 0;
    } else if (index < 0) {
      currentIndex = totalSlides - 1;
    } else {
      currentIndex = index;
    }

    const translateValue = -currentIndex * slideWidth;
    carouselInner.style.transform = `translateX(${translateValue}px)`;
  }

  function prevSlide() {
    showSlide(currentIndex - 1);
  }

  function nextSlide() {
    showSlide(currentIndex + 1);
  }
</script>

<?php include 'seccion.php'; ?>

<?php include 'lugar.php'; ?>


<!--<?php include 'pago.php'; ?>-->
</body>
</html>
<!--<?php include 'footer.php'; ?>-->