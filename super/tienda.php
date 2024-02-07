<?php include 'menu.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fortaleza | Agregar productos a Tienda</title>
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

                <!-- Formulario de Agregar Producto -->
                <div class="card">
                    <div class="card-body">
                        <form>
                <h1 align="center">Agregar Productos a Tienda</h1>
                <br>
                            <div class="form-group">
                                <label for="imagen">Imagen:</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre del producto:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ponderacion">Ponderación:</label>
                                <input type="number" class="form-control" id="ponderacion" name="ponderacion">
                            </div>

                            <!-- Input para la cantidad de precios -->
                            <div class="form-group">
                                <label for="cantidadPrecios">Cantidad de Precios:</label>
                                <input type="number" class="form-control" id="cantidadPrecios" name="cantidadPrecios">
                            </div>

                            <!-- Campos de precios dinámicos -->
                            <div id="preciosContainer"></div>

                            <div class="form-group">
                                <button type="button" class="btn btn-primary" onclick="agregarCamposPrecios()">Agregar Precios</button>
                            </div>

                            <button type="submit" class="btn btn-success">Guardar</button>
                        </form>
                    </div>
                </div>

                <script>
                    function agregarCamposPrecios() {
                        // Obtener la cantidad de precios ingresada
                        var cantidadPrecios = document.getElementById("cantidadPrecios").value;

                        // Limpiar el contenedor de precios
                        document.getElementById("preciosContainer").innerHTML = "";

                        // Crear campos de precios dinámicamente
                        for (var i = 1; i <= cantidadPrecios; i++) {
                            var precioInput = document.createElement("input");
                            precioInput.type = "text";
                            precioInput.className = "form-control";
                            precioInput.placeholder = "Precio " + i;
                            precioInput.name = "precio" + i;

                            var precioFormGroup = document.createElement("div");
                            precioFormGroup.className = "form-group";
                            precioFormGroup.appendChild(precioInput);

                            document.getElementById("preciosContainer").appendChild(precioFormGroup);
                        }
                    }
                </script>
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

