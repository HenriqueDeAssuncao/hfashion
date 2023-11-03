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