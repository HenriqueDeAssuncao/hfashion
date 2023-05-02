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

