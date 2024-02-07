<?php include 'nav/menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pollos La Fortaleza Chicken | Menú</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        body {
  background-color: #f4f4f4;
}

        #menu-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            padding: 20px;
        }

        .menu-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            margin: 10px;
            width: 300px;
        }

        .menu-item img {
            width: 100%;
            height: auto;
        }

        .menu-item-content {
            padding: 15px;
        }

        .menu-item h3 {
            margin-top: 0;
        }

        .menu-item p {
            color: #777;
        }
    </style>
</head>
<body>

    <h1 align="center">Menú de Comida</h1>

    <div id="menu-container">

        <div class="menu-item" onclick="showDetails(1)">
            <img src="https://via.placeholder.com/300" alt="Pollo Asado">
            <div class="menu-item-content">
                <h3>Pollo Asado</h3>
                <p>
                    (Incluyen: Arroz o Espagueti + Tortillas o Totopos + Salsa)
                    <ul>
                        <li>1/2 x $95.00</li>
                        <li>1 x $175.00</li>
                        <li>2 x $330.00</li>
                    </ul>
                </p>
            </div>
        </div>

        <div class="menu-item" onclick="showDetails(2)">
            <img src="https://via.placeholder.com/300" alt="Pollo Rostizado">
            <div class="menu-item-content">
                <h3>Pollo Rostizado</h3>
                <p>
                    (Incluyen: Arroz o Espagueti + Tortillas o Totopos + Salsa)
                    <ul>
                        <li>1/2 x $95.00</li>
                        <li>1 x $175.00</li>
                        <li>2 x $330.00</li>
                    </ul>
                </p>
            </div>
        </div>

        <div class="menu-item" onclick="showDetails(3)">
            <img src="https://via.placeholder.com/300" alt="Pollo Barbacoa">
            <div class="menu-item-content">
                <h3>Pollo Barbacoa</h3>
                <p>
                    (Incluyen: Arroz o Espagueti + Tortillas o Totopos + Salsa)
                    <ul>
                        <li>1/2 x $95.00</li>
                        <li>1 x $175.00</li>
                        <li>2 x $330.00</li>
                    </ul>
                </p>
            </div>
        </div>

    </div>

    <script>
        function showDetails(menuItemId) {
            alert("Detalles del Plato " + menuItemId);
        }
    </script>

</body>
</html>