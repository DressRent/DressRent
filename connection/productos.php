<?php
require "conexion.php";

// Realiza la consulta a la base de datos para obtener los productos

while ($row = pg_fetch_assoc($result)) {
    // Genera el HTML para mostrar cada producto
    echo '<div class="col-md-4">';
    echo '<div class="card mb-4 product-wap rounded-0">';
    // Agrega aquí el código para mostrar la información del producto
    echo '</div>';
    echo '</div>';
}
?>
