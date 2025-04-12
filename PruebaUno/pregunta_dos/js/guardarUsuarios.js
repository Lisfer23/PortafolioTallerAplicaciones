const form = document.querySelector('form');
window.addEventListener('DOMContentLoaded', () => {
    mostrarDatos();
});

form.addEventListener('submit', (e) => e.preventDefault());

document.getElementById("btn-guardar").addEventListener("click", function () {
    const nombre = document.getElementById("nombre").value.trim();
    const apellido = document.getElementById("apellido").value.trim();
    const rut = document.getElementById("rut").value.trim();
    const edad = document.getElementById("edad").value.trim();

    if (!nombre) {
        alert("El nombre es obligatorio.");
        return;
    }

    if (!apellido) {
        alert("El apellido es obligatorio.");
        return;
    }

    if (!rut || rut.length < 9 || !validarRut(rut)) {
        alert("El RUT ingresado no es válido.");
        return;
    }

    const edadNumerica = parseInt(edad);
    if (isNaN(edadNumerica) || edadNumerica < 1 || edadNumerica > 99) {
        alert("Por favor, ingresa una edad válida entre 1 y 99.");
        return;
    }

    alert(`¡Hola ${nombre} ${apellido}!\n\nTus datos se han guardado correctamente.`);

    const data = JSON.parse(localStorage.getItem("usuarios")) || [];
    data.push({ nombre, apellido, rut, edad });
    localStorage.setItem("usuarios", JSON.stringify(data));

    form.reset();
    mostrarDatos();
});

function mostrarDatos() {
    const datos = JSON.parse(localStorage.getItem("usuarios")) || [];
    const contenedor = document.getElementById("cajadatos");

    contenedor.innerHTML = `
        <h2>Datos Almacenados</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>RUT</th>
                    <th>Edad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    `;

    const table = contenedor.querySelector("table");
    const tbody = document.createElement("tbody");

    datos.forEach((usuario, index) => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${usuario.nombre}</td>
            <td>${usuario.apellido}</td>
            <td>${usuario.rut}</td>
            <td>${usuario.edad}</td>
            <td>
                <button class="btnEdit" onclick="editarUsuario(${index})">Editar</button>
                <button class="btnDelete" onclick="eliminarUsuario(${index})">Eliminar</button>
            </td>
        `;
        tbody.appendChild(row);
    });

    table.appendChild(tbody);
}

function eliminarUsuario(index) {
    const data = JSON.parse(localStorage.getItem("usuarios")) || [];
    data.splice(index, 1);
    localStorage.setItem("usuarios", JSON.stringify(data));
    mostrarDatos();
}

function editarUsuario(index) {
    const data = JSON.parse(localStorage.getItem("usuarios")) || [];
    const usuario = data[index];

    document.getElementById("nombre").value = usuario.nombre;
    document.getElementById("apellido").value = usuario.apellido;
    document.getElementById("rut").value = usuario.rut;
    document.getElementById("edad").value = usuario.edad;

    eliminarUsuario(index);
}
