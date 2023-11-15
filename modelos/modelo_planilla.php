<?php
    require(__DIR__ . "/../config/conexion.php"); // obtener la conexion

    function resgistrarPlanilla($datos) {
        global $conexion;
        $num_cheque = $datos["num_cheque"];
        $fecha = $datos["fecha"];
        $beneficiario = $datos["beneficiario"];
        $monto = $datos["monto"];
        $observaciones = $datos["observaciones"];
        $query = "INSERT INTO cheque (num_cheque, fecha, beneficiario, monto, observaciones) 
                  VALUES ('$num_cheque', '$fecha', '$beneficiario', '$monto', '$observaciones')";
        $query_result = mysqli_query($conexion, $query);
        return $query_result;
    }
?>