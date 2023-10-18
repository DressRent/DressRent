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
    isset($_POST['id_prenda']) && isset($_POST['descripcion']) && isset($_POST['tipo']) && isset($_POST['precio']) && isset($_POST['existencias']) && isset($_FILES['imagen'])
) {
    $id_prenda = $_POST['id_prenda'];
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo'];
    $precio = $_POST['precio'];
    $existencias = $_POST['existencias'];

    // Verificar si se subió un archivo y si es de tipo JPG o PNG
    if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $file_extension = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
        if ($file_extension !== 'jpg' && $file_extension !== 'jpeg' && $file_extension !== 'png') {
            echo "El archivo debe ser de tipo JPG o PNG.";
            exit;
        }

        // Procesar la imagen
        $imagen_data = bin2hex(file_get_contents($_FILES['imagen']['tmp_name']));

        // Insertar la imagen en la base de datos
        $query = "INSERT INTO prendas (id_prenda, descripcion, tipo, precio, existencias, imagen) VALUES ($1, $2, $3, $4, $5, decode($6, 'hex'))";
        $result = pg_query_params($conn, $query, [$id_prenda, $descripcion, $tipo, $precio, $existencias, $imagen_data]);

        if ($result) {
            // Inserción exitosa
            echo "Imagen insertada con éxito.";
            // Agregar botones para redireccionar
            echo '<br>';
            echo '<a href="/dressrent/inventory.html">Agregar un nuevo registro</a>';
            echo '<br>';
            echo '<a href="/dressrent/index.html">Ir a la página de inicio</a>';
        } else {
            echo "Error al insertar la imagen: " . pg_last_error();
        }
    } else {
        echo "Hubo un error al subir el archivo.";
    }

    // Cerrar la conexión a la base de datos
    pg_close($conn);
} else {
    echo "Faltan campos en el formulario.";
}
?>
