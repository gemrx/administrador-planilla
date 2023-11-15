<?php
    require(__DIR__ ."/../modelos/modelo_planilla.php");

    if (isset($_POST["accion"])) {
        if ($_POST["accion"] == "registrar") {
            $datos = [
                "num_cheque" => $_POST["numeroCheque"],
                "fecha" => $_POST["fecha"],
                "beneficiario" => $_POST["beneficiario"],
                "monto" => $_POST["monto"],
                "observaciones" => $_POST["observaciones"]
            ];
            echo resgistrarPlanilla($datos);
        }
    }
?>