const carrito = [];

function actualizarCarrito() {
  const itemsCarrito = document.getElementById("items-carrito");
  itemsCarrito.innerHTML = "";

  let total = 0;
  carrito.forEach((producto) => {
    const listItem = document.createElement("li");

    // Crear una div para el contenido del producto
    const productoDiv = document.createElement("div");
    productoDiv.className = "producto-info";

    // Crear una imagen para el producto
    const imagenProducto = document.createElement("img");
    imagenProducto.src = producto.imagen; // Establece la URL de la imagen
    productoDiv.appendChild(imagenProducto);

    // Agregar el nombre del producto
    const nombreProducto = document.createElement("span");
    nombreProducto.className = "nombre-producto";
    nombreProducto.innerText = producto.nombre;
    productoDiv.appendChild(nombreProducto);

    // Agregar el precio del producto
    const precioProducto = document.createElement("span");
    precioProducto.className = "precio-producto";
    precioProducto.innerText = `$${producto.precio.toFixed(2)}`;
    productoDiv.appendChild(precioProducto);

    // Agregar el botón "Contactar"
    const botonContactar = document.createElement("button");
    botonContactar.innerText = "Contactar";
<<<<<<< Updated upstream
    botonContactar.className = "boton-contactar";
    botonContactar.onclick = function() {
      // Agrega aquí la lógica para contactar al vendedor o realizar una acción específica
      alert(`Contactando al vendedor de ${producto.nombre}`);
=======
    // Define el enlace al que deseas redirigir
    const enlaceContactar = "https://t.me/DressReeent_bot"; // Reemplaza con tu enlace deseado
    botonContactar.onclick = function() {
      // Redirige al usuario al enlace especificado
      window.location.href = enlaceContactar;
>>>>>>> Stashed changes
    };
    productoDiv.appendChild(botonContactar);

<<<<<<< Updated upstream
    listItem.appendChild(productoDiv);
    itemsCarrito.appendChild(listItem);
=======

    // Celda de botón de eliminación
    const celdaBotonEliminar = document.createElement("td");
    const botonEliminar = document.createElement("button");
    botonEliminar.innerText = "X";
    botonEliminar.className = "boton-eliminar";
    botonEliminar.onclick = function() {
      eliminarProductoDelCarrito(index);
    };
    celdaBotonEliminar.appendChild(botonEliminar);
    filaProducto.appendChild(celdaBotonEliminar);

    itemsCarrito.appendChild(filaProducto);
>>>>>>> Stashed changes

    total += producto.precio;
  });

  const totalCarrito = document.getElementById("total-carrito");
  totalCarrito.textContent = `$${total.toFixed(2)}`;
}

function abrirCarrito() {
  const carritoModal = document.getElementById("carrito-modal");
  carritoModal.style.display = "block";
  actualizarCarrito();
}

function cerrarCarrito() {
  const carritoModal = document.getElementById("carrito-modal");
  carritoModal.style.display = "none";
}

const botonAbrirCarrito = document.getElementById("abrir-carrito");
botonAbrirCarrito.addEventListener("click", abrirCarrito);

// Agregar productos al carrito desde la base de datos
function agregarProductoDesdeBD(idProducto) {
  // Realizar una solicitud al servidor para obtener los detalles del producto
  fetch(`/dressrent/connection/obtener_producto.php?id=${idProducto}`)
    .then(response => response.json())
    .then(producto => {
      if (producto) {
        agregarAlCarrito(producto);
      } else {
        alert("Producto no encontrado en la base de datos");
      }
    })
    .catch(error => {
      console.error("Error al obtener el producto: " + error);
    });
}
<<<<<<< Updated upstream

// Agregar productos de ejemplo al carrito
agregarAlCarrito({ nombre: "Producto 1", precio: 10.00, imagen: "URL_de_la_imagen1" });
agregarAlCarrito({ nombre: "Producto 2", precio: 20.00, imagen: "URL_de_la_imagen2" });
=======

function eliminarProductoDelCarrito(index) {
  carrito.splice(index, 1);
  actualizarCarrito();
}

// Ejemplo de cómo agregar productos al carrito (puedes eliminar estos ejemplos)
agregarProductoDesdeBD(1); // Ejemplo de producto con ID 1
agregarProductoDesdeBD(2); // Ejemplo de producto con ID 2
>>>>>>> Stashed changes
