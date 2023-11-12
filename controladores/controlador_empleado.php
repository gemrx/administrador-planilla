<?php
    require(__DIR__ ."/../modelos/modelo_empleado.php");

    if (isset($_POST["accion"])) {
        if ($_POST["accion"] == "registrar") {
            $datosEmpleado = array(
                "prefijo" => $_POST['select-prefijo'] ?? null,
                "tomo" => $_POST['input-tomo'] ?? null,
                "asiento" => $_POST['input-asiento'] ?? null,
                "genero" => $_POST['select-genero'] ?? null,
                "estado_civil" => $_POST['select-estado-civil'] ?? null,
                "nombre1" => $_POST['input-nombre'] ?? null,
                "nombre2" => $_POST['input-segundo-nombre'] ?? null,
                "apellido1" => $_POST['input-apellido'] ?? null,
                "apellido2" => $_POST['input-segundo-apellido'] ?? null,
                "apellido_casada" => $_POST["input-apellido-casada"] ?? null,
                "fecha_nacimiento" => $_POST['input-fecha'] ?? null,
                "peso" => $_POST['input-peso'] ?? null,
                "estatura" => $_POST['input-estatura'] ?? null,
                "tipo_de_sangre" => $_POST['select-tipo-sangre'] ?? null,
                "condicion_fisica" => $_POST['input-condicion-fisica'] ?? null,
                "pais" => $_POST['select-pais'] ?? null,
                "provincia" => $_POST['select-provincia'] ?? null,
                "distrito" => $_POST['select-distrito'] ?? null,
                "corregimiento" => $_POST['select-corregimiento'] ?? null,
                "comunidad" => $_POST['input-comunidad'] ?? null,
                "calle" => $_POST['input-calle'] ?? null,
                "casa" => $_POST['input-casa'] ?? null,
            );

            // Datos no definidos explicitamente en el $_POST
            $datosEmpleado["cedula"] = ($_POST['select-prefijo']."-".$_POST['input-tomo']."-".$_POST['input-asiento']) ?? null;
            $datosEmpleado["usa_apellido_casada"] = ($_POST["input-apellido-casada"] == "") ? "0" : "1";
            $datosEmpleado["estado"] = "1";
            
            echo json_encode($datosEmpleado);
        }
    }
?>