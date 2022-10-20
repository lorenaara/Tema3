<h1>Funciones</h1>
<?php
    include 'funciones.php';
    saludo();
    echo "<br>";
    saludo2("lore");
    echo "<br>";
    $nombre="pepe";
    saludo3($nombre);
    echo "<br>Cambio de nombre: ".$nombre;

    //global
    echo "<br>";
    echo "Usando la global <br>";
    saludo4();
    echo "<br>Cambio de nombre: ".$nombre;
    //que devuelva return
    $nombre="pepe";
    echo "<br>";
    echo "Usando return <br>";
    $nombre= saludo5($nombre);
    echo "<br>Cambio de nombre: ".$nombre;
    //por referencia
    $nombre="pepe";
    echo "<br>";
    echo "Usando variable por referencia <br>";
    saludo6($nombre);
    echo "<br>Cambio de nombre: ".$nombre;
    //valor por defecto
    echo "<br>";
    echo "Usando valor por defecto <br>";
    saludo7();
    echo "<br>Cambio de nombre: ".$nombre;
    //pasar un array
    $array= array();
    //llamar que rellene la hora en la que se ha hecho la llamada
    echo "<br>";
    rellenarArray($array); //pasa el parametro como valor 
    echo "<br>";
    //en caso que se pionga & saldria lo mismo tanto dentro como fuera de la funcion, ya que se pasa el valor por referencia
    print_r($array);
    //objetos 
    class Cuadrado{
        public $lado= 5;
    }
    $objeto=new Cuadrado();
    cambioLado($objeto, 6);
    echo "<br>Objeto: ". $objeto->lado;


?>