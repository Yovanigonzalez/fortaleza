<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fortaleza | Agregar Menú</title>
    <link rel="shortcut icon" type="image/x-icon" href="../log/ico.png">
    <meta name="description" content="Descripción de tu sitio web">
    <meta name="keywords" content="fortaleza, sitio web, ejemplo">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-Z2mU9ZckH3vJ8J1l7Z5Mz5l1TZw4E1KecE2lSZ/Kz55Jz1k3T9I71bIAsj9gPzR5" crossorigin="anonymous">

</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container-fluid">
                <br>

                <!-- Formulario de Agregar Usuario -->
                <div class="card">
                    <div class="card-body">

                    <form action="procesar_menu.php" method="post" enctype="multipart/form-data">
                        <h1 align="center">Agregar Menú</h1>
                        <br>
                        <div class="form-group">
                            <label for="imagen">Imagen:</label>
                            <input type="file" class="form-control-file" id="imagen" name="imagen" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input type="text" class="form-control" id="titulo" name="titulo">
                        </div>
                        <div class="form-group">
                            <label for="subtitulo">Subtítulo:</label>
                            <input type="text" class="form-control" id="subtitulo" name="subtitulo">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio:</label>
                            <input type="text" class="form-control" id="precio" name="precio">
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoría:</label>
                            <input type="text" class="form-control" id="categoria" name="categoria">
                        </div>

                        <button type="submit" class="btn btn-success" style="background-color: #2196F3; border-color: #2196F3;">Guardar</button>
                    </form>


                    </div>
                </div>

                <br>
                <!-- Enlaces a jQuery, Popper.js y Bootstrap JS -->
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

            </div>
        </div>
    </div>
</body>
</html>
