function validarFormulario() 
{
    
    // Limpiar mensajes de error anteriores
    document.getElementById("error-nombre").textContent = "";
    document.getElementById("error-email").textContent = "";
    document.getElementById("error-password").textContent = "";

    // Obtener valores de los campos
    const nombre = document.getElementById("nombre").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();

    // Validar Nombre
    if (nombre === "") {
        document.getElementById("error-nombre").textContent = "El nombre es obligatorio.";
        return false;
    }

    // Validar Email
    if (email === "") {
        document.getElementById("error-email").textContent = "El email es obligatorio.";
        return false;
    } else if (!validarEmail(email)) {
        document.getElementById("error-email").textContent = "El email no es válido.";
        return false;
    }

    // Validar Contraseña
    if (password === "") {
        document.getElementById("error-password").textContent = "La contraseña es obligatoria.";
        return false;
    } else if (password.length < 6) {
        document.getElementById("error-password").textContent = "La contraseña debe tener al menos 6 caracteres.";
        return false;
    }

    // Si todo está correcto, enviar el formulario
    alert("Formulario enviado correctamente.");
    return true;
}

// Función para validar el formato del email
function validarEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

