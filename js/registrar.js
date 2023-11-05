// setear la fecha inicial
const inputFecha =  document.querySelector('#input-fecha');
let fechaActual = new Date();
let actualyear = fechaActual.getFullYear();
let mesActual = String(fechaActual.getMonth() + 1).padStart(2, '0');
let diaActual = String(fechaActual.getDate()).padStart(2, '0');
inputFecha.value = `${actualyear}-${mesActual}-${diaActual}`;