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
    isset($_POST['nom_vendedor']) &&
    isset($_POST['empresa']) &&
    isset($_POST['telefono_empresa']) &&
    isset($_POST['contrasena_vendedor']) &&
    isset($_POST['domicilio'])
) {
    $nom_vendedor = $_POST['nom_vendedor'];
    $empresa = $_POST['empresa'];
    $telefono_empresa = $_POST['telefono_empresa'];
    $contrasena_vendedor = $_POST['contrasena_vendedor'];
    $domicilio = $_POST['domicilio'];


    // Insertar los datos del usuario en la tabla cliente
    $query = "INSERT INTO vendedor (nom_vendedor, empresa, telefono_empresa, contrasena_vendedor, domicilio) VALUES ($1, $2, $3, $4, $5)";
    $result = pg_query_params($conn, $query, [$nom_vendedor, $empresa, $telefono_empresa, $contrasena_vendedor, $domicilio]);

    if ($result) {
        // Registro exitoso
        echo '<div class="success-message">';
        echo "Registro exitoso.";
        echo '</div>';
        header("Location: /dressrent/dashboard.php"); // Redirigir a la página de bienvenida
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
