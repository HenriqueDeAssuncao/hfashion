//NAVBAR
const btnHamburguer = document.querySelector('.btn-hamburguer');
const btnClose = document.querySelector('.btn-close');
const nav = document.querySelector('.nav-1');

function slide() {
    btnHamburguer.style.display = "none";
    btnClose.style.display = "block";
    nav.style.display = "block";
    nav.style.left = "0%";
}

function hide() {
    btnHamburguer.style.display = "block";
    btnClose.style.display = "none";
    nav.style.left = "-100%";
}

btnHamburguer.addEventListener("click", slide);
btnClose.addEventListener("click", hide);


//DROPDOWN BAR
const btnDropdown = document.querySelector('.profile-pic-header');
const dropdownRect = document.querySelector('.dropdown-rect');

btnDropdown.addEventListener("click", () => {
    dropdownRect.classList.toggle('Hidden');
});

document.addEventListener("click", ({ target }) => {
    if (target !== btnDropdown && !dropdownRect.contains(target)) {
        dropdownRect.classList.add("Hidden");
    }
});