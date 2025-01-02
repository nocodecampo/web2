var userPic = document.getElementById('userPicContainer');
var menuDesple = document.getElementById('menuDesplegable');

function desplegarMenu() {
    if (menuDesple.style.display == "none") {
        menuDesple.style.display = "block";
    } else {
        menuDesple.style.display = "none";
    }
}

userPic.onclick = desplegarMenu;

/* Funcion menu aside*/

var burgerIcon = document.getElementById('burgerIcon');
var menuAside = document.getElementById('menuAside');

function mostrarMenu() {
    if (menuAside.style.display == "none") {
        menuAside.style.display = "block";
    }else{
        menuAside.style.display = "none";
    }
}

burgerIcon.onclick = mostrarMenu;
