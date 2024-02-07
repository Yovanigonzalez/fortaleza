<?php
session_start();
?>

<?php
include '../config/conexion.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
    <!--Logo-->
  <link rel="shortcut icon" type="image/x-icon" href="../log/ico.png">

  <!-- Enlaces a los archivos CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">
  <!-- Icono de la página -->
  <link rel="icon" href="../ico/logo.png" type="image/jpeg">

  <!-- Enlaces a los archivos JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>


</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Barra de navegación superior -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Barra de navegación a la izquierda -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button">
            <i class="fas fa-bars"></i>
          </a>
        </li>
      </ul>

      <!-- Botones de la barra de navegación a la derecha -->
      <ul class="navbar-nav ml-auto">

      <style>
    .center-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .rounded-circle-container {
        width: 100px;
        height: 100px;
        background-color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .rounded-circle-container img {
        max-width: 70px;
        max-height: 70px;
        border-radius: 50%;
    }
</style>

        <style>
    .nav-icon {
        margin-right: 20px; /* Puedes ajustar el valor según tus preferencias */
    }
</style>

<?php
if (isset($_SESSION['nombre_usuario'])) {
    echo '<div class="nav-icon position-relative text-dark"><i class="fa fa-user-circle"></i> Hola! Bienvenido, ' . $_SESSION['nombre_usuario'] . '</div>';
    echo '<a class="nav-icon position-relative text-decoration-none" href="logout.php">';
    echo '<i class="fa fa-fw fa-sign-out-alt text-dark"></i> Cerrar Sesión</a>';

} else {
    echo '<a class="nav-icon position-relative text-decoration-none" href="login.php">';
    echo '<i class="fa fa-fw fa-user text-dark"></i> Iniciar Sesión</a>';
}
?>
        
      </ul>
    </nav>

<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Logo -->
  <a href="inicio.php" class="brand-link">
    <span class="brand-text font-weight-light">Panel del Administrador</span>
    <div class="center-container">
    <div class="rounded-circle-container">
        <img src="../ico/logo.png" class="img-fluid" alt="Login Image">
    </div>
</div>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Menú -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

        
        <!-- Elemento de menú Productos con submenús Extra -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-images"></i>
            <p>Cambio de banner <i class="fas fa-angle-left right"></i></p>
          </a>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="banner.php" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>
                <p>Cambio de banner</p>
              </a>
            </li>
          </ul>

          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="crud_banner.php" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>
                <p>Crud Banner</p>
              </a>
            </li>
          </ul>
        </li>
        


<!-- Sección Tienda -->
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-shopping-cart"></i> <!-- Cambié el icono aquí -->
        <p>Tienda <i class="fas fa-angle-left right"></i></p>
    </a>


        <!-- Submenús de Tienda -->
        <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="a_tienda.php" class="nav-link">
                <i class="fas fa-exchange-alt nav-icon"></i> <!-- Cambié el icono aquí -->
                <p>Agregar productos a Menu</p>
            </a>
        </li>
    </ul>

            <!-- Submenús de Tienda -->
            <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="tienda.php" class="nav-link">
            <i class="fas fa-database nav-icon"></i> <!-- Cambié el icono aquí -->
                <p>Acciones a Menu</p>
            </a>
        </li>
    </ul>

    <!-- Submenús de Tienda -->
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="tienda.php" class="nav-link">
                <i class="fas fa-exchange-alt nav-icon"></i> <!-- Cambié el icono aquí -->
                <p>Agregar productos Tienda</p>
            </a>
        </li>
    </ul>



    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="crud_tienda.php" class="nav-link">
                <i class="fas fa-database nav-icon"></i> <!-- Cambié el icono aquí -->
                <p>Acciones Tienda</p>
            </a>
        </li>
    </ul>
</li>



</li>


        
        <li class="nav-item">
        <a href="logout.php" class="nav-link">
            <i class="nav-icon fas fa-door-closed"></i>
            <p>Cerrar sesión</p>
        </a>
        </li>

  </aside>