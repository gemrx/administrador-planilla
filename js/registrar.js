// VARIABLES
//
const inputFecha =  document.querySelector('#input-fecha');
const selectGenero = document.querySelector('#select-genero');
const labelApellidoCasada = document.querySelector('.label-apellido-casada');
const inputApellidoCasada = document.querySelector('#input-apellido-casada');

// FUNCIONES
//
function setearFechaInicial() {
    let fechaActual = new Date();
    let actualyear = fechaActual.getFullYear();
    let mesActual = String(fechaActual.getMonth() + 1).padStart(2, '0');
    let diaActual = String(fechaActual.getDate()).padStart(2, '0');
    inputFecha.value = `${actualyear}-${mesActual}-${diaActual}`;
}


// EVENT LISTENERS
//
selectGenero.addEventListener('change', () => {
    if (selectGenero.value == 'F') {
        labelApellidoCasada.classList.remove('oculto');
        inputApellidoCasada.classList.remove('oculto');
    } else {
        labelApellidoCasada.classList.add('oculto');
        inputApellidoCasada.classList.add('oculto');
    }
})


// EJECUCIONES
setearFechaInicial();