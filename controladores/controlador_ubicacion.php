<?php 
    require(__DIR__ ."/../modelos/modelo_ubicacion.php");

    if (isset($_GET["accion"])) {

        // si es un cambio de provincia, se debe enviar nuevos distritos y nuevos corregimientos 
        if ($_GET["accion"] == "cambioDeProvincia") {
            $provincia = $_GET["provincia"];

            // obtener los distritos en base a la provincia porporcionada
            $distritos = obetnerDistritosDeLaPronvincia($provincia); 

            // elegir un distrito de forma aleatoria
            $indice_distrito = rand(0, count($distritos) - 1);
            $distrito_elegido = $distritos[$indice_distrito];

            // obtener los corregimientos en base al distrito elegido
            $corregimientos = obtenerCorregimientosDelDistrito($distrito_elegido);

            // hacer la estrcutura html de los nuevos distritos
            $distritos_html = "";
            foreach($distritos as $distrito) {
                $distrito_formateado = ucwords(strtolower(mb_strtolower($distrito, 'UTF-8')));
                if ($distrito == $distrito_elegido) {
                    $distritos_html .= "<option value=\"$distrito\" selected>$distrito_formateado</option>";
                } else {
                    $distritos_html .= "<option value=\"$distrito\">$distrito_formateado</option>";
                }
            }

            // hacer la estrcutura html de los nuevos corregimientos
            $corregimientos_html = "";
            foreach($corregimientos as $corregimiento) {
                $corregimiento_formateado = ucwords(strtolower(mb_strtolower($corregimiento, 'UTF-8')));
                $corregimientos_html .= "<option value=\"$corregimiento\">$corregimiento_formateado</option>";
            }

            // enviar las estructuras html en formato json
            $response = array("nuevosDistritos" => $distritos_html, "nuevosCorregimientos" => $corregimientos_html);
            echo json_encode($response); 
        }



        // si es un cambio de distrito, se deben enviar nuevos corregimientos
        if ($_GET["accion"] == "cambioDeDistrito") {
            $distrito = $_GET["distrito"];
            $corregimientos = obtenerCorregimientosDelDistrito($distrito);

            // elegir un corregimiento de forma aleatoria
            $indice_corregimiento = rand(0, count($corregimientos) - 1);
            $corregimiento_elegido = $corregimientos[$indice_corregimiento];

            // hacer la estructura html de los nuevos corregimientos
            $corregimientos_html = "";
            foreach($corregimientos as $corregimiento) {
                $corregimiento_formateado = ucwords(strtolower(mb_strtolower($corregimiento, 'UTF-8')));
                if ($corregimiento == $corregimiento_elegido) {
                    $corregimientos_html .= "<option value=\"$corregimiento\" selected>$corregimiento_formateado</option>";
                } else {
                    $corregimientos_html .= "<option value=\"$corregimiento\">$corregimiento_formateado</option>";
                }
            }

            // enviar la estructura html
            echo $corregimientos_html;
        }
    }
?>