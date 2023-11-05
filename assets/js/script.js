const navPages = document.querySelectorAll('.page');
let currentPage = document.querySelector('.registrar');

function valoresIniciales() {
    // setear la fecha inicial
    const inputFecha =  document.querySelector('#input-fecha');
    let fechaActual = new Date();
    let actualyear = fechaActual.getFullYear();
    let mesActual = String(fechaActual.getMonth() + 1).padStart(2, '0');
    let diaActual = String(fechaActual.getDate()).padStart(2, '0');
    inputFecha.value = `${actualyear}-${mesActual}-${diaActual}`;   
}

// cargar el contenido principal
document.addEventListener('DOMContentLoaded', () => {
    $('main').load('assets/pages/registrar.html', valoresIniciales);
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