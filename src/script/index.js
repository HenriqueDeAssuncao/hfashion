function smoothScroll() {
    const internalLinks = document.querySelectorAll('a[href^="#"]');

    function scrollToSection(event) {
        event.preventDefault();
        const href = event.currentTarget.getAttribute('href');
        const section = document.querySelector(href);

        section.scrollIntoView({
            behavior: 'smooth',
            block: 'start' //Para alinhar certinho no início
        });
    }

    internalLinks.forEach((link) => {
        link.addEventListener('click', scrollToSection);
    })
}

smoothScroll();

// function iniciateAnimateScroll() {
//     const sections = document.querySelectorAll('.js-scroll');

//     if (sections.length) {
//         const halfWindow = window.innerHeight * 0.6;

//         function animateScroll() {
//             sections.forEach((section) => {
//                 const sectionTop = section.getBoundingClientRect().top;
//                 const isSectionVisible = (sectionTop - halfWindow) < 0;
//                 if (isSectionVisible) {
//                     section.classList.add('scroll-effect');
//                 } else {
//                     section.classList.remove('scroll-effect');
//                 }
//             })
//         }

//         animateScroll();

//         window.addEventListener('scroll', animateScroll);
//     }
// }

// iniciateAnimateScroll();