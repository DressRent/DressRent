<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

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

    if (isset($_POST['nom_vendedor']) && isset($_POST['contrasena_vendedor'])) {
        $nom_vendedor = $_POST['nom_vendedor'];
        $contrasena_vendedor = $_POST['contrasena_vendedor'];

        // Consulta para verificar el usuario y la contraseña
        $query = "SELECT * FROM vendedor WHERE nom_vendedor = $1 AND contrasena_vendedor = $2";
        $result = pg_query_params($conn, $query, [$nom_vendedor, $contrasena_vendedor]);

        if ($result && pg_num_rows($result) > 0) {
            // Inicio de sesión exitoso
            $_SESSION['usuarioo'] = $nom_vendedor;
            header("Location: /dressrent/dashboard.php"); // Redirigir a la página de bienvenida
            exit();
        } else {
            // Error de inicio de sesión
            $error_message = "Usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.";
        }
    } else {
        $error_message = "Faltan campos en el formulario.";
    }

// Si llegamos aquí, no se envió un formulario o hubo un error en el inicio de sesión
?>
