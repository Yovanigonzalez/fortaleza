document.addEventListener("DOMContentLoaded", function () {
  let currentSlide = 0;
const slides = document.querySelectorAll('.items-carousel');
const pointsContainer = document.getElementById('points');

// Función para mostrar el punto activo con animación
function showActivePoint(n) {
    const points = document.querySelectorAll('.point');
    points.forEach(point => {
        point.classList.remove('active');
    });
    
    points[n].classList.add('active');
    // Agregar un pequeño retraso para la animación de opacidad
    setTimeout(() => {
    }, 50);
}

// Función para mostrar un slide específico y aplicar animación de desvanecimiento
function showSlide(n) {
    slides[currentSlide].classList.remove('active');
    currentSlide = (n + slides.length) % slides.length;
    slides[currentSlide].classList.add('active');
    showActivePoint(currentSlide);
}

// Crear los puntos indicadores y vincular eventos de clic
function createPoints() {
    for (let i = 0; i < slides.length; i++) {
        const point = document.createElement('div');
        point.classList.add('point');
        pointsContainer.appendChild(point);
        
        // Vincular evento de clic a cada punto
        point.addEventListener('click', () => {
            showSlide(i);
        });
    }
}

// Crear los puntos indicadores
createPoints();

// Mostrar el primer punto activo al cargar la página
showActivePoint(currentSlide);

// Función para avanzar al siguiente slide y actualizar los puntos
function nextSlide() {
    showSlide(currentSlide + 1);
}

// Cambiar cada 5 segundos (10000 milisegundos)
setInterval(nextSlide, 10000);

});
