/*var usuario = 'admin';
var password = '1234'
var formulario = document.getElementById('loginFormulario')
var inputUsuario = document.getElementById('usuario');
var inputPassword = document.getElementById('password');

function validarUsuario() {
    if (inputUsuario.value == usuario && inputPassword.value == password) {
        window.location.href = 'index.html';
    } else {
        window.alert('DENEGADO');
    }
}

formulario.onsubmit = validarUsuario; */

var formulario = document.getElementById('loginFormulario');

formulario.onsubmit = function (e) {
    e.preventDefault();
    var usuario = document.getElementById('usuario').value;
    var password = document.getElementById('password').value;
    if (usuario == 'admin' && password == '1234') {
        window.location.href = 'main.html';
    } else {
        window.alert('Usuario o contraseña incorrecto');
    }

}