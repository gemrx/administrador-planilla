const navLinks = document.querySelectorAll('.page');
let currentPage = document.querySelector('.registrar');

// cargar el contenido principal
document.addEventListener('DOMContentLoaded', () => {
    $('main').load('assets/pages/registrar.html');
})

// cambiar de pagina
navLinks.forEach(link => {
    link.addEventListener('click', (event) => {
        event.preventDefault();
        if (link.classList[1] === currentPage) return
        currentPage.classList.remove('active');
        currentPage = link;
        currentPage.classList.add('active');
        const href = link.querySelector('a').getAttribute('href');
        $('main').load(href);
    })
});