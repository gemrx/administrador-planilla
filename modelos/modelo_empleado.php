<?php 
    require(__DIR__ . "/../config/conexion.php"); // obtener la conexion

    function formatearValor($value) {
        return ($value === "") ? "NULL" : "'$value'";
    }

	function registrarEmpleado($arreglo_asociativo) {
        global $conexion;
    
        // Obtener los valores del arreglo asociativo
        $prefijo = formatearValor($arreglo_asociativo['prefijo']);
        $tomo = formatearValor($arreglo_asociativo['tomo']);
        $asiento = formatearValor($arreglo_asociativo['asiento']);
        $genero = formatearValor($arreglo_asociativo['genero']);
        $cedula = formatearValor($arreglo_asociativo['cedula']);
        $nombre1 = formatearValor($arreglo_asociativo['nombre1']);
        $nombre2 = formatearValor($arreglo_asociativo['nombre2']);
        $apellido1 = formatearValor($arreglo_asociativo['apellido1']);
        $apellido2 = formatearValor($arreglo_asociativo['apellido2']);
        $estado_civil = formatearValor($arreglo_asociativo['estado_civil']);
        $apellido_casada = formatearValor($arreglo_asociativo['apellido_casada']);
        $usa_apellido_casada = formatearValor($arreglo_asociativo['usa_apellido_casada']);
        $fecha_nacimiento = formatearValor($arreglo_asociativo['fecha_nacimiento']);
        $peso = formatearValor($arreglo_asociativo['peso']);
        $estatura = formatearValor($arreglo_asociativo['estatura']);
        $tipo_de_sangre = formatearValor($arreglo_asociativo['tipo_de_sangre']);
        $condicion_fisica = formatearValor($arreglo_asociativo['condicion_fisica']);
        $pais = formatearValor($arreglo_asociativo['pais']);
        $provincia = formatearValor($arreglo_asociativo['provincia']);
        $distrito = formatearValor($arreglo_asociativo['distrito']);
        $corregimiento = formatearValor($arreglo_asociativo['corregimiento']);
        $comunidad = formatearValor($arreglo_asociativo['comunidad']);
        $calle = formatearValor($arreglo_asociativo['calle']);
        $casa = formatearValor($arreglo_asociativo['casa']);
        $estado = formatearValor($arreglo_asociativo['estado']);

        // Preparar la consulta SQL para la inserción
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
            return true;  // Éxito al registrar al empleado
        } else {
            return false; // Error al registrar al empleado
        }
    }
    

    function buscarEmpleado($cedula) {
        global $conexion;

        $query = "SELECT * FROM generales WHERE cedula = ?";
        $stmt = mysqli_prepare($conexion, $query);
    
        // Vincular el parámetro
        mysqli_stmt_bind_param($stmt, 's', $cedula);
    
        // Ejecutar la consulta
        mysqli_stmt_execute($stmt);
    
        // Obtener el resultado de la consulta
        $resultado = mysqli_stmt_get_result($stmt);
    
        // Si se encontró el empleado, devolver un array asociativo con los datos, de lo contrario, devolver null
        return mysqli_num_rows($resultado) > 0 ? mysqli_fetch_assoc($resultado) : null;
    }
    

    function modificarEmpleado($datosEmpleado) {
        global $conexion;
    
        // Obtener la cédula del array de datos
        $cedula = $datosEmpleado['cedula'];
    
        // Verificar si la cédula existe antes de intentar la actualización
        $verificarCedulaQuery = "SELECT COUNT(*) as total FROM generales WHERE cedula = '$cedula'";
        $resultadoVerificacion = mysqli_query($conexion, $verificarCedulaQuery);
    
        if ($resultadoVerificacion) {
            $fila = mysqli_fetch_assoc($resultadoVerificacion);
            $totalEmpleados = $fila['total'];
    
            // Verificar si la cédula existe en la base de datos
            if ($totalEmpleados == 1) {
                // Extraer los demás datos del array
                $nombre1 = $datosEmpleado['nombre1'];
                $nombre2 = $datosEmpleado['nombre2'];
                $apellido1 = $datosEmpleado['apellido1'];
                $apellido2 = $datosEmpleado['apellido2'];
                $genero = $datosEmpleado['genero'];
                $estadoCivil = $datosEmpleado['estado_civil'];
                $apellidoCasada = $datosEmpleado['apellido_casada'];
                $usaApellidoCasada = $datosEmpleado['usa_apellido_casada'];
                $fechaNacimiento = $datosEmpleado['fecha_nacimiento'];
                $peso = $datosEmpleado['peso'];
                $estatura = $datosEmpleado['estatura'];
                $tipo_de_sangre = $datosEmpleado['tipo_de_sangre'];
                $condicionFisica = $datosEmpleado['condicion_fisica'];
                $pais = $datosEmpleado['pais'];
                $provincia = $datosEmpleado['provincia'];
                $distrito = $datosEmpleado['distrito'];
                $corregimiento = $datosEmpleado['corregimiento'];
                $comunidad = $datosEmpleado['comunidad'];
                $calle = $datosEmpleado['calle'];
                $casa = $datosEmpleado['casa'];
                $estado = $datosEmpleado['estado'];
    
                // Construir la consulta de actualización
                $query = "UPDATE generales 
                          SET nombre1 = '$nombre1', 
                              gener o= '$genero',
                              nombre2 = '$nombre2', 
                              apellido1 = '$apellido1', 
                              apellido2 = '$apellido2', 
                              estado_civil = '$estadoCivil', 
                              apellido_casada = '$apellidoCasada', 
                              usa_apellido_casada = '$usaApellidoCasada', 
                              fecha_nacimiento = '$fechaNacimiento', 
                              peso = '$peso', 
                              estatura = '$estatura', 
                              tipo_de_sangre = '$tipo_de_sangre', 
                              condicion_fisica = '$condicionFisica', 
                              pais = '$pais', 
                              provincia = '$provincia', 
                              distrito = '$distrito', 
                              corregimiento = '$corregimiento', 
                              comunidad = '$comunidad', 
                              calle = '$calle', 
                              casa = '$casa', 
                              estado = '$estado' 
                          WHERE cedula = '$cedula'";
    
                // Ejecutar la consulta de actualización
                $resultado = mysqli_query($conexion, $query);
    
                return $resultado ? true : false;
            } else {
                // La cédula no existe en la base de datos
                return false;
            }
        } else {
            // Error al ejecutar la consulta de verificación
            return false;
        }
    }
    
    
    
    
    


  
?>