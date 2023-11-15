let empleados;
const form = document.querySelector('form');
const inputFecha = document.querySelector('#input-fecha');
const inputMonto = document.querySelector('#input-monto');
const inputMontoLetras = document.querySelector('#input-monto-letras');
const inputCedula = document.querySelector('#input-cedula');
const inputBeneficiario = document.querySelector('#input-beneficiario');
const buttonRegistrar = document.querySelector('#button-registrar');
const inputNumeroCheque = document.querySelector('#input-numero-cheque');
const inputObservaciones = document.querySelector('#input-observaciones');

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

function convertirMontoHaciaLetras() {
    // HTTP Request
    $.ajax({
        method: "POST", //  tipo de request
        url: "/administrador-planilla/numeroHaciaLetras.php", // direccion a donde se enviara el request
        data: {monto: inputMonto.value}, // datos que contendra el request
        success: function(response){
            inputMontoLetras.value = response;
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", status, error);
            console.log(xhr.responseText); // mostrar la respuesta del servidor
        }
    });
}

function verificarCampos() {
    if (inputCedula.value === '') {
        alert('Porfavor ingresa la cedula del empleado...')
        return false;
    }
    if (inputNumeroCheque.value === '') {
        alert('Porfavor ingresa el numero de cheque...');
        return false;
    }
    if (inputBeneficiario.value === '') {
        alert('Porfavor ingresa una cedual valida...');
        return false;
    }
    if (inputMonto.value === '') {
        alert('Porfavor ingresa el monto del cheque...');
        return false
    };
    if (inputObservaciones.value === '') {
        alert('Porfavor ingresa las observaciones del cheque...');
        return false;
    }
    if (inputFecha.value === '') {
        window.alert('Por favor, ingresa una fecha válida');
        return false;
    } 
    return true;
}


//
// EVENT LISTENERS
//

document.addEventListener('DOMContentLoaded', () => {
    $.ajax({
        type: 'GET',
        url: '/administrador-planilla/controladores/controlador_empleado.php',
        data: {
            accion: "obtnerCedulasYNombres",
        },
        dataType: 'json',
        success: (response) => {
            empleados = response;
            inputCedula.addEventListener('input', (event) => {
                const empleado = empleados.filter(person => person.cedula === event.target.value);
                if (empleado.length === 0) {
                    // No se encontró ningún empleado con la cédula ingresada
                    inputBeneficiario.value = '';
                } else {
                    // Se encontró al menos un empleado con la cédula ingresada
                    inputBeneficiario.value = `${empleado[0].nombre1} ${empleado[0].apellido1}`;
                }
            });
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", status, error);
            console.log(xhr.responseText); // mostrar la respuesta del servidor
        }
    })
})

inputCedula.addEventListener('keydown', (event) => {
    if (!isNaN(parseFloat(event.key)) || event.key === 'Backspace' || event.key === 'Tab' || event.key === 'Enter' || event.key === 'ArrowLeft' || event.key === 'ArrowRight' || event.key === '-') {
        if (inputCedula.value.length == 15 && event.key !== 'Backspace' && event.key !== 'Tab' && event.key !== 'ArrowLeft' && event.key !== 'ArrowRight') {
            event.preventDefault();
        }

        const inputText = event.target.value;
        // Check if there is at least one character in the input
        if (inputText.length > 0) {
            const lastChar = inputText.charAt(inputText.length - 1); 
            if (lastChar === '-' && event.key === '-') event.preventDefault();
        }
    } else { 
        event.preventDefault();
    } 
})

inputNumeroCheque.addEventListener('keydown', (event) => {
    if (!isNaN(parseFloat(event.key)) || event.key === 'Backspace' || event.key === 'Tab' || event.key === 'Enter' || event.key === 'ArrowLeft' || event.key === 'ArrowRight') {
        if (inputNumeroCheque.value.length == 7 && event.key !== 'Backspace' && event.key !== 'Tab' && event.key !== 'ArrowLeft' && event.key !== 'ArrowRight') {
            event.preventDefault();
        }
    } else { 
        event.preventDefault();
    }
})

inputMonto.addEventListener('keydown', (event) => {
    if (!isNaN(parseFloat(event.key)) || event.key === '.' || event.key === 'Backspace' || event.key === 'Tab' || event.key === 'Enter' || event.key === 'ArrowLeft' || event.key === 'ArrowRight') {
        // evitar mas de un zero a la izquierda
        if (inputMonto.value === '0' && !isNaN(parseFloat(event.key))) {
            event.preventDefault();
        }
        
        // evitar mas de dos decimales
        if (inputMonto.value.includes('.')) {
            partesDelMonto = inputMonto.value.split('.');
            parteDecimal = partesDelMonto[1];
            if (parteDecimal.length === 2 && !isNaN(parseFloat(event.key))) {
                event.preventDefault();
            }
        }

        // hacer la conversion numero al presiona TAB
        if (event.key === 'Tab') {
            if (inputMonto.value === '') {
                inputMontoLetras.value = '';
            } else {
                convertirMontoHaciaLetras();
            }
        }
    } else {
        event.preventDefault();
    }    
})

buttonRegistrar.addEventListener('click', (event) => {
    event.preventDefault();
    if (!verificarCampos()) return;
    if (inputCedula.value === '') {
        alert('Porfavor ingresa un numero de cedula valido...');
        return;
    }
    $.ajax({
        type: 'POST',
        url: '/administrador-planilla/controladores/controlador_planilla.php',
        data: {
            accion: 'registrar',
            numeroCheque: inputNumeroCheque.value,
            fecha: inputFecha.value,
            beneficiario: inputBeneficiario.value,
            monto: inputMonto.value,
            observaciones: inputObservaciones.value
        },
        dataType: 'text',
        success: (response) => {
            if (response === '1') {
                alert("Cheque registrado con exito!");
                form.reset();
                setearFechaInicial();
                return;
            } else {
                alert("Hubo un error al tratar de resgitar el cheque..."); 
            }
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", status, error);
            console.log(xhr.responseText); // mostrar la respuesta del servidor
        }
    })
})



//
// EJECUCIONES
//

setearFechaInicial();