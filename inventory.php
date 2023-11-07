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
    <title>Subir Prenda</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/dressrent/assets/css/panel.css">
</head>
<body>
    <h1>Subir una prenda</h1>
    <form action="/dressrent/connection/cargar_img.php" method="post" enctype="multipart/form-data">
        <label for="id_prenda">ID de Prenda:</label>
        <input type="text" name="id_prenda" id="id_prenda" required>
        
        <label for="nom_prenda">Nombre de Prenda::</label>
        <input type="text" name="nom_prenda" id="nom_prenda" required>

        <label for="descripcion">Descripcion:</label>
        <input type="text" name="descripcion" id="descripcion" required>

        <label for="categoria">Categoria:</label>
        <input type="text" name="categoria" id="categoria" required>

        <label for="talla">Talla:</label>
        <input type="text" name="talla" id="talla" required>

        <label for="tipo">Precio:</label>
        <input type="text" name="precio" id="precio" required>

        <label for="existencias">Existencias:</label>
        <input type="number" name="existencias" id="existencias" required>

        <label for="imagen">Subir Imagen:</label>
        <input type="file" name="imagen" id="imagen" accept="image/*" required>

        <input type="submit" value="Guardar Prenda">
    </form>
</body>
</html>
