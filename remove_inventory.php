<?php
session_start();

if (!isset($_SESSION['usuarioo'])) {
    // El usuario no ha iniciado sesión, redirigir o mostrar un mensaje de acceso denegado.
    header("Location: /dressrent/index.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Prenda</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/dressrent/assets/css/panel.css">
</head>
<body>
    <h1>Eliminar Prenda</h1>
    <form action="/dressrent/connection/eliminar_prod.php" method="post">
        <label for="id_a_eliminar">ID de la prenda a eliminar:</label>
        <input type="text" id="id_a_eliminar" name="id_a_eliminar" required>

        <input type="submit" value="Eliminar Prenda">
    </form>
</body>
</html>
