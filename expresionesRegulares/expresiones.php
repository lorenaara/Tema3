<?php
    $cadena='Hoy hace muy buen día y hay nubes';
    $patron= '/hace/';
    echo "<br>Cadena: ".$cadena. " patron: ". $patron. " Match ". preg_match($patron, $cadena);
    //si en la expresion sale 1 es que el patron esta en la frase
    $patron ='/ha./'; //si despues del punto hay algo 
    echo "<br>Cadena: ".$cadena. " patron: ". $patron. " Match ". preg_match($patron, $cadena);
    $patron ='/ha.\s/'; //si hay algo despues de ha y un espacio despues 
    echo "<br>Cadena: ".$cadena. " patron: ". $patron. " Match ". preg_match($patron, $cadena);

    //hay o hoy 
    $patron ='/h[o|a]y/'; //si esta hay o hoy 
    echo "<br>Cadena: ".$cadena. " patron: ". $patron. " Match ". preg_match($patron, $cadena);

    $mes='Noviembre';
    $mes1='Novembera';
    $mes2= 'aNov.';
    //obligatorio $ que termine ^ que empiece
    $patron='/^Nov[\.|ember|iembre]$/';
    echo "<br>Cadena: ".$mes. " patron: ". $patron. " Match ". preg_match($patron, $mes);
    echo "<br>Cadena: ".$mes1. " patron: ". $patron. " Match ". preg_match($patron, $mes1);
    echo "<br>Cadena: ".$mes2. " patron: ". $patron. " Match ". preg_match($patron, $mes2);

    //opcional
    $patron= "/log[0-9]*.log/";
    $cadena = "log.log";
    $cadena1= 'log1.log';
    $cadena2= 'log123.log';
    echo "<br>Cadena: ".$cadena. " patron: ". $patron. " Match ". preg_match($patron, $cadena);
    echo "<br>Cadena: ".$cadena1. " patron: ". $patron. " Match ". preg_match($patron, $cadena1);
    echo "<br>Cadena: ".$cadena2. " patron: ". $patron. " Match ". preg_match($patron, $cadena2);
    //* de 0 a mas veces 
    //? 0 o una 
    
    //IBAN valido
        //empezar por dos letras
        //4 numeros entiedada
        //4 numeros oficina
        //2 numeros de control
        //10 numeros de cuenta
    $patron= "/^[A-Z]{2}[0-9]{2}(\s)?[0-9]{4}(\s)?[0-9]{4}(\s)?[0-9]{2}(\s)?[0-9]{10}$/";
    $cadena= 'ES1234567898123456789512';
    $cadena1= 'ES12 3445 5678 98 1234567895';
    echo "<br>Cadena: ".$cadena. " patron: ". $patron. " Match ". preg_match($patron, $cadena);
    echo "<br>Cadena: ".$cadena1. " patron: ". $patron. " Match ". preg_match($patron, $cadena1);

    //patron que acerpe entre 0 y 999
    $patron = '/^[0-9]{1,3}$/';
    $cadena='2';
    $cadena1= '88';
    $cadena2 ='a';
    echo "<br>Cadena: ".$cadena. " patron: ". $patron. " Match ". preg_match($patron, $cadena);
    echo "<br>Cadena: ".$cadena1. " patron: ". $patron. " Match ". preg_match($patron, $cadena1);
    echo "<br>Cadena: ".$cadena2. " patron: ". $patron. " Match ". preg_match($patron, $cadena2);

    // \d: cualquier numero y \D:cualquier letra

    //una etiqueta de apertura o de cierre 
    $patron= '/^<\/?[a-z]+[0-9]?>/';
    $cadena= '<html>';
    $cadena1= '<p>';
    $cadena2= '</h1>';
    echo "<br>Cadena: ". str_replace('<', '&lt', $cadena). " patron: ". $patron. " Match ". preg_match($patron, $cadena);
    echo "<br>Cadena: ".str_replace('<', '&lt', $cadena1). " patron: ". $patron. " Match ". preg_match($patron, $cadena1);
    echo "<br>Cadena: ".str_replace('<', '&lt', $cadena2). " patron: ". $patron. " Match ". preg_match($patron, $cadena2);

    //quiero que me devuelva donde ha hecho match
    //preg_match_all($patron, $cadena, $array);
    $patron= '/<\/?[a-z]+[0-9]?>/';
    $cadena='<html>Dentro de una html</html> <a>Dentro de un enlace</a><h1>Dentro de un h1</h1>';
    echo "<br>Cadena: ".$cadena. " patron: ". $patron. " Match ". preg_match($patron, $cadena);
    echo "<br>Array de coincidencias";
    preg_match_all($patron, $cadena, $array);
    foreach($array[0] as $value){
        echo str_replace('<', '&lt', $value). "<br>"; 
    }
    //que nos devuelva lo que hay dentro de las etiquetas
    $patron= '/<[a-z]+[0-9]?>(.*)<\/?[a-z]+[0-9]?>/';
    $cadena='<html>Dentro de una html</html> <a>Dentro de un enlace</a><h1>Dentro de un h1</h1>';
    preg_match_all($patron, $cadena, $array);
    echo "dentro de la etiqueta<br>";

    //Expresiones regulares en arrays
    $lista = array('Maria','Criado','25','Zamora', 'Calle Requejo 25', '492');
    $patron= '/^\d{1,3}$/';
    $numeros = preg_grep($patron,$lista); //devuelve la posicion y el valor que se busca
    print_r($numeros);
    echo "<br>";

    $sustituir= 'numero';
    $cambiado= preg_replace($patron, $sustituir, $lista);  //cambia el valor que se busca en el patron 
    print_r($cambiado);
?>