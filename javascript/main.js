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

/* Código de ChatGPT*/

/*document.getElementById("userPicContainer").addEventListener("click", function () {
    const menu = document.getElementById("menuDesplegable");
    if (menu.style.display === "none" || menu.style.display === "") {
        menu.style.display = "block";
    } else {
        menu.style.display = "none";
    }
});*/
