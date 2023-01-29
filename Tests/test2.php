<?php
    $identityNumber = '035002980';
    $length = strlen($identityNumber);
    if($length!=10 && $length != 13){
        echo "Identificación inválida";
        return;
    }
    $firstDig = substr($identityNumber, 0, 2);
    if($length===10){
        if($firstDig === '09') echo "CÉDULA DE GUAYAQUIL";
        else echo "CEDULA DE OTRA PROVINCIA";
    }
    if($length===13){
        if($firstDig === '09') echo "RUC DE GUAYAQUIL";
        else echo "RUC DE OTRA PROVINCIA";
    }
?>