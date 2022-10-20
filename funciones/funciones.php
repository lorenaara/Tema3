<?php
    //sin parametros
    function saludo(){
        echo "hola";
    }
    //con un parametro
    function saludo2($nombre){
        echo "Hola ". $nombre;
    }
    //parametros tipos de datos "normales" se pasan por valor
    function saludo3($nombre){
        $nombre = $nombre . " valor";
        echo "Hola ". $nombre;
    }
    //cambiar una funcion global
    function saludo4(){
        global $nombre;
        $nombre = $nombre . " valor";
        echo "Hola ". $nombre;
    }
    //con return 
    function saludo5($nombre){
        $nombre = $nombre . " valor";
        echo "Hola ". $nombre;
        return $nombre;
    }
    //por referencia
    function saludo6(&$nombre){
        $nombre = $nombre . " valor";
        echo "Hola ". $nombre;
    }
    //funcion que si no le pasamos valores use uno por defecto
    function saludo7($nombre= "Lore"){
        $nombre = $nombre . " valor";
        echo "Hola ". $nombre;
    }

    function rellenarArray($array){
        array_push($array, date("h:i:s"));
        print_r($array);
    }

    function cambioLado($objeto, $lado){
        $objeto->lado= $lado;
    }
?>