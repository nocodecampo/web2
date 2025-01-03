var userPic = document.getElementById('userPicContainer');
var menuDesple = document.getElementById('menuDesplegable');

function desplegarMenu() {
    if (menuDesple.style.display == "block") {
        menuDesple.style.display = "none";
    } else {
        menuDesple.style.display = "block";
    }
}

userPic.onclick = desplegarMenu;


// Funcion menu aside mobile

var burgerIcon = document.getElementById('burgerIcon');
var menuAside = document.getElementById('menuAsideMobile');

function mostrarMenu() {
    if (menuAside.style.display == "block") {
        menuAside.style.display = "none";
    } else {
        menuAside.style.display = "block";
    }
}

burgerIcon.addEventListener('click', mostrarMenu);

// Función para eliminar una fila de la tabla

var papelera = document.getElementsByClassName('fa-trash');

for (let i = 0; i < papelera.length; i++) {
    const element = papelera[i];
    element.onclick = function (e) {
        var row = this.closest('tr');
        row.remove();
        //e.target.parentElement.parentElement.remove();
    }

};

// función para añadir la fecha de hoy al input de fecha
var fecha = new Date();
var inputFecha = document.getElementById('fecha');

inputFecha.value = fecha.toISOString().substr(0, 10);


// Función para añadir una fila a la tabla a través del formulario

var formIncidencia = document.getElementById('addIncidencia');
var tablaIncidencia = document.getElementById('incidenciasTable');

formIncidencia.onsubmit = function (e) {
    e.preventDefault();
    var form = e.target;
    var id = form.id.value = getNextId();
    var fecha = form.fecha.value.split('-').reverse().join('/');
    var descripcion = form.descripcion.value;
    var row = document.createElement('tr');
    row.innerHTML = `
        <td>${id}</td>
        <td>${fecha}</td>
        <td>${descripcion}</td>
        <td><i class="fa-solid fa-pen-to-square"></i><i class="fas fa-trash"></i></td>
    `;
    tablaIncidencia.appendChild(row);
    form.reset();
    var papelera = document.getElementsByClassName('fa-trash');
    for (let i = 0; i < papelera.length; i++) {
        const element = papelera[i];
        element.onclick = function (e) {
            var row = this.closest('tr');
            row.remove();
        }
    }
}

// Función para leer el id de la fila anterior y sumarle 1
function getNextId() {
    var rows = tablaIncidencia.getElementsByTagName('tr');
    var maxId = 0;
    for (var i = 1; i < rows.length; i++) { // Empieza en 1 para saltar la fila de cabecera
        var id = parseInt(rows[i].getElementsByTagName('td')[0].innerText);
        if (id > maxId) {
            maxId = id;
        }
    }
    return maxId + 1;
}

