// Selección de los elementos
const password = document.getElementById('password');
const repeatPassword = document.getElementById('repeatPassword');
const enviar = document.getElementById('enviar');
const errMsg = document.getElementById('errMsg');


password.oninput = validacionInput;
repeatPassword.oninput = validacionInput;

function validacionInput() {

    if (password.value == repeatPassword.value) {
        enviar.disabled = false;
        errMsg.style.display = 'none';
    } else {
        enviar.disabled = true;
        errMsg.style.display = 'block';
    }

}