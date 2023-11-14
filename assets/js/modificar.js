//
// VARIABLES
//
const form = document.querySelector('form');
const buttonBuscar = document.querySelector('button-buscar');
const inputCedula = document.querySelector('input-cedula');

//
// EVENTS LISTENERS
//

form.addEventListener('submit', (event) => {
    event.preventDefault();
})

buttonBuscar.addEventListener('click', () => {
    $.ajax({
        type: 'GET',
        url: '/administrador-planilla/controladores/controlador_empleado.php',
        data: {
            accion: "buscarEmpleado",
            cedula: inputCedula.value
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


