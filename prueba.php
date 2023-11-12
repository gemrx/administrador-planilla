<?php
   
    require(__DIR__ ."/modelos/modelo_empleado.php");

    $datosNuevoEmpleado = [
        
    'prefijo' => '10',
    'tomo' => '500',
    'asiento' => '5000',
    'cedula' => '10-500-5000',
    'genero' => 'M',
    'nombre1' => 'MARIHUANO',
    'nombre2' => null,
    'apellido1' => 'Gómez',
    'apellido2' => 'Pérez',
    'estado_civil' => 'Soltero',
    'apellido_casada' => null,
    'usa_apellido_casada' => '0',
    'fecha_nacimiento' => '1990-01-01',
    'peso' => '70',
    'estatura' => '175',
    'tipo_de_sangre' => 'O+',
    'condicion_fisica' => 'Buena',
    'pais' => 'Panamá',
    'provincia' => 'Panamá',
    'distrito' => 'Panamá',
    'corregimiento' => 'Bella Vista',
    'comunidad' => 'ComunidadPrueba',
    'calle' => 'CallePrueba',
    'casa' => '123',
    'estado' => '1',
    ];
    
    // Llamada a la función de registro
    $resultadoRegistro = registrarEmpleado($datosNuevoEmpleado);
    
    // Mostrar el resultado
    if ($resultadoRegistro) {
        echo "Empleado registrado correctamente.\n";
    } else {
        echo "Error al registrar el empleado.\n";
    }
     
    
   // Datos para la edición del empleado
// $datosEdicionEmpleado = [
    
//     'prefijo' => '8',
//     'tomo' => '990',
//     'asiento' => '1734',
//     'cedula' => '8-990-1734',
//     'genero' => 'F',
//     'nombre1' => 'Juan',
//     'nombre2' => 'Carlos',
//     'apellido1' => 'Gómez',
//     'apellido2' => 'Pérez',
//     'estado_civil' => 'Soltero',
//     'apellido_casada' => null,
//     'usa_apellido_casada' => 'No',
//     'fecha_nacimiento' => '1990-01-01',
//     'peso' => '70',
//     'estatura' => '175',
//     'tipo_sangre' => 'O+',
//     'condicion_fisica' => 'Buena',
//     'pais' => 'Panamá',
//     'provincia' => 'Panamá',
//     'distrito' => 'Panamá',
//     'corregimiento' => 'Bella Vista',
//     'comunidad' => 'ComunidadPrueba',
//     'calle' => 'CallePrueba',
//     'casa' => '123',
//     'estado' => 'Activo',
    
// ];

// // Llamada a la función de edición
// $resultadoEdicion = modificarEmpleado($datosEdicionEmpleado);

// Mostrar el resultado
// if ($resultadoEdicion) {
//     echo "Empleado editado correctamente.\n";
// } else {
//     echo "Error al editar el empleado.\n";
//     }
    
// //Prueba para buscar Empleado
//     $cedulaParaPrueba = "8-990-1734";

//     // Llamada a la función de búsqueda
//     $resultadoBusqueda = buscarEmpleado($cedulaParaPrueba);
    
//     // Mostrar el resultado
//     if ($resultadoBusqueda) {
//         echo "Cédula encontrada. Datos del empleado:\n";
//         print_r($resultadoBusqueda);
//     } else {
//         echo "Cédula no encontrada.\n";
//     }
?>
