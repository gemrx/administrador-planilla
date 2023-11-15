<?php 
    require(__DIR__ . "/../config/conexion.php"); // obtener la conexion

    function formatearValor($value) {
        return ($value === "") ? "NULL" : "'$value'";
    }

    function existeEmpleado($cedula) {
        global $conexion;
        $query = "SELECT COUNT(*) as total FROM generales WHERE cedula = '$cedula'";
        $query_result = mysqli_query($conexion, $query);
        $fila = mysqli_fetch_assoc($query_result);
        $total =  $fila["total"];
        return ($total > 0);
    }

	function registrarEmpleado($datos) {
        global $conexion;
        
        if (existeEmpleado($datos['cedula'])) {
            return false;
        } else {
            // obtener los valores del arreglo asociativo
            $prefijo = formatearValor($datos['prefijo']);
            $tomo = formatearValor($datos['tomo']);
            $asiento = formatearValor($datos['asiento']);
            $cedula = formatearValor($datos['cedula']);
            $genero = formatearValor($datos['genero']);
            $nombre1 = formatearValor($datos['nombre1']);
            $nombre2 = formatearValor($datos['nombre2']);
            $apellido1 = formatearValor($datos['apellido1']);
            $apellido2 = formatearValor($datos['apellido2']);
            $estado_civil = formatearValor($datos['estado_civil']);
            $apellido_casada = formatearValor($datos['apellido_casada']);
            $usa_apellido_casada = formatearValor($datos['usa_apellido_casada']);
            $fecha_nacimiento = formatearValor($datos['fecha_nacimiento']);
            $peso = formatearValor($datos['peso']);
            $estatura = formatearValor($datos['estatura']);
            $tipo_de_sangre = formatearValor($datos['tipo_de_sangre']);
            $condicion_fisica = formatearValor($datos['condicion_fisica']);
            $pais = formatearValor($datos['pais']);
            $provincia = formatearValor($datos['provincia']);
            $distrito = formatearValor($datos['distrito']);
            $corregimiento = formatearValor($datos['corregimiento']);
            $comunidad = formatearValor($datos['comunidad']);
            $calle = formatearValor($datos['calle']);
            $casa = formatearValor($datos['casa']);
            $estado = formatearValor($datos['estado']);

            // query para la insercion de los datos
            $query = "INSERT INTO generales (
                        prefijo, tomo, asiento, genero, cedula, nombre1, nombre2, apellido1, apellido2,
                        estado_civil, apellido_casada, usa_apellido_casada, fecha_nacimiento, peso, estatura,
                        tipo_de_sangre, condicion_fisica, pais, provincia, distrito, corregimiento, comunidad,
                        calle, casa, estado
                    ) 
                    VALUES (
                        $prefijo, $tomo, $asiento, $genero, $cedula, $nombre1, $nombre2, $apellido1, $apellido2,
                        $estado_civil, $apellido_casada, $usa_apellido_casada, $fecha_nacimiento, $peso, $estatura,
                        $tipo_de_sangre, $condicion_fisica, $pais, $provincia, $distrito, $corregimiento, $comunidad,
                        $calle, $casa, $estado
                    )";
                    
            // Ejecutar la consulta
            $resultado = mysqli_query($conexion, $query);
        
            // Verificar si la consulta fue exitosa
            if ($resultado) {
                return true;  
            } else {
                return false; 
            }
        }  
    }
    
    function obtenerEmpleado($cedula) {
        // verificar que exista el usuario
        if (!existeEmpleado($cedula)) return false; 

        // configuracion del query
        global $conexion;
        $query = "SELECT * FROM generales WHERE cedula = '$cedula'";
        $query_result = mysqli_query($conexion, $query);

        // verificar que el query no de errores
        if (!$query_result) {
            return false;
        }

        // retornar los datos de la fila obtenida
        $fila = mysqli_fetch_assoc($query_result);
        return $fila;
    }

    function modificarEmpleado($nuevos_datos) {
        global $conexion;
        $cedula = $nuevos_datos['cedula'];
        if (!existeEmpleado($cedula)) {
            return false;
        }
        $nombre1 = formatearValor($nuevos_datos['nombre1']);
        $nombre2 = formatearValor($nuevos_datos['nombre2']);
        $apellido1 = formatearValor($nuevos_datos['apellido1']);
        $apellido2 = formatearValor($nuevos_datos['apellido2']);
        $genero = formatearValor($nuevos_datos['genero']);
        $estadoCivil = formatearValor($nuevos_datos['estado_civil']);
        $apellidoCasada = formatearValor($nuevos_datos['apellido_casada']);
        $usaApellidoCasada = formatearValor($nuevos_datos['usa_apellido_casada']);
        $fechaNacimiento = formatearValor($nuevos_datos['fecha_nacimiento']);
        $peso = formatearValor($nuevos_datos['peso']);
        $estatura = formatearValor($nuevos_datos['estatura']);
        $tipo_de_sangre = formatearValor($nuevos_datos['tipo_de_sangre']);
        $condicionFisica = formatearValor($nuevos_datos['condicion_fisica']);
        $pais = formatearValor($nuevos_datos['pais']);
        $provincia = formatearValor($nuevos_datos['provincia']);
        $distrito = formatearValor($nuevos_datos['distrito']);
        $corregimiento = formatearValor($nuevos_datos['corregimiento']);
        $comunidad = formatearValor($nuevos_datos['comunidad']);
        $calle = formatearValor($nuevos_datos['calle']);
        $casa = formatearValor($nuevos_datos['casa']);
        $estado = formatearValor($nuevos_datos['estado']);

        $query = "UPDATE generales
                  SET nombre1 = $nombre1,
                      nombre2 = $nombre2,
                      apellido1 = $apellido1,
                      apellido2 = $apellido2,
                      genero = $genero,
                      estado_civil = $estadoCivil,
                      apellido_casada = $apellidoCasada,
                      usa_apellido_casada = $usaApellidoCasada,
                      fecha_nacimiento = $fechaNacimiento,
                      peso = $peso,
                      estatura = $estatura,
                      tipo_de_sangre = $tipo_de_sangre,
                      condicion_fisica = $condicionFisica,
                      pais = $pais,
                      provincia = $provincia,
                      distrito = $distrito,
                      corregimiento = $corregimiento,
                      comunidad = $comunidad,
                      calle = $calle,
                      casa = $casa,
                      estado = $estado
                  WHERE cedula = '$cedula'";
        return mysqli_query($conexion, $query);
    }

    function obtenerEmpleados() {
        global $conexion;
        $query = "SELECT cedula, nombre1, apellido1 FROM generales";
        $query_result = mysqli_query($conexion, $query);
        $empleados = [];
        while ($fila_actual = mysqli_fetch_assoc($query_result)) {
            $empleados[] = $fila_actual; // agregar la fila actual como un arreglo asociativo
        }
        return $empleados;
    }
?>