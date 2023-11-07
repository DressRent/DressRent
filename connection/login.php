<?php
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

if (isset($_POST['usuario_cliente']) && isset($_POST['contrasena_cliente'])) {
    $usuario_cliente = $_POST['usuario_cliente'];
    $contrasena_cliente = $_POST['contrasena_cliente'];

    // Consulta para verificar el usuario y la contraseña
    $query = "SELECT * FROM cliente WHERE usuario_cliente = $1 AND contrasena_cliente = $2";
    $result = pg_query_params($conn, $query, [$usuario_cliente, $contrasena_cliente]);

    if ($result && pg_num_rows($result) > 0) {
        // Inicio de sesión exitoso
        $_SESSION['usuario'] = $usuario_cliente;
        header("Location: /dressrent/index.php"); // Redirigir a la página de bienvenida
        exit();
    } else {
        // Error de inicio de sesión
        $error_message = "Usuario o contraseña incorrectos. Por favor, inténtalo de nuevo.";
    }
}

// Si llegamos aquí, no se envió un formulario o hubo un error en el inicio de sesión
?>