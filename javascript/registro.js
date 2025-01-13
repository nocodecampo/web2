// Selección de los elementos
const password = document.getElementById('password');
const repeatPassword = document.getElementById('repeatPassword');
const enviar = document.getElementById('enviar');
const errMsg = document.getElementById('errMsg');


// Función para validar si coinciden
function validacionInput() {

    if (password.value === repeatPassword.value) {
        enviar.disabled = false;
        errMsg.style.display = 'none';
    } else {
        enviar.disabled = true;
        errMsg.style.display = 'block';
    }

}

// Añadir eventos para ejecutar la función
password.oninput = validacionInput;
repeatPassword.oninput = validacionInput;

