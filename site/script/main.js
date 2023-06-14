//NAVBAR ELEMENTOS
const btnHamburguer = document.querySelector('.btn-hamburguer');
const btnClose = document.querySelector('.btn-close');
const nav = document.querySelector('.nav-1');
let verifyScreenWidth = window.matchMedia('(max-width: 992px)');
//DROPDOWN BAR ELEMENTOS
const btnDropdown = document.querySelector('.profile-pic-header');
const dropdownRect = document.querySelector('.dropdown-rect');

//FUNÇÕES SIDE BAR
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
    nav.style.backgroundColor = "transparent";
}

//FUNÇÕES ANÔNIMAS DROPDOWN MENU
btnDropdown.addEventListener("click", () => {
    dropdownRect.classList.toggle('Hidden');
});

document.addEventListener("click", ({ target }) => {
    if (target !== btnDropdown && !dropdownRect.contains(target)) {
        dropdownRect.classList.add("Hidden");
    }
});

//JS ESPECIAL PARA O INDEX
if (window.location.href == "http://localhost/hfashion/site/") {
    //HEADER ELEMENTOS
    const banner = document.querySelector('.js-container-banner');
    const header = document.querySelector('.js-header');
    const logo = document.querySelector('.logo-desktop');
    const links = document.querySelectorAll('.links-nav-1 a');

    //COLOCO A LOGO BRANCA
    logo.setAttribute('src', 'img/header/logo.svg')

    function verifyScroll() {
        if (window.pageYOffset >= banner.clientHeight) {
            header.style.backgroundColor = 'white';
            btnHamburguer.classList.remove('Color-white');
            logo.setAttribute('src', 'img/header/logo-black.svg')
            links.forEach((link) => {
                link.style.color = "black";
            })
        } else {
            header.style.backgroundColor = 'transparent';
            btnHamburguer.classList.add('Color-white');
            logo.setAttribute('src', 'img/header/logo.svg')
            links.forEach((link) => {
                link.style.color = "white";
            })
        }
    }

    window.addEventListener('scroll', verifyScroll);
}

//ADICIONO OS EVENTOS SEM ALTERAR O MENU
if (verifyScreenWidth.matches) {
    btnHamburguer.addEventListener("click", () => {
        slide();
    });
    btnClose.addEventListener("click", () => {
        hide();
    });
}


