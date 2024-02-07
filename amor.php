<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Botones</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    button {
      padding: 10px 20px;
      font-size: 16px;
      margin: 5px;
    }

    #noButton {
      color: red;
      position: relative;
    }

    #modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }

    #modalContent {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      text-align: center;
    }

    #yesButton {
      background-color: #4CAF50;
      color: white;
    }
  </style>
</head>
<body>


  <button id="yesButton" onclick="openModal()">Sí</button>
  <button id="noButton" onclick="moveButton()">No</button>

  <div id="modal">
    <div id="modalContent">
      <p>¡En fa, ponte en 4!</p>
      <button onclick="closeModal()">Cerrar</button>
    </div>
  </div>

  <br>
  <h1>Vamos a coger detras de la puerta</h1>

  <script>
    function openModal() {
      document.getElementById('modal').style.display = 'flex';
    }

    function closeModal() {
      document.getElementById('modal').style.display = 'none';
    }

    function moveButton() {
      const noButton = document.getElementById('noButton');
      const newPositionX = Math.random() * (window.innerWidth - noButton.clientWidth);
      const newPositionY = Math.random() * (window.innerHeight - noButton.clientHeight);
      
      // Asegura que el botón se mueva dentro del ancho de la pantalla
      const maxX = window.innerWidth - noButton.clientWidth;
      const maxY = window.innerHeight - noButton.clientHeight;

      noButton.style.left = Math.min(newPositionX, maxX) + 'px';
      noButton.style.top = newPositionY + 'px';
    }
  </script>

</body>
</html>
