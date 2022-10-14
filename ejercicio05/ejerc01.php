<?php
    $datos=[2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3];
    //array ordenado de menor a mayor
    $datosa=sort($datos);
    echo '<h2>Array Ordenado</h2>';
    foreach ($datos as $key => $value) {
        echo $value . ' ';
    }
    echo '<br>';
    //array sin elementos repetidos
    echo '<h2>Array sin elementos repetidos</h2>';
    $datosb=array_unique($datos);
    foreach ($datosb as $key => $value) {
        echo $value .' ';
    }
 ?>