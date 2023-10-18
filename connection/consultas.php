<?php
// Detalles de conexión a PostgreSQL
$host = 'localhost';
$port = '5432';
$user = 'postgres';
$password = 'Estillo1216.';
$dbname = 'MCRM';

// Conexión a PostgreSQL
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

// Obtener el parámetro enviado desde la página web (nombre de la tabla)
$tabla = $_GET['tabla'];

// Verificar que el parámetro no esté vacío
if (!empty($tabla)) {
  // Escapar el nombre de la tabla para evitar inyección de SQL
  $tabla = pg_escape_identifier($conn, $tabla);

  // Consulta SQL para obtener los datos de la tabla
  $query_data = "SELECT * FROM $tabla";

  // Ejecutar consulta para obtener los datos de la tabla
  $result_data = pg_query($conn, $query_data);

  // Verificar si la consulta se ejecutó correctamente
  if ($result_data) {
    // Obtener resultados y devolverlos como JSON
    $data = array();
    while ($row_data = pg_fetch_assoc($result_data)) {
      $data[] = $row_data;
    }
    echo json_encode($data);
  } else {
    echo 'Error al ejecutar la consulta de datos.';
  }
} else {
  echo 'No se ha especificado una tabla.';
}

// Cerrar conexión
pg_close($conn);
?>
