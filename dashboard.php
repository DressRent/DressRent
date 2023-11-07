<?php
session_start();

if (!isset($_SESSION['usuarioo'])) {
    // El usuario no ha iniciado sesión, redirigir o mostrar un mensaje de acceso denegado.
    header("Location: /dressrent/index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/dressrent/assets/css/dashboard.css">
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="/dressrent/index.php">Inicio</a></li>
            <li><a href="/dressrent/shop.php">Tienda</a></li>
            <li><a href="/dressrent/connection/cerrar_sesion.php">Cerrar sesi&oacute;n</a></li>
        </ul>
    </div>
    <header>
        <h1>Bienvenido Vendedor</h1>
    </header>

    <nav>
        <ul>
            <li><a href="/dressrent/inventory.php" class="button">Cargar Producto</a></li>
            <li><a href="/dressrent/remove_inventory.php" class="button">Eliminar Producto</a></li>
            <li><a href="/dressrent/citas.php" class="button">Ver Pedidos</a></li>
        </ul>
    </nav>

    <main>
        <!-- Aquí puedes agregar contenido adicional como tablas o gráficos -->
    </main>
</body>
</html>
