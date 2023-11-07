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

if (isset($_POST['id_a_eliminar'])) {
    $id_a_eliminar = $_POST['id_a_eliminar'];

    // Realizar una consulta SQL para eliminar un registro basado en el ID
    $query = "DELETE FROM prendas WHERE id_prenda = $1";
    $result = pg_query_params($conn, $query, [$id_a_eliminar]);

    if ($result) {
        // Eliminación exitosa
        echo "Registro eliminado con éxito.";
    } else {
        echo "Error al eliminar el registro: " . pg_last_error();
    }

    // Cerrar la conexión a la base de datos
    pg_close($conn);
} else {
    echo "Falta el ID del registro a eliminar.";
}
?>
