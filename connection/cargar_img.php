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

   $descripcion = $_POST['descripcion'];
   $tipo = $_POST['tipo'];
   $existencias = $_POST['existencias'];

   // Procesar la imagen
   $imagen_data = file_get_contents($_FILES['imagen']['tmp_name']);

   // Insertar la imagen en la base de datos
   $query = "INSERT INTO prendas (descripcion, tipo, existencias, imagen) VALUES ($1, $2, $3, $4, $5, $6)";
   $result = pg_query_params($conn, $query, [$descripcion, $tipo, $existencias, $imagen_data]);

   if ($result) {
       echo "Imagen insertada con éxito.";
   } else {
       echo "Error al insertar la imagen: " . pg_last_error();
   }

   // Cerrar la conexión a la base de datos
   pg_close($conn);
?>
