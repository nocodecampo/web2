// Selección de los elementos
const password = document.getElementById('password');
const repeatPassword = document.getElementById('repeatPassword');
const enviar = document.getElementById('enviar');

// Función para validar si las contraseñas coinciden
function validarPasswords() {
    if (password.value === repeatPassword.value && password.value !== '') {
        enviar.disabled = false; // Habilitar el botón
    } else {
        enviar.disabled = true; // Deshabilitar el botón
    }
}

// Añadir eventos para validar al escribir en los campos
password.addEventListener('input', validarPasswords);
repeatPassword.addEventListener('input', validarPasswords);