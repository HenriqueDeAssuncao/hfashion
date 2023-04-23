const btnHamburguer = document.getElementById('btn-hamburguer');
const btnClose = document.getElementById('btn-close');
const navList = document.getElementById('nav-list');

btnHamburguer.addEventListener("click", function showNav() {
    navList.style.height = '100px';
    btnHamburguer.style.display = 'none';
    btnClose.style.display = 'block';
});
btnHideMenu.addEventListener("click", function hideMenu() {
    navList.style.height = '0px';
    btnHamburguer.style.display = 'block';
    btnClose.style.display = 'none';
});