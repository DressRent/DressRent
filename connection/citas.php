<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

// Consulta SQL para seleccionar todos los registros de la tabla "citas"
$sql = "SELECT * FROM citas";
$result = pg_query($conn, $sql);

if (!$result) {
    echo "Error en la consulta: " . pg_last_error($conn);
} else {
    echo "<table>
            <tr>
                <th>ID Cita</th>
                <th>Fecha</th>
                <th>Usuario Cliente</th>
                <th>Nombre Vendedor</th>
            </tr>";

    // Iterar a través de los resultados y mostrar cada fila
    while ($row = pg_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id_cita"] . "</td>";
        echo "<td>" . $row["fecha"] . "</td>";
        echo "<td>" . $row["usuario_cliente"] . "</td>";
        echo "<td>" . $row["nom_vendedor"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}

// Cierra la conexión a la base de datos
pg_close($conn);
?>
