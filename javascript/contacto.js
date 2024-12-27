const checkPolicy = document.getElementById('policy');
const contactButton = document.getElementById('contactButton');

function activarCheck() {
    if (checkPolicy.checked) {
        contactButton.disabled = false;
    } else {
        contactButton.disabled = true;
    }

}
checkPolicy.onclick = activarCheck;