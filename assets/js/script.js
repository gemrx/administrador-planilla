const navPages = document.querySelectorAll('.page');
let currentPage = document.querySelector('.registrar');

// cargar el contenido principal
document.addEventListener('DOMContentLoaded', () => {
    $('main').load('assets/pages/registrar.html');
})

// cambiar de pagina
navPages.forEach(page => {
    page.addEventListener('click', (event) => {
        event.preventDefault();
        if (page.classList[1] === currentPage) return
        currentPage.classList.remove('active');
        currentPage = page;
        currentPage.classList.add('active');
        const href = page.querySelector('a').getAttribute('href');
        $('main').load(href);
    })
});