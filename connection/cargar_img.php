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
    isset($_POST['id_prenda']) 
    && isset($_POST['nom_prenda']) 
    && isset($_POST['descripcion']) 
    && isset($_POST['categoria']) 
    && isset($_POST['talla']) 
    && isset($_POST['precio']) 
    && isset($_POST['existencias']) 
    && isset($_FILES['imagen'])
) {
    $id_prenda = $_POST['id_prenda'];
    $nom_prenda = $_POST['nom_prenda'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $talla = $_POST['talla'];
    $precio = $_POST['precio'];
    $existencias = $_POST['existencias'];

    // Verificar si se subió un archivo y si es de tipo JPG o PNG
    if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $file_extension = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
        if ($file_extension !== 'jpg' && $file_extension !== 'jpeg' && $file_extension !== 'png') {
            echo '<div class="error-message">';
            echo "El archivo debe ser de tipo JPG o PNG.";
            echo '</div>';
        } else {
            // Procesar la imagen
            $imagen = bin2hex(file_get_contents($_FILES['imagen']['tmp_name']));

            // Insertar la imagen en la base de datos
            $query = "INSERT INTO prendas (id_prenda, nom_prenda, descripcion, categoria, talla, precio, existencias, imagen) VALUES ($1, $2, $3, $4, $5, $6, $7, decode($8, 'hex'))";
            $result = pg_query_params($conn, $query, [$id_prenda, $nom_prenda, $descripcion, $categoria, $talla, $precio, $existencias, $imagen]);

            if ($result) {
                // Inserción exitosa
                echo '<div class="success-message">';
                echo "Imagen insertada con éxito.";
                echo '</div>';
            } else {
                // Error al insertar la imagen
                echo '<div class="error-message">';
                echo "Error al insertar la imagen: " . pg_last_error();
                echo '</div>';
            }
        }
    } else {
        echo '<div class="error-message">';
        echo "Hubo un error al subir el archivo.";
        echo '</div>';
    }
} else {
    echo '<div class="error-message">';
    echo "Faltan campos en el formulario.";
    echo '</div>';
}

// Agregar css
echo '<link rel="stylesheet" type="text/css" href="/dressrent/assets/css/panel.css">';
// Agregar botones para redireccionar
echo '<a href="/dressrent/inventory.html" class="button">Agregar un nuevo registro</a><br><br>';
echo '<a href="/dressrent/index.php" class="button">Ir a la página de inicio</a>';

// Cerrar la conexión a la base de datos
pg_close($conn);
?>
