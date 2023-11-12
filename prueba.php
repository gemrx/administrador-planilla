<?php
    require(__DIR__ ."/modelos/modelo_ubicacion.php");
    
    // obtener los distritos en base a la provincia porporcionada
    $distritos = obtenerDistritosDeLaPronvincia(13); 

    // elegir un distrito de forma aleatoria
    $indice_distrito = rand(0, count($distritos) - 1);
    $distrito_elegido = $distritos[$indice_distrito];

    print_r($distrito_elegido);
?>