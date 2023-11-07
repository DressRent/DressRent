const carrito = [];

function actualizarCarrito() {
  const itemsCarrito = document.getElementById("items-carrito");
  itemsCarrito.innerHTML = "";

  let total = 0;
  carrito.forEach((producto, index) => {
    const filaProducto = document.createElement("tr");

    // Celda de imagen
    const celdaImagen = document.createElement("td");
    const imagenProducto = document.createElement("img");
    imagenProducto.src = producto.imagen;
    celdaImagen.appendChild(imagenProducto);
    filaProducto.appendChild(celdaImagen);

    // Celda de nombre
    const celdaNombre = document.createElement("td");
    celdaNombre.innerText = producto.nombre;
    filaProducto.appendChild(celdaNombre);

    // Celda de precio
    const celdaPrecio = document.createElement("td");
    celdaPrecio.innerText = `$${producto.precio.toFixed(2)}`;
    filaProducto.appendChild(celdaPrecio);

    // Celda de botón "Contactar"
    const celdaBotonContactar = document.createElement("td");
    const botonContactar = document.createElement("button");
    botonContactar.innerText = "Contactar";
    // Define el enlace al que deseas redirigir
    const enlaceContactar = "https://t.me/DressReeent_bot"; // Reemplaza con tu enlace deseado
    botonContactar.onclick = function() {
      // Redirige al usuario al enlace especificado
      window.location.href = enlaceContactar;
    };
    celdaBotonContactar.appendChild(botonContactar);
    filaProducto.appendChild(celdaBotonContactar);


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

function eliminarProductoDelCarrito(index) {
  carrito.splice(index, 1);
  actualizarCarrito();
}

// Ejemplo de cómo agregar productos al carrito (puedes eliminar estos ejemplos)
agregarProductoDesdeBD(1); // Ejemplo de producto con ID 1
agregarProductoDesdeBD(2); // Ejemplo de producto con ID 2
