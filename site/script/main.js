//NAVBAR
const btnHamburguer = document.getElementById('btn-hamburguer');
const btnClose = document.getElementById('btn-close');
const nav = document.getElementById('nav-1');

btnHamburguer.addEventListener("click", slide);
function slide() {
    btnHamburguer.style.display = "none";
    btnClose.style.display = "block";
    nav.style.display = "block";
    nav.style.left = "0%";
}

btnClose.addEventListener("click", hide);
function hide() {
    btnHamburguer.style.display = "block";
    btnClose.style.display = "none";
    nav.style.left = "-100%";
}

//DROPDOWN BAR
const btnDropdown = document.getElementById('btn-dropdown');
const dropdownRect = document.getElementById('dropdown-rect');

btnDropdown.addEventListener("click", dropdown);
function dropdown() {
    dropdownRect.style.display = "block";
}
//PARA OCULTAR A BARRA
if (dropdownRect.style.display === "block") {
    document.addEventListener("click", function (e) {
        if (e.target.idName !== "btn-dropdown") {
            dropdownRect.style.display = "none";
        }
    });
}