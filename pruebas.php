<h1>Operadores</h1>
<h2>Nave espacial</h2>
<?php
    $a=2;
    $b=3;
    var_dump($a<=>$b);

    $a=5;
    $b=1;
    echo "<br>Logico ";
    var_dump($a & $b); //operaciones en binario
    //desplazamiento de bit
    echo "<br>";
    var_dump($a << $b); //añade tantos 0 a la derecha como el segundo numero 
    echo "<br>";
    var_dump($a>>$b);  
?>

<h2>Bucles</h2>
<?php
        
            //ejemplo de break
            //cuando llegue al 5 se sale
    for($i=0; $i<10; $i++){
        #code...
        if($i==5){
    
            break;
        }
        echo "<br>".$i;
    }
    
    //ejemplo continue
    //No imprime el 5
    for($i=0; $i<10; $i++){
        #code...
        if($i==5){
    
            continue;
        }
        echo "<br>".$i;
    }


    //while
    $a=1;
    while($a<5){
        echo "<br> while ".$a;
        $a++;
    }

    //while mientras
    do{
        echo "<br>".$a;
        $a++;
    }while($a <5);


    //  *
    // * * *
    // * * * *
    
?>