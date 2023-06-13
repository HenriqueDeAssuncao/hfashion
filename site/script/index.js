//Header transparente só por cima do banner
const banner = document.querySelector('.js-container-banner');
const header = document.querySelector('.js-header');
const logo = document.querySelector('.logo-desktop');
const links = document.querySelectorAll('.links-nav-1 a');

logo.setAttribute('src', 'img/header/logo.svg')


function verifyScroll() {
    if (window.pageYOffset >= banner.clientHeight) {
        header.style.backgroundColor = 'white';
        btnHamburguer.classList.remove('Color-white');
        logo.setAttribute('src', 'img/header/logo-black.svg')
        links.forEach((link) => {
            link.style.color="black";
        })
    } else {
        header.style.backgroundColor = 'transparent';
        btnHamburguer.classList.add('Color-white');
        logo.setAttribute('src', 'img/header/logo.svg')
        links.forEach((link) => {
            link.style.color="white";
        })
    }
}

window.addEventListener('scroll', verifyScroll);