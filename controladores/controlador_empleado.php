<?php
    require(__DIR__ ."/../modelos/modelo_empleado.php");

    if (isset($_POST["accion"])) {
        if ($_POST["accion"] == "registrar") {
            $datosEmpleado = array(
                "prefijo" => $_POST['select-prefijo'],
                "tomo" => $_POST['input-tomo'],
                "asiento" => $_POST['input-asiento'],
                "genero" => $_POST['select-genero'],
                "estado_civil" => $_POST['select-estado-civil'],
                "nombre1" => $_POST['input-nombre'],
                "nombre2" => $_POST['input-segundo-nombre'],
                "apellido1" => $_POST['input-apellido'],
                "apellido2" => $_POST['input-segundo-apellido'],
                "apellido_casada" => $_POST["input-apellido-casada"],
                "fecha_nacimiento" => $_POST['input-fecha'],
                "peso" => $_POST['input-peso'],
                "estatura" => $_POST['input-estatura'],
                "tipo_de_sangre" => $_POST['select-tipo-sangre'],
                "condicion_fisica" => $_POST['input-condicion-fisica'],
                "pais" => $_POST['select-pais'],
                "provincia" => $_POST['select-provincia'],
                "distrito" => $_POST['select-distrito'],
                "corregimiento" => $_POST['select-corregimiento'],
                "comunidad" => $_POST['input-comunidad'],
                "calle" => $_POST['input-calle'],
                "casa" => $_POST['input-casa'],
            );

            // Datos no definidos explicitamente en el $_POST
            if ($_POST['input-tomo'] != "") {
                $datosEmpleado["cedula"] = $_POST['select-prefijo']."-".$_POST['input-tomo']."-".$_POST['input-asiento'];
            }
            $datosEmpleado["usa_apellido_casada"] = ($_POST["input-apellido-casada"] == "") ? "0" : "1";
            $datosEmpleado["estado"] = "1";

            $response = [
                "resultado" => registrarEmpleado($datosEmpleado)             
            ];

            echo json_encode($response);
        }

        if ($_POST["accion"] == "modificar") {
            $datosEmpleado = array(
                "cedula" => $_POST['input-cedula'],
                "genero" => $_POST['select-genero'],
                "estado_civil" => $_POST['select-estado-civil'],
                "nombre1" => $_POST['input-nombre'],
                "nombre2" => $_POST['input-segundo-nombre'],
                "apellido1" => $_POST['input-apellido'],
                "apellido2" => $_POST['input-segundo-apellido'],
                "apellido_casada" => $_POST["input-apellido-casada"],
                "fecha_nacimiento" => $_POST['input-fecha'],
                "peso" => $_POST['input-peso'],
                "estatura" => $_POST['input-estatura'],
                "tipo_de_sangre" => $_POST['select-tipo-sangre'],
                "condicion_fisica" => $_POST['input-condicion-fisica'],
                "pais" => $_POST['select-pais'],
                "provincia" => $_POST['select-provincia'],
                "distrito" => $_POST['select-distrito'],
                "corregimiento" => $_POST['select-corregimiento'],
                "comunidad" => $_POST['input-comunidad'],
                "calle" => $_POST['input-calle'],
                "casa" => $_POST['input-casa'],
                "estado" => $_POST['select-estado'],
            );

            $datosEmpleado["usa_apellido_casada"] = ($_POST["input-apellido-casada"] == "") ? "0" : "1";
            $response = modificarEmpleado($datosEmpleado);
            echo $response;
        }
    }

    if (isset($_GET["accion"])) {
        if ($_GET["accion"] == "buscar") {
            $cedula = $_GET["cedula"];
            $response = obtenerEmpleado($cedula);
            echo json_encode($response);
        }
    }
?>