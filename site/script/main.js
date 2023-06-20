//ELEMENTOS:
const logo = document.querySelector('.logo-desktop');
const links = document.querySelectorAll('.links-nav-1 a');
const header = document.querySelector('header');
const banner = document.querySelector('#container-banner');
//URL ATUAL
let url = window.location.href;
//MEDIA QUERY
let isMobile = window.matchMedia('(max-width: 992px)');

//NAVBAR
const btnHamburguer = document.querySelector('.btn-hamburguer');
const btnClose = document.querySelector('.btn-close');
const nav = document.querySelector('.nav-1');

function slideNav() {
    btnHamburguer.classList.toggle('Hidden');
    btnClose.classList.toggle('Hidden');
    nav.classList.toggle('Hidden');
}

btnHamburguer.addEventListener("click", () => {
    slideNav();
});
btnClose.addEventListener("click", () => {
    slideNav();
});

//DROPDOWN BAR
const btnDropdown = document.querySelector('.profile-pic-header');
const dropdownRect = document.querySelector('.dropdown-rect');

btnDropdown.addEventListener("click", () => {
    dropdownRect.classList.toggle('Hidden');
});

document.addEventListener("click", ({ target }) => {
    if (target !== btnDropdown && !dropdownRect.contains(target)) {
        dropdownRect.classList.add('Hidden');
    }
});

//FUNÇÃO PARA QUE OS LINKS DO MENU FIQUEM BRANCOS OU PRETOS
function replaceLinksColors(from, to) {
    links.forEach((link) => {
        link.classList.replace(from, to);
    })
}

function setLinkColorIndex() {
    if (isMobile.matches) {
        if (links[1].classList.contains('Black')) {
            replaceLinksColors('Black', 'White');
        }
    } else {
        if (window.pageYOffset >= banner.clientHeight) {
            if (links[1].classList.contains('White')) {
                replaceLinksColors('White', 'Black');
            }
        }
    }
}

//HEADER NO INDEX  
if (url.endsWith('index.php') || url.endsWith('/')) {

    logo.setAttribute('src', `img/header/logo.svg`);
    btnHamburguer.classList.replace('Transparent', 'White');

    links.forEach((link) => {
        link.classList.replace('Transparent', 'White');
    })

    function verifyScroll() {
        if (window.pageYOffset >= banner.clientHeight-10) {
            logo.setAttribute('src', `img/header/logo-black.svg`);
            header.classList.add('Bg-white');
            header.classList.add('Box-shadow');
            btnHamburguer.classList.replace('White', 'Black');
            if (isMobile.matches === false) {
               replaceLinksColors('White', 'Black');
            }

        } else {
            logo.setAttribute('src', `img/header/logo.svg`);
            header.classList.remove('Bg-white');
            header.classList.remove('Box-shadow');
            btnHamburguer.classList.replace('Black', 'White');
            if (isMobile.matches === false) {
                replaceLinksColors('Black', 'White');
            }
        }
    }

    window.addEventListener("scroll", verifyScroll);
    window.addEventListener("resize", setLinkColorIndex);

} else {
    logo.setAttribute('src', `img/header/logo-black.svg`);
    header.classList.add('Box-shadow');
    btnHamburguer.classList.replace('Transparent', 'Black');
    if (isMobile.matches === false) {
        replaceLinksColors('White', 'Black');
    } 

    window.addEventListener("resize", () => {
        if (isMobile.matches === false) {
            replaceLinksColors('White', 'Black');
        }
        if (isMobile.matches) {
            if (links[1].classList.contains('Black')) {
                replaceLinksColors('Black', 'White');
            }
        }
    });

    header.classList.add('Bg-white');
    nav.classList.add('Bg-white');
}