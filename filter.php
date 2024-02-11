<?php

include 'menu.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener la categoría seleccionada
    $selectedCategory = $_POST['category'];

    // Mostrar los elementos del menú para la categoría seleccionada
    displayMenu($selectedCategory);
}
?>
