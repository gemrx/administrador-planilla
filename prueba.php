<?php
   
    require(__DIR__ ."/modelos/modelo_empleado.php");
    
    $datosEmpleado = [
        'prefijo' => '8',
        'tomo' => '555',
        'asiento' => '123',
        'genero' => 'Masculino',
        'cedula' => '123456789',
        'nombre1' => 'Juan',
        'nombre2' => 'Carlos',
        // ... (otros campos)
    ];
    $resultado = registrarEmpleado($datosEmpleado);

    if ($resultado) {
        echo "Empleado registrado correctamente.\n";
    } else {
        echo "Error al registrar el empleado.\n";
    }
        
?>