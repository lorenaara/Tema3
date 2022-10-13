<?php
   $filas=4;
   $filasA=$filas/2 ;
   $filasB=$filas/2;
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
      for($j=1; $j <= $filasB -$i; $j++){
        echo "&nbsp;&nbsp;";
      }
      for($k=1; $k<=2 * $i-1; $k++){
            echo "*";
        }
        echo "<br>";

   }

   //https://programmerclick.com/article/30401900350/
?>