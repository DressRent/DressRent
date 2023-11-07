<?php
// Obtén el ID del producto desde la solicitud (puedes validar esto)
$idProducto = $_GET['id'];

// Realiza una consulta a la base de datos para obtener los detalles del producto con el ID proporcionado
// Debes establecer una conexión a la base de datos aquí

// Consulta SQL para obtener el producto
$query = "SELECT * FROM productos WHERE id = $idProducto";
$result = pg_query($conn, $query);

if ($result && pg_num_rows($result) > 0) {
    $producto = pg_fetch_assoc($result);
    echo json_encode($producto); // Devuelve los detalles del producto en formato JSON
} else {
    echo json_encode(null); // Devuelve null si el producto no se encontró
}

// Cierra la conexión a la base de datos
pg_close($conn);
?>
