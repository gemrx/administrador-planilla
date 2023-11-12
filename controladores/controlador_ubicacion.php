<?php 
    require(__DIR__ ."/../modelos/modelo_ubicacion.php");

    if (isset($_GET["accion"])) {

        // si es un cambio de provincia, se debe enviar nuevos distritos y nuevos corregimientos 
        if ($_GET["accion"] == "cambioDeProvincia") {
            $codigo_provincia = $_GET["codigoProvincia"];

            // obtener los distritos en base al codigo de la provincia porporcionada
            $distritos = obtenerDistritosDeLaPronvincia($codigo_provincia); 

            // elegir el codigo de un distrito de forma aleatoria
            $indice = rand(0, count($distritos) - 1);
            $codigo_elegido = $distritos[$indice]["codigo_distrito"];

            // obtener los corregimientos en base al codigo del distrito elegido
            $corregimientos = obtenerCorregimientosDelDistrito($codigo_elegido);

            // hacer la estrcutura html de los nuevos distritos
            $distritos_html = "";
            foreach($distritos as $distrito) {
                $nombre = $distrito["nombre_distrito"];
                $codigo = $distrito["codigo_distrito"];
                $nombre_formateado = ucwords(strtolower(mb_strtolower($nombre, 'UTF-8')));
                if ($codigo == $codigo_elegido) {
                    $distritos_html .= "<option value=\"$codigo\" selected>$nombre_formateado</option>";
                } else {
                    $distritos_html .= "<option value=\"$codigo\">$nombre_formateado</option>";
                }
            }

            // hacer la estrcutura html de los nuevos corregimientos
            $corregimientos_html = "";
            foreach($corregimientos as $corregimiento) {
                $nombre = $corregimiento["nombre_corregimiento"];
                $codigo = $corregimiento["codigo_corregimiento"];
                $nombre_formateado = ucwords(strtolower(mb_strtolower($nombre, 'UTF-8')));
                $corregimientos_html .= "<option value=\"$codigo\">$nombre_formateado</option>";
            }

            // enviar las estructuras html en formato json
            $response = array(
                "nuevosDistritos" => $distritos_html, 
                "nuevosCorregimientos" => $corregimientos_html
            );
            echo json_encode($response); 
        }



        // si es un cambio de distrito, se deben enviar nuevos corregimientos
        if ($_GET["accion"] == "cambioDeDistrito") {
            $codigo_distrito = $_GET["codigoDistrito"];
            $corregimientos = obtenerCorregimientosDelDistrito($codigo_distrito);

            // elegir el codigo de un corregimiento de forma aleatoria
            $indice = rand(0, count($corregimientos) - 1);
            $codigo_elegido = $corregimientos[$indice]["codigo_corregimiento"];

            // hacer la estructura html de los nuevos corregimientos
            $corregimientos_html = "";
            foreach($corregimientos as $corregimiento) {
                $nombre = $corregimientos["nombre_corregimiento"];
                $codigo = $corregimientos["codigo_corregimiento"];
                $nombre_formateado = ucwords(strtolower(mb_strtolower($nombre, 'UTF-8')));
                if ($corregimiento == $corregimiento_elegido) {
                    $corregimientos_html .= "<option value=\"$codigo\" selected>$nombre_formateado</option>";
                } else {
                    $corregimientos_html .= "<option value=\"$codigo\">$nombre_formateado</option>";
                }
            }

            // enviar la estructura html
            echo $corregimientos_html;
        }
    }
?>