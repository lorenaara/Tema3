<?php
   $filas=7;
   if($filas%2==0){
    $filas =$filas-1;
   }
   $filasA=(int)($filas/2+1) ;
   $filasB=$filas -$filasA;
   for ($i = 1; $i <= $filasA; $i++) {
    for($j=1; $j <= $filasA -$i; $j++){
      echo "&nbsp;&nbsp;";
    }
    for($k=1; $k<=2 * $i-1; $k++){
          echo "*";
      }
      echo "<br>";
 }
   for ($i = $filasB; $i >=1; $i--) {
      for($j=1; $j <= $filasB-$i+1 ; $j++){
        echo "&nbsp;&nbsp;";
      }
      for($k=1; $k<=2 * $i-1; $k++){
            echo "*";
        }
        echo "<br>";

   }

?>