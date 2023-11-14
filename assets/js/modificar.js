//
// VARIABLES
//
const form = document.querySelector('form');
const buttonBuscar = document.querySelector('#button-buscar');
const buttonModificar = document.querySelector('#button-modificar');
const labelApellidoCasada = document.querySelector('.label-apellido-casada');
const labelPais = document.querySelector('.label-pais');
const labelProvincia = document.querySelector('.label-provincia');
const labelDistrito = document.querySelector('.label-distrito');
const labelCorregimiento = document.querySelector('.label-corregimiento');
const selectGenero = document.querySelector('#select-genero');
const selectEstadoCivil = document.querySelector('#select-estado-civil');
const selectTipoSangre = document.querySelector('#select-tipo-sangre')
const selectPais = document.querySelector('#select-pais');
const selectProvincia = document.querySelector('#select-provincia');
const selectDistrito = document.querySelector('#select-distrito');
const selectCorregimiento = document.querySelector('#select-corregimiento');
const inputCedula = document.querySelector('#input-cedula');
const inputNombre1 = document.querySelector('#input-nombre');
const inputNombre2 = document.querySelector('#input-segundo-nombre');
const inputApellido1 = document.querySelector('#input-apellido'); 
const inputApellido2 = document.querySelector('#input-segundo-apellido');
const inputApellidoCasada = document.querySelector('#input-apellido-casada');
const inputFecha = document.querySelector('#input-fecha');
const inputEstatura = document.querySelector('#input-estatura');
const inputPeso = document.querySelector('#input-peso');
const inputCondicionFisica = document.querySelector('#input-condicion-fisica')
const inputComunidad = document.querySelector('#input-comunidad');
const inputCalle = document.querySelector('#input-calle');
const inputCasa = document.querySelector('#input-casa');
const selectEstado = document.querySelector('#select-estado');

//
// FUNCIONES
//

function actualizarCampos(objetoDatos) {
    const changeEvent = new Event('change');

    // genero
    selectGenero.value = objetoDatos.genero;
    selectGenero.dispatchEvent(changeEvent); 

    // estado civil
    selectEstadoCivil.value = objetoDatos['estado_civil'];
    selectEstadoCivil.dispatchEvent(changeEvent)


    inputNombre1.value = objetoDatos.nombre1;
    inputNombre2.value = objetoDatos.nombre2;
    inputApellido1.value = objetoDatos.apellido1;
    inputApellido2.value = objetoDatos.apellido2;
    inputApellidoCasada.value = objetoDatos['apellido_casada'];
    inputFecha.value = objetoDatos['fecha_nacimiento'];
    inputEstatura.value = objetoDatos.estatura;
    inputPeso.value = objetoDatos.peso;
    selectTipoSangre.value = objetoDatos['tipo_de_sangre'];
    inputCondicionFisica.value = objetoDatos['condicion_fisica'];

    // pais
    selectPais.value = objetoDatos.pais;
    selectPais.dispatchEvent(changeEvent);
    selectProvincia.value = objetoDatos.provincia;
    
    if (selectPais.value == 'Panamá') {
        $.ajax({
            type: 'GET',
            url: '/administrador-planilla/controladores/controlador_ubicacion.php',
            data: {
                accion: "obtenerDistritoCorregimiento",
                codigoProvincia: objetoDatos.provincia,
                codigoDistrito: objetoDatos.distrito,
                codigoCorregimiento: objetoDatos.corregimiento
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
    }
    inputComunidad.value = objetoDatos.comunidad;
    inputCalle.value = objetoDatos.calle;
    inputCasa.value = objetoDatos.casa;
    selectEstado.value = objetoDatos.estado;
}

function setearFechaInicial() {
    let fechaActual = new Date();
    let actualyear = fechaActual.getFullYear();
    let mesActual = String(fechaActual.getMonth() + 1).padStart(2, '0');
    let diaActual = String(fechaActual.getDate()).padStart(2, '0');
    inputFecha.value = `${actualyear}-${mesActual}-${diaActual}`;
}


//
// EVENTS LISTENERS
//

// cambiar genero
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

// mostrar / ocultar provincia, distrito y corregimiento
selectPais.addEventListener('change', () => {
    if (selectPais.value !== 'Panamá') {
        // asignarles un string vacio como valor por defecto
        selectProvincia.value = '';
        selectDistrito.value = '';
        selectCorregimiento.value = '';  

        // ocultar los elementos
        labelProvincia.classList.add('oculto')
        labelDistrito.classList.add('oculto')
        labelCorregimiento.classList.add('oculto')
        selectProvincia.classList.add('oculto');
        selectDistrito.classList.add('oculto');
        selectCorregimiento.classList.add('oculto'); 
    } else {
        // mostrar los elementos
        labelProvincia.classList.remove('oculto')
        labelDistrito.classList.remove('oculto')
        labelCorregimiento.classList.remove('oculto')
        selectProvincia.classList.remove('oculto');
        selectDistrito.classList.remove('oculto');
        selectCorregimiento.classList.remove('oculto');

        // asignarles la primera opcion como su valor por defecto
        selectProvincia.value = selectProvincia.options[0].value;
        selectDistrito.value = selectDistrito.options[0].value;
        selectCorregimiento.value = selectCorregimiento.options[0].value;
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

// buscar empleado
buttonBuscar.addEventListener('click', (event) => {
    event.preventDefault();
    if (inputCedula.value ==='') {
        alert('Porfavor ingresa la cedula de empleado...');
        return;
    }
    $.ajax({
        type: 'GET',
        url: '/administrador-planilla/controladores/controlador_empleado.php',
        data: {
            accion: "buscar",
            cedula: inputCedula.value
        },
        dataType: 'json', // tipo de dato que tendra la respuesta
        success: (response) => {
            if (response === false) {
                alert("No existe empleado registrado con esa cedula...")
                inputCedula.value = "";
                return;
            }
            actualizarCampos(response);
            buttonModificar.removeAttribute("disabled");
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", status, error);
            console.log(xhr.responseText); // mostrar la respuesta del servidor
        }
    })
})

buttonModificar.addEventListener('click', (event) => {
    event.preventDefault();

    // obtener todos los datos del formulario en formato json
    const form = document.querySelector('form');
    const formData =  new FormData(form);
    const datos = Object.fromEntries(formData.entries());
    datos.accion = "modificar";

    $.ajax({
        type: 'POST',
        url: '/administrador-planilla/controladores/controlador_empleado.php',
        data: datos,
        dataType: 'json', // tipo de dato que tendra la respuesta
        success: (response) => {
            if (response) {
                alert("Empleado modificado con exito!");
                form.reset();
                setearFechaInicial();
                buttonModificar.removeAttribute("disabled");
                return;
            }
            alert("Ah ocurrido un error al intentar modificar al empleado...");
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", status, error);
            console.log(xhr.responseText); // mostrar la respuesta del servidor
        }
    })
})

setearFechaInicial();




