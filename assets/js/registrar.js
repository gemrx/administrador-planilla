// VARIABLES
//
const inputFecha =  document.querySelector('#input-fecha');
const selectGenero = document.querySelector('#select-genero');
const labelApellidoCasada = document.querySelector('.label-apellido-casada');
const inputApellidoCasada = document.querySelector('#input-apellido-casada');
const labelPais = document.querySelector('.label-pais');
const labelProvincia = document.querySelector('.label-provincia');
const labelDistrito = document.querySelector('.label-distrito');
const labelCorregimiento = document.querySelector('.label-corregimiento');
const selectPais = document.querySelector('#select-pais');
const selectProvincia = document.querySelector('#select-provincia');
const selectDistrito = document.querySelector('#select-distrito');
const selectCorregimiento = document.querySelector('#select-corregimiento');

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
    if (selectGenero.value === 'F') {
        labelApellidoCasada.classList.remove('oculto');
        inputApellidoCasada.classList.remove('oculto');
    } else {
        labelApellidoCasada.classList.add('oculto');
        inputApellidoCasada.classList.add('oculto');
    }
})

selectPais.addEventListener('change', () => {
    if (selectPais.value !== 'Panamá') {
        // ocultar provincia, distrito y corregimiento
        labelProvincia.classList.add('oculto')
        labelDistrito.classList.add('oculto')
        labelCorregimiento.classList.add('oculto')
        selectProvincia.classList.add('oculto');
        selectDistrito.classList.add('oculto');
        selectCorregimiento.classList.add('oculto');
    } else {
        // mostrar provincia, distrito y corregimiento
        labelProvincia.classList.remove('oculto')
        labelDistrito.classList.remove('oculto')
        labelCorregimiento.classList.remove('oculto')
        selectProvincia.classList.remove('oculto');
        selectDistrito.classList.remove('oculto');
        selectCorregimiento.classList.remove('oculto');
    }
})


// EJECUCIONES
setearFechaInicial();