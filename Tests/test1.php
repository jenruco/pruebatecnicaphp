<?php
    $palos = array("CORZACON_NEGRO", "CORAZON_ROJO", "DIAMANTE", "TREBOL");
    $numeros = array(1,2,3,4,5,6,7,8,9,10);
    $figuras = array("J", "Q", "K", "AS");
    $flat = true;
    for($i = 0; $i<10; $i++){
        if ($flat) {
            echo strval($numeros[$i]) . " " . $palos[rand(0, 3)];
            $flat = false;
        }else{
            echo strval($figuras[rand(0, 3)]) . " " . $palos[rand(0, 3)];
            $flat = true;
        }
        echo "</br>";
    }
?>