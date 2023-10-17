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
    botonContactar.onclick = function() {
      alert(`Contactando al vendedor de ${producto.nombre}`);
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

// Ejemplo de cómo agregar productos al carrito
function agregarAlCarrito(producto) {
  carrito.push(producto);
  actualizarCarrito();
}
function eliminarProductoDelCarrito(index) {
  carrito.splice(index, 1);
  actualizarCarrito();
}

// Agregar productos de ejemplo al carrito
agregarAlCarrito({ nombre: "Producto 1", precio: 10.00, imagen: "URL_de_la_imagen1" });
agregarAlCarrito({ nombre: "Producto 2", precio: 20.00, imagen: "URL_de_la_imagen2" });

