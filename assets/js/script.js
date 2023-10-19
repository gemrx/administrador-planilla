const navLinks = document.querySelectorAll('.page');


// cargar el contenido principal
document.addEventListener('DOMContentLoaded', () => {
    $('main').load('assets/pages/registrar.html');
})

// cambiar el contenido sin necesidad de refrescar la pagina
navLinks.forEach(link => {
    link.addEventListener('click', (event) => {
        event.preventDefault();
        const href = event.target.getAttribute('href');
        $('main').load(href);
    })
});