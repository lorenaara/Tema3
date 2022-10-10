<h2>Nave espacial</h2>
<?php
    $a=2;
    $b=3;
    var_dump($a<=>$b);

    $a=5;
    $b=3;
    echo "<br>Logico ";
    var_dump($a & $b); //operaciones en binario
    //desplazamiento de bit
    echo "<br>";
    var_dump($a << $b); //añade tantos 0 a la derecha como el segundo numero 
    echo "<br>";
    var_dump($a>>$b);
    
?>