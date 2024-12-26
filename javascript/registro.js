// Selección de los elementos
const password = document.getElementById('password');
const repeatPassword = document.getElementById('repeatPassword');
const enviar = document.getElementById('enviar');


password.oninput = validacionInput;
repeatPassword.oninput = validacionInput;

function validacionInput() {

    if (password.value == repeatPassword.value && password.value != '') {
        enviar.disabled = false;
    } else {
        enviar.disabled = true;
    }

}