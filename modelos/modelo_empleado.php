<?php 
    require(__DIR__ . "/../config/conexion.php"); // obtener la conexion

	function registrarEmpleado($arreglo_asociativo) {
        global $conexion;
    
        // Obtener los valores del arreglo asociativo
        $prefijo = $arreglo_asociativo['prefijo'];
        $tomo = $arreglo_asociativo['tomo'];
        $asiento = $arreglo_asociativo['asiento'];
        $genero = $arreglo_asociativo['genero'];
        $cedula = $arreglo_asociativo['cedula'];
        $nombre1 = $arreglo_asociativo['nombre1'];
        $nombre2 = $arreglo_asociativo['nombre2'];
        $apellido1 = $arreglo_asociativo['apellido1'];
        $apellido2 = $arreglo_asociativo['apellido2'];
        $estado_civil = $arreglo_asociativo['estado_civil'];
        $apellido_casada = $arreglo_asociativo['apellido_casada'];
        $usa_apellido_casada = $arreglo_asociativo['usa_apellido_casada'];
        $fecha_nacimiento = $arreglo_asociativo['fecha_nacimiento'];
        $peso = $arreglo_asociativo['peso'];
        $estatura = $arreglo_asociativo['estatura'];
        $tipo_sangre = $arreglo_asociativo['tipo_sangre'];
        $condicion_fisica = $arreglo_asociativo['condicion_fisica'];
        $pais = $arreglo_asociativo['pais'];
        $provincia = $arreglo_asociativo['provincia'];
        $distrito = $arreglo_asociativo['distrito'];
        $corregimiento = $arreglo_asociativo['corregimiento'];
        $comunidad = $arreglo_asociativo['comunidad'];
        $calle = $arreglo_asociativo['calle'];
        $casa = $arreglo_asociativo['casa'];
        $estado = $arreglo_asociativo['estado'];
    
        // Preparar la consulta SQL para la inserción
        $query = "INSERT INTO generales (
                    prefijo, tomo, asiento, genero, cedula, nombre1, nombre2, apellido1, apellido2,
                    estado_civil, apellido_casada, usa_apellido_casada, fecha_nacimiento, peso, estatura,
                    tipo_sangre, condicion_fisica, pais, provincia, distrito, corregimiento, comunidad,
                    calle, casa, estado
                  ) 
                  VALUES (
                    '$prefijo', '$tomo', '$asiento', '$genero', '$cedula', '$nombre1', '$nombre2', '$apellido1', '$apellido2',
                    '$estado_civil', '$apellido_casada', '$usa_apellido_casada', '$fecha_nacimiento', '$peso', '$estatura',
                    '$tipo_sangre', '$condicion_fisica', '$pais', '$provincia', '$distrito', '$corregimiento', '$comunidad',
                    '$calle', '$casa', '$estado'
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
                $tipoSangre = $datosEmpleado['tipo_sangre'];
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
                              genero= '$genero',
                              nombre2 = '$nombre2', 
                              apellido1 = '$apellido1', 
                              apellido2 = '$apellido2', 
                              estado_civil = '$estadoCivil', 
                              apellido_casada = '$apellidoCasada', 
                              usa_apellido_casada = '$usaApellidoCasada', 
                              fecha_nacimiento = '$fechaNacimiento', 
                              peso = '$peso', 
                              estatura = '$estatura', 
                              tipo_sangre = '$tipoSangre', 
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