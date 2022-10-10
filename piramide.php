<?php
$filas=5;
for($i=1; $i<=$filas; $i++){
    for($j=1;$j< $filas-$i; $j++){
        echo "  ";
    }
    for($ast=1; $ast<$i*2-1; $ast++){
        echo "*";
    }
    echo '/n';
}