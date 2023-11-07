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

// Realizar una consulta SQL para seleccionar registros de la tabla prendas
$query = "SELECT id_prenda, nom_prenda, descripcion, categoria, talla, precio, existencias, imagen FROM prendas";
$result = pg_query($conn, $query);

if ($result) {
    while ($row = pg_fetch_assoc($result)) {
        // Mostrar productos utilizando tu estilo HTML
        echo '<div class="col-md-4">';
        echo '<div class="card mb-4 product-wap rounded-0">';
        echo '<div class="card rounded-0">';
        // Verifica si la imagen se ha recuperado correctamente
        if (!empty($row['imagen'])) {
            $imageData = $row['imagen'];
            
            // Verifica si los primeros bytes indican que es una imagen en formato JPEG
            if (substr($imageData, 0, 2) === "\xFF\xD8") {
                $imageType = 'jpeg';
            }
            // Verifica si los primeros bytes indican que es una imagen en formato PNG
            elseif (substr($imageData, 1, 3) === "PNG") {
                $imageType = 'png';
            }
            else {
                $imageType = 'jpg'; // Formato predeterminado si no se reconoce
            }
            
            echo '<img class="card-img rounded-0 img-fluid" src="data:image/' . $imageType . ';base64,' . base64_encode($imageData) . '">';
        } else {
            // Si no hay imagen en la base de datos, muestra una imagen de reemplazo o un mensaje
            echo '<img class="card-img rounded-0 img-fluid" src="ruta_de_la_imagen_de_reemplazo.jpg" alt="Imagen de reemplazo">';
        }
        echo '<div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">';
        echo '<ul class="list-unstyled">';
        echo '<li><a class="btn btn-success text-white" href="shop-single.html"><i class="far fa-heart"></i></a></li>';
        echo '<li><a class="btn btn-success text-white mt-2" href="shop-single.html"><i class="far fa-eye"></i></a></li>';
        echo '<li><a class="btn btn-success text-white mt-2" href="javascript:void(0);" onclick="agregarProductoDesdeBD(1);"><i class="fas fa-cart-plus"></i></a></li>';
        echo '</ul>';
        echo '</div>';
        echo '</div>';
        echo '<div class="card-body">';
        echo '<a href="shop-single.html" class="h3 text-decoration-none">' . $row['nom_prenda'] . '</a>';
        echo '<ul class="w-100 list-unstyled d-flex justify-content-between mb-0">';
        echo '<li>' . $row['talla'] . '</li>';
        echo '<li class="pt-2">';
        echo '<span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>';
        echo '<span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>';
        echo '<span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>';
        echo '<span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>';
        echo '<span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>';
        echo '</li>';
        echo '</ul>';
        echo '<ul class="list-unstyled d-flex justify-content-center mb-1">';
        echo '<li>';
        echo '<i class="text-warning fa fa-star"></i>';
        echo '<i class="text-warning fa fa-star"></i>';
        echo '<i class="text-warning fa fa-star"></i>';
        echo '<i class="text-muted fa fa-star"></i>';
        echo '<i class="text-muted fa fa-star"></i>';
        echo '</li>';
        echo '</ul>';
        echo '<p class="text-center mb-0">$' . $row['precio'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "No se encontraron registros.";
}

// Cerrar la conexión a la base de datos
pg_close($conn);
?>

