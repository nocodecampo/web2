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


/* Funcion menu aside*/

var burgerIcon = document.getElementById('burgerIcon');
var menuAside = document.getElementById('menuAside');

function mostrarMenu() {
    if (menuAside.style.display == "block") {
        menuAside.style.display = "none";
    } else {
        menuAside.style.display = "block";
    }
}

burgerIcon.onclick = mostrarMenu;
