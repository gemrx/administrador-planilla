<?php
    $string = "SANTA CATALINA O CALOVÉDORA";
    echo mb_strtolower($string, 'UTF-8');; // porque me devuelve "santa catalina o calovÉdora" deberia ser "santa catalina o calovédora"
?>
