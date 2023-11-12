<?php 
    require(__DIR__ . "/../config/conexion.php"); // obtener la conexion

	function registrarEmpleado($arreglo_asociativo) {
        global $conexion;
        $query = "";

        // retornar true o false dependiendo si se pudo registrar al empleado
    }

    function buscarEmpleado($cedula) {
        global $conexion;
        $query = "";

        // retornar un arreglo asociativo con los datos del empleado
    }

    function modificarEmpleado($arreglo_asociativo) { 
        global $conexion;
        $query = "";


        // retornar true o false dependiendo si pudo modificar al empleado
    }


    $datos_registrar = array(
        'prefijo' => '8',
        'tomo' => '966',
        'asiento' => '',
        'genero' => '',
        'cedula' => '',
        'nombre1' => '',
        'nombre2' => null,
        'apellido1' => '',
        'apellido2' => null,
        'estado_civil' => '',
        'apellido_casada' => null,
        'usa_apellido_casada' => '',
        'fecha_nacimiento' => 'YYYY-MM-DD',
        'peso' => '',
        'estatura' => '',
        'tipo_sangre' => '',
        'condicion_fisica' => '',
        'pais' => '',
        'provincia' => '',
        'distrito' => '',
        'corregimiento' => '',
        'comunidad' => '',
        'calle' => null,
        'casa' => null,
        'estado' => '1'
    );

    registrarEmpleado($datos_registrar);
?>