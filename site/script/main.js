//ELEMENTOS:
const logo = document.querySelector('.logo-desktop');
const links = document.querySelectorAll('.links-nav-1 a');
const header = document.querySelector('header');
//URL ATUAL
let url = window.location.href;
//MEDIA QUERY
function isDesktop() {
    return window.matchMedia('(min-width: 992px)').matches;
}

//NAVBAR
const btnHamburguer = document.querySelector('.btn-hamburguer');
const btnClose = document.querySelector('.btn-close');
const nav = document.querySelector('.nav-1');

function slideNav() {
    btnHamburguer.classList.toggle('Hidden');
    btnClose.classList.toggle('Hidden');
    nav.classList.toggle('Hidden');
}

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

//HEADER NO INDEX  
if (url.endsWith('index.php') || url.endsWith('/')) {
    const banner = document.querySelector('.js-container-banner');

    logo.setAttribute('src', `img/header/logo.svg`);
    btnHamburguer.classList.replace('Transparent', 'White');

    links.forEach((link) => {
        link.classList.add('White');
    })

    function verifyScroll() {
        if (window.pageYOffset >= banner.clientHeight) {
            logo.setAttribute('src', `img/header/logo-black.svg`);
            header.classList.add('Bg-white');
            header.classList.add('Box-shadow');
            btnHamburguer.classList.replace('White', 'Black');
            links.forEach((link) => {
                link.classList.replace('White', 'Black');
            })

        } else {
            logo.setAttribute('src', `img/header/logo.svg`);
            header.classList.remove('Bg-white');
            header.classList.remove('Box-shadow');
            btnHamburguer.classList.replace('Black', 'White');
            links.forEach((link) => {
                link.classList.replace('Black', 'White');
            })
        }
    }

    window.addEventListener('scroll', verifyScroll);

    window.addEventListener('resize', isDesktop);

    btnHamburguer.addEventListener("click", () => {
        slideNav();
    });

    btnClose.addEventListener("click", () => {
        slideNav();
    });

} else {
    logo.setAttribute('src', `img/header/logo-black.svg`);
    header.classList.add('Box-shadow');
    btnHamburguer.classList.replace('Transparent', 'Black');
    links.forEach((link) => {
        link.classList.add('Black');
    })
    header.classList.add('Bg-white');
    nav.classList.add('Bg-white');

    btnHamburguer.addEventListener("click", () => {
        slideNav();
    });
    btnClose.addEventListener("click", () => {
        slideNav();
    });
}