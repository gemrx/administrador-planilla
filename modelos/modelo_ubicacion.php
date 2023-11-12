<?php 
    require(__DIR__ . "/../config/conexion.php");

    function obtenerPaises() {
        global $conexion;
        $query = "SELECT pais FROM paises ORDER BY pais";
        $query_result = mysqli_query($conexion, $query);
        $paises = [];
        while ($fila_actual = mysqli_fetch_assoc($query_result)) {
            $paises[] = $fila_actual["pais"];
        }
        return $paises;
        // retornara un arreglo unidimensional, donde cada posicion sera equivalente al nombre del pais
    }
    
	function obtenerProvinciasDePanama() {
        global $conexion;
        $query = "SELECT codigo_provincia, nombre_provincia 
                  FROM provincia
                  ORDER BY nombre_provincia";
        $query_result = mysqli_query($conexion, $query);
        $provincias = []; 
        while ($fila_actual = mysqli_fetch_assoc($query_result)) { 
            $provincias[] =  $fila_actual; // agregar la fila actual como un arreglo asociativo
        }
        return $provincias; 
        /*
            retornara un arreglo unidimensional, donde cada posicion sera equivalente a un arreglo asociativo y
            las llaves del arreglo asociativo seran las columnas especificadas en el query.
        */
    }

    function obtenerDistritosDeLaPronvincia($codigo_provincia) {
        global $conexion;

        $query = "SELECT distrito.codigo_distrito, distrito.nombre_distrito
                  FROM distrito
                  JOIN provincia ON distrito.codigo_provincia = provincia.codigo_provincia
                  WHERE provincia.codigo_provincia = '$codigo_provincia'
                  ORDER BY distrito.nombre_distrito";

        $query_result = mysqli_query($conexion, $query);
        $distritos = [];
        while ($fila_actual = mysqli_fetch_assoc($query_result)) {
            $distritos[] = $fila_actual; // agregar la fila actual como un arreglo asociativo
        }
        return $distritos;
        /*
            retornara un arreglo unidimensional, donde cada posicion sera equivalente a un arreglo asociativo y
            las llaves del arreglo asociativo seran las columnas especificadas en el query.
        */
    }

    function obtenerCorregimientosDelDistrito($codigo_distrito) {
        global $conexion;

        $query = "SELECT corregimiento.codigo_corregimiento, corregimiento.nombre_corregimiento
                  FROM corregimiento
                  JOIN distrito ON corregimiento.codigo_distrito = distrito.codigo_distrito
                  WHERE distrito.codigo_distrito = '$codigo_distrito'";

        $query_result = mysqli_query($conexion, $query);
        $corregimientos = [];
        while ($fila_actual = mysqli_fetch_assoc($query_result)) {
            $corregimientos[] = $fila_actual; // agregar la fila actual como un arreglo asociativo
        }
        return $corregimientos;
        /*
            retornara un arreglo unidimensional, donde cada posicion sera equivalente a un arreglo asociativo y
            las llaves del arreglo asociativo seran las columnas especificadas en el query.
        */
    }

    // $corregimientos = obtenerCorregimientosDelDistrito("1302");
    // foreach ($corregimientos as $corregimiento) {
    //     $nombre = $corregimiento["nombre_corregimiento"];
    //     $codigo = $corregimiento["codigo_corregimiento"];
    //     echo "$nombre $codigo";
    //     echo '<br>';
    // }
?>