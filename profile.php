<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: /dressrent/index.html");
    exit();
}

$host = "localhost";
$port = "5432";
$dbname = "DressRent";
$user = "postgres";
$password = "Estillo1216.";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Error en la conexión a la base de datos: " . pg_last_error());
}

$query = "SELECT * FROM cliente WHERE usuario_cliente = $1";
$result = pg_query_params($conn, $query, [$_SESSION['usuario']]);

if ($result && pg_num_rows($result) > 0) {
    $user_data = pg_fetch_assoc($result);
} else {
    echo "Error: No se encontraron datos del usuario.";
    exit();
}

pg_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>DressRent - Perfil de Cliente</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/profile.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
</head>
<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-grey navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-dark">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <a class="navbar-sm-brand text-dark text-decoration-none" href="/dressrent/connection/cerrar_sesion.php">Cerrar sesi&oacute;n</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php">
                DressRent
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">Sobre nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php">Tienda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contacto</a>
                        </li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->
    <main>
        <div class="container">
            <h2>Datos del Usuario</h2>
            <p><strong>Nombre de Usuario:</strong> <?php echo $user_data['usuario_cliente']; ?></p>
            <p><strong>Teléfono:</strong> <?php echo $user_data['telefono_cliente']; ?></p>
        </div>
    </main>
</body>
</html>
