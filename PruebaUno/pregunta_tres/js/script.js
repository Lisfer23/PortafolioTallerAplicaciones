document.getElementById('formulario').addEventListener('submit', function (event) {
    event.preventDefault(); // Evitar el envío del formulario

    const nombre = document.getElementById('nombre').value.trim();
    const rut = document.getElementById('rut').value.trim();
    const mensaje = document.getElementById('mensaje');

    // Validar que el nombre no esté vacío
    if (nombre === "") {
        mensaje.textContent = "Por favor, ingresa tu nombre.";
        return;
    }

    // Validar que el nombre tenga solo letras y espacios (opcional)
    if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(nombre)) {
        mensaje.textContent = "El nombre solo debe contener letras.";
        return;
    }

    // Validar el formato del RUT
    if (!validarRut(rut)) {
        mensaje.textContent = "El RUT ingresado no es válido.";
        return;
    }

    // Si todo está correcto, limpiar mensaje y mostrar éxito
    mensaje.textContent = "";
    alert("Formulario enviado correctamente.");

    // Limpiar los campos después de enviar el formulario
    document.getElementById('nombre').value = "";
    document.getElementById('rut').value = "";

    return true;
});

// Función para validar el RUT chileno
function validarRut(rut) {
    rut = rut.replace(/[.-]/g, "").toUpperCase();

    if (!/^\d{7,8}[0-9K]$/.test(rut)) {
        return false;
    }

    const cuerpo = rut.slice(0, -1);
    const dv = rut.slice(-1);

    let suma = 0;
    let multiplo = 2;

    for (let i = cuerpo.length - 1; i >= 0; i--) {
        suma += parseInt(cuerpo.charAt(i)) * multiplo;
        multiplo = multiplo === 7 ? 2 : multiplo + 1;
    }

    const resto = suma % 11;
    const dvEsperado = resto === 0 ? '0' : resto === 1 ? 'K' : String(11 - resto);

    return dv === dvEsperado;
}
