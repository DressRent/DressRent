<?php
session_start();

// Destruir la sesión actual
session_destroy();

// Redirigir al usuario a la página de inicio de sesión (o cualquier otra página)
header("Location: /dressrent/index.php");
exit();
?>
