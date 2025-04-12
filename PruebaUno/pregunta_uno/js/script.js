function validarFormulario() 
{
    
    // Limpiar mensajes de error anteriores
    document.getElementById("error-nombre").textContent = "";
    document.getElementById("error-apellido").textContent = "";
    document.getElementById("error-rut").textContent = "";
    document.getElementById("error-edad").textContent = "";

    // Obtener valores de los campos
    const nombre = document.getElementById("nombre").value.trim();
    const apellido = document.getElementById("apellido").value.trim();
    const rut = document.getElementById("rut").value.trim();
    const edad = document.getElementById("edad").value.trim();

    // Validar Nombre
    if (nombre === "") {
        document.getElementById("error-nombre").textContent = "El nombre es obligatorio.";
        return false;
    }

    // Validar Apellido
    if (apellido === "") {
        document.getElementById("error-apellido").textContent = "El Apellido es obligatorio.";
        return false;
    }

    // Validar Rut
    if (rut === "") {
        document.getElementById("error-rut").textContent = "El rut no es correcto.";
        return false;
    } else if (rut.length < 9) {
        document.getElementById("error-rut").textContent = "La rut debe tener 9 caracteres.";
        return false;
    }

        // Validar Edad
        const edadNumerica = parseInt(edad);
        if (isNaN(edadNumerica) || edadNumerica < 1 || edadNumerica > 99) {
            alert("Por favor, ingresa una edad válida entre 1 y 99.");
            return;
        }
          
    // Si todo está correcto, enviar el formulario
    alert("Formulario enviado correctamente.");
    return true;
}



