<?php
    function br(){
        echo "<br>";
    }
    function h1($cadena){
        echo "<h1>".$cadena. "</h1>";
    }
    function p($parrafo){
        echo "<p>". $parrafo. "</p>";
    }
    function self(){
        echo basename(__FILE__);
    }
    function letraDni($dni){
        $letra= $dni%23;
        $palabro = 'TRWAGMYFPDXBNJZSQVHLCKE';  
        echo $dni. "letra: " . $palabro[$letra]; 
    }
    function numerosAleatorios($array, $min, $max, $num, $repet){
        for($i=0; $i<=$num; $i++){
            $numeroAle= rand($min, $max);
            //comprobar que no se repitan
            array_push($array, $numeroAle);
        }
        print_r($array);
    }
?>