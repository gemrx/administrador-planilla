<?php 
    require(__DIR__ . "/../config/conexion.php");

    // obtener todos los paises
    function obtenerPaises() {
        global $conexion;
        $query = "SELECT pais FROM paises ORDER BY pais";
        $query_result = mysqli_query($conexion, $query);
        $paises = []; // arreglo unidimensional que contendra todos los paises

        // recorrer la tabla que resulto del query fila por fila
        while ($fila_actual = mysqli_fetch_assoc($query_result)) {
            array_push($paises, $fila_actual["pais"]); // almacenar el nombre del pais
        }
        return $paises;
    }

    // obtener todas la provincias de panama
	function obtenerProvinciasDePanama() {
        global $conexion;
        $query = "SELECT * FROM provincia ORDER BY nombre_provincia";
        $query_result = mysqli_query($conexion, $query);
        $provincias = []; 
        while ($fila_actual = mysqli_fetch_assoc($query_result)) {      
            array_push($provincias, $fila_actual["nombre_provincia"]); 
        }
        return $provincias;
    }

    // obtener todos los distritos de una provincia
    function obetnerDistritosDeLaPronvincia($provincia) {
        global $conexion;
        $query = "SELECT nombre_distrito
                  FROM distrito
                  JOIN provincia ON distrito.codigo_provincia = provincia.codigo_provincia
                  WHERE provincia.nombre_provincia = '$provincia'
                  ORDER BY nombre_distrito";
        $query_result = mysqli_query($conexion, $query);
        $distritos = [];
        while ($fila_actual = mysqli_fetch_assoc($query_result)) {
            array_push($distritos, $fila_actual["nombre_distrito"]);
        }
        return $distritos;
    }

    // obtener todos los corregimientos de un distrito
    function obtenerCorregimientosDelDistrito($distrito) {
        global $conexion;
        $query = "SELECT nombre_corregimiento
                  FROM corregimiento
                  JOIN distrito ON corregimiento.codigo_distrito = distrito.codigo_distrito
                  WHERE distrito.nombre_distrito = '$distrito'
                  ORDER BY nombre_corregimiento";
        $query_result = mysqli_query($conexion, $query);
        $corregimientos = [];
        while ($fila_actual = mysqli_fetch_assoc($query_result)) {
            array_push($corregimientos, $fila_actual["nombre_corregimiento"]);
        }
        return $corregimientos;
    }

    // print_r(obtenerProvinciasDePanama());
?>