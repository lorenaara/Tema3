<?php
   $filas=3;
   for ($i = 1; $i <= $filas; $i++) {
      for($j=1; $j <= $filas -$i; $j++){
        echo "&nbsp;&nbsp;";
      }
      for($k=1; $k<=2 * $i-1; $k++){
            echo "*";
        }
        echo "<br>";
   }
   //https://programmerclick.com/article/30401900350/
?>