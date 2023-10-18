<?php
$host        = "localhost";
$port        = "5432";
$dbname      = "DressRent";
$user        = "postgres";
$password    = "Estillo1216.";

// Conectar a la base de datos PostgreSQL
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Error en la conexión a la base de datos: " . pg_last_error());
}

if (
    isset($_POST['id_prenda']) && isset($_POST['descripcion']) && isset($_POST['tipo']) && isset($_POST['existencias']) && isset($_FILES['imagen'])
) {
    $id_prenda = $_POST['id_prenda'];
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo'];
    $existencias = $_POST['existencias'];

    // Procesar la imagen
    $imagen_data = bin2hex(file_get_contents($_FILES['imagen']['tmp_name']));

    // Insertar la imagen en la base de datos
    $query = "INSERT INTO prendas (id_prenda, descripcion, tipo, existencias, imagen) VALUES ($1, $2, $3, $4, decode($5, 'hex'))";
    $result = pg_query_params($conn, $query, [$id_prenda, $descripcion, $tipo, $existencias, $imagen_data]);

    if ($result) {
        echo "Imagen insertada con éxito.";
    } else {
        echo "Error al insertar la imagen: " . pg_last_error();
    }

    // Cerrar la conexión a la base de datos
    pg_close($conn);
} else {
    echo "Faltan campos en el formulario.";
}
?>
