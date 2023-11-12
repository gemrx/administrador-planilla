//
// VARIABLES
//
const form = document.querySelector('form');
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
const selectEstadoCivil = document.querySelector('#select-estado-civil');
const inputEstatura = document.querySelector('#input-estatura');
const inputsNumericos = document.querySelectorAll('.numerico');
const buttonSubmit = document.querySelector('#submit');
const selectPrefijo = document.querySelector('#select-prefijo');
const inputTomo = document.querySelector('#input-tomo');
const inputAsiento = document.querySelector('#input-asiento');
const inputNombre1 = document.querySelector('#input-nombre');
const inputNombre2 = document.querySelector('#input-segundo-nombre');
const inputApellido1 = document.querySelector('#input-apellido');
const inputApellido2 = document.querySelector('#input-segundo-apellido');
const inputPeso = document.querySelector('#input-peso');
const selectTipoSangre = document.querySelector('#select-tipo-sangre');
const inputCondicionFisica = document.querySelector('#input-condicion-fisica');
const inputComunidad = document.querySelector('#input-comunidad');
const inputCalle = document.querySelector('#input-calle');
const inputCasa = document.querySelector('#input-casa');

//
// FUNCIONES
//

function setearFechaInicial() {
    let fechaActual = new Date();
    let actualyear = fechaActual.getFullYear();
    let mesActual = String(fechaActual.getMonth() + 1).padStart(2, '0');
    let diaActual = String(fechaActual.getDate()).padStart(2, '0');
    inputFecha.value = `${actualyear}-${mesActual}-${diaActual}`;
}



//
// EVENT LISTENERS
//

// cambiar genero de los estados civiles
selectGenero.addEventListener('change', () => {
    if (selectGenero.value === 'F') {
        let nuevosEstadosCiviles = `<option value="SOLTERA" selected>Soltera</option>
                                    <option value="CASADA">Casada</option>
                                    <option value="VIUDA">Viuda</option>
                                    <option value="DIVORCIADA">Divorciada</option>`
        selectEstadoCivil.innerHTML = nuevosEstadosCiviles;
    } else {
        let nuevosEstadosCiviles = `<option value="SOLTERO" selected>Soltero</option>
                                    <option value="CASADO">Casado</option>
                                    <option value="VIUDO">Viudo</option>
                                    <option value="DIVORCIADO">Divorciado</option>`
        selectEstadoCivil.innerHTML = nuevosEstadosCiviles;
        if (!inputApellidoCasada.classList.contains('oculto')) {
            labelApellidoCasada.classList.add('oculto');
            inputApellidoCasada.classList.add('oculto');
        }
    }
})


// mostrar o ocultar apellido de casada
selectEstadoCivil.addEventListener('change', () => {
    if (selectEstadoCivil.value === 'CASADA' || selectEstadoCivil.value === 'VIUDA') {
        labelApellidoCasada.classList.remove('oculto');
        inputApellidoCasada.classList.remove('oculto');
    } else {
        labelApellidoCasada.classList.add('oculto');
        inputApellidoCasada.classList.add('oculto');
    }
})

// ocultar / ocultar provincia, distrito y corregimiento
selectPais.addEventListener('change', () => {
    if (selectPais.value !== 'Panamá') {
        labelProvincia.classList.add('oculto')
        labelDistrito.classList.add('oculto')
        labelCorregimiento.classList.add('oculto')
        selectProvincia.classList.add('oculto');
        selectDistrito.classList.add('oculto');
        selectCorregimiento.classList.add('oculto');
    } else {
        labelProvincia.classList.remove('oculto')
        labelDistrito.classList.remove('oculto')
        labelCorregimiento.classList.remove('oculto')
        selectProvincia.classList.remove('oculto');
        selectDistrito.classList.remove('oculto');
        selectCorregimiento.classList.remove('oculto');
    }
})

// al cambiar la provincia, cambiar el distritos y los corregimientos
selectProvincia.addEventListener('change', () => {
    $.ajax({
        type: 'GET',
        url: '/administrador-planilla/controladores/controlador_ubicacion.php',
        data: {
            accion: "cambioDeProvincia",
            codigoProvincia: selectProvincia.value
        },
        dataType: 'json', // tipo de dato que tendra la respuesta
        success: (response) => {
            // actualizar provincias y distritos
            selectDistrito.innerHTML = response.nuevosDistritos;
            selectCorregimiento.innerHTML =  response.nuevosCorregimientos;
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", status, error);
            console.log(xhr.responseText); // mostrar la respuesta del servidor
        }
    })
})

// al cambiar el distrito, cambiar los corregimientos
selectDistrito.addEventListener('change', () => {
    $.ajax({
        type: 'GET',
        url: '/administrador-planilla/controladores/controlador_ubicacion.php',
        data: {
            accion: "cambioDeDistrito",
            codigoDistrito: selectDistrito.value
        },
        dataType: 'html', // tipo de dato que tendra la respuesta
        success: (response) => {
            // actualizar los corregimientos
            selectCorregimiento.innerHTML = response;
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", status, error);
            console.log(xhr.responseText); // mostrar la respuesta del servidor
        }
    })
})

// prevenir ingresa el caracter 'e' en inputs de tipo numerico
inputsNumericos.forEach(input => {
    input.addEventListener('keydown', (event) => {
        if (event.key === 'e') event.preventDefault();  
    })
});

form.addEventListener('submit', (event) => {
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: '/administrador-planilla/controladores/controlador_empleado.php',
        data: "accion=registrar&" + $('form').serialize(),
        dataType: 'json', // tipo de dato que tendra la respuesta
        success: (response) => {
            console.log(response);
            alert("Empleado resgitrado con exito!")
            // document.querySelector('form').reset();
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", status, error);
            console.log(xhr.responseText); // mostrar la respuesta del servidor
        }
    })
});


//
// EJECUCIONES
//
setearFechaInicial();