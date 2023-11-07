<?php
$host = "localhost";
$port = "5432";
$dbname = "DressRent";
$user = "postgres";
$password = "Estillo1216.";

// Conectar a la base de datos PostgreSQL
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Error en la conexión a la base de datos: " . pg_last_error());
}

if (
    isset($_POST['usuario_cliente']) &&
    isset($_POST['nom_cliente']) &&
    isset($_POST['telefono_cliente']) &&
    isset($_POST['contrasena_cliente'])
) {
    $usuario_cliente = $_POST['usuario_cliente'];
    $nom_cliente = $_POST['nom_cliente'];
    $telefono_cliente = $_POST['telefono_cliente'];
    $contrasena_cliente = $_POST['contrasena_cliente'];

    // Insertar los datos del usuario en la tabla cliente
    $query = "INSERT INTO cliente (usuario_cliente, nom_cliente, telefono_cliente, contrasena_cliente) VALUES ($1, $2, $3, $4)";
    $result = pg_query_params($conn, $query, [$usuario_cliente, $nom_cliente, $telefono_cliente, $contrasena_cliente]);

    if ($result) {
        // Registro exitoso
        echo '<div class="success-message">';
        echo "Registro exitoso.";
        echo '</div>';
        header("Location: /dressrent/index.php"); // Redirigir a la página de bienvenida
    } else {
        // Error al registrar
        echo '<div class="error-message">';
        echo "Error al registrar: " . pg_last_error();
        echo '</div>';
    }
} else {
    echo "Faltan campos en el formulario.";
}
?>
